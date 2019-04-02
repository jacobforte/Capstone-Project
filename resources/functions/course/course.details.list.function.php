<?php

require("resources/functions/dbconnection.function.php");

function outputAllSectionsFor($courseId) {
    $courses = dbconnection("spSelectClasses(null, \"CS-10051\", null, null, null, null, null, null, null, null, null)");
    $subscribedCourses = dbconnection("spSelectUserRegisteredClasses(\"" . $_SESSION['user']['email'] . "\")");

    foreach ($courses as $course) {
        $subbed = false;
        $pieces = explode('-', $course["courseID"]);
        echo '<div class="col-12 col-md-6 col-lg-4 mb-3 section">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Section ' . $pieces[2] . ' (' . $course["crn"] . ')</h5>
                    <div class="card-text">
                        <div class="row">
                            <div class="col-12">
                                <p>' . $course["meetDays"] . ' ' . $course["startTime"] . ' - ' . $course["endTime"] . '</p>
                                <p>' . $course["location"] . '</p>
                                <p>' . $course["instructor"] . '</p>
                                <p>' . $course["seatsRemaining"] . ' seats open</p>
                                <p>' . $course["totalSeats"] . ' enrolled</p>
                            </div>
                        </div>';
                    foreach ($subscribedCourses as $sub) {
                        if ($sub["crn"] == $course["crn"]) {
                            $subbed = true;
                        }
                    }
                    if (!$subbed) {
                        echo '<button type="button" class="btn btn-warning" id="btn' . $course["crn"] . '" onclick="subscribeByCrn(\'' . $course["crn"] . '\', \'' . $_SESSION['user']['email'] . '\')">Subscribe</button>';
                    }
                    else {
                        echo '<button type="button" class="btn btn-warning" disabled>Subscribed</button>';
                    }
                echo '
                </div>
                </div>
            </div>
        </div>';
    }

}