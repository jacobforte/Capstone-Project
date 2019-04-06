<?php

require("resources/functions/dbconnection.function.php");
require("resources/functions/course/Course.php");

function outputAllSectionsFor($courseId) {
    $courses = dbconnection("spSelectClasses(null, \"" . $courseId . "\", null, null, null, null, null, null, null, null, null)");
    $c = array();
    $sc = array();

    if (isset($_SESSION['user']['email'])) {
        $subscribedCourses = dbconnection("spSelectUserRegisteredClasses(\"" . $_SESSION['user']['email'] . "\")");
        foreach ($subscribedCourses as $course) {
            $sc[] = $course["crn"];
        }
    }
    else
        $subscribedCourses = null;

    foreach ($courses as $course) {
        $c[] = new Course($course["crn"], $course["courseID"], $course["campus"], $course["credits"], $course["title"], $course["totalSeats"], $course["seatsRemaining"],
            $course["instructor"], $course["startDate"], $course["endDate"], $course["location"], $course["startTime"], $course["endTime"], $course["meetDays"]);
    }

    ksort($c);

    $prev = null;
    foreach($c as $course) {
        if ((!isset($prev))) {
            echo '<div class="row">
                <div class="col-12">
                    <h4 class="font-weight-bold mb-3">' . $course->getCampus() . ' Campus</h4>
                </div>
            </div>
            <div class="row">';
        }
        else if ((isset($prev)) && $prev->getCampus() != $course->getCampus()) {
            echo '</div>
                <div class="row">
                <div class="col-12">
                    <h4 class="font-weight-bold mb-3">' . $course->getCampus() . ' Campus</h4>
                </div>
            </div>
            <div class="row">';
        }

        echo '<div class="col-12 col-md-6 col-lg-4 mb-3 section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Section ' . explode('-', $course->getCourse())[2] . ' (' . $course->getCrn() . ')</h5>
                <div class="card-text">
                    <div class="row">
                        <div class="col-12">
                            <p>' . $course->getMeetDays() . ' ' . $course->getStartTime() . ' - ' . $course->getEndTime() . '</p>
                            <p>' . $course->getLocation() . '</p>
                            <p>' . $course->getInstructor() . '</p>
                            <p>' . $course->getRemainOpen() . ' seats open</p>
                            <p>' . $course->getEnrolled() . ' enrolled</p>
                        </div>
                    </div>';
        if ($sc == null) {
            echo '<button type="button" class="btn btn-warning" onclick="alert(\'Please login\')">Subscribe</button>';
        }
        else {
            if (in_array($course->getCrn(), $sc)) {
                echo '<button type="button" class="btn btn-warning" disabled>Subscribed</button>';
            }
            else {
                echo '<button type="button" class="btn btn-warning" id="btn' . $course->getCrn() . '" onclick="subscribeByCrn(\'' . $course->getCrn() . '\', \'' . $_SESSION['user']['email'] . '\')">Subscribe</button>';
            }
        }

        echo '</div></div></div></div>';

        $prev = $course;
    }

    echo '</div>';
}