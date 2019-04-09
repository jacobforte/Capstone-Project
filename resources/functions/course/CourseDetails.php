<?php

require("resources/functions/dbconnection.function.php");
require("resources/functions/course/Course.php");
require("resources/functions/course/Review.php");


class CourseDetails
{
    private $id;
    private $term;
    private $title;
    private $creditHours;
    private $seatsOpen;
    private $sections = array();
    private $reviews = array();

    /**
     * @return array
     */
    public function getSections()
    {
        return $this->sections;
    }

    /**
     * @param array $sections
     */
    public function setSections($sections)
    {
        $this->sections = $sections;
    }

    /**
     * @return array
     */
    public function getReviews()
    {
        return $this->reviews;
    }

    /**
     * @param array $reviews
     */
    public function setReviews($reviews)
    {
        $this->reviews = $reviews;
    }

    /**
     * CourseDetails constructor.
     * @param $id
     * @param $term
     */
    public function __construct($id, $term)
    {
        $this->id = $id;
        $this->term = $term;

        $sections = dbconnection("spSelectClasses(null, \"" . $id . "\", null, null, null, null, \"" . explode(":", $term)[0] . "\", \"" . explode(":", $term)[1] . "\", null, null, null)");

        if (sizeof($sections) == 0) {
            $sections = dbconnection("spSelectClasses(null, \"" . $id . "\", null, null, null, null, null, null, null, null, null)");

            $this->title = $sections[0]["title"];
            $this->creditHours = $sections[0]["credits"];
            $this->seatsOpen = 0;
        }
        else {
            foreach ($sections as $section) {
                $this->sections[] = new Course($section["crn"], $section["courseID"], $section["campus"], $section["credits"], $section["title"], $section["totalSeats"], $section["seatsRemaining"],
                    $section["instructor"], $section["startDate"], $section["endDate"], $section["location"], $section["startTime"], $section["endTime"], $section["meetDays"]);
                $this->seatsOpen += $section["seatsRemaining"];
            }

            $this->title = $this->sections[0]->getTitle();
            $this->creditHours = $this->sections[0]->getCredits();

            ksort($this->sections);
        }

        $reviews = dbconnection("spSelectUserClassComment(\"" . $id . "\")");

        if (sizeof($reviews) > 0) {
            foreach ($reviews as $review) {
                $this->reviews[] = new Review($review["name"], $review["rating"], $review["semester"], $review["instructor"], $review["campus"], $review["shortDescription"]);
            }
        }

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTerm()
    {
        return $this->term;
    }

    /**
     * @param mixed $term
     */
    public function setTerm($term)
    {
        $this->term = $term;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getCreditHours()
    {
        return $this->creditHours;
    }

    /**
     * @param mixed $creditHours
     */
    public function setCreditHours($creditHours)
    {
        $this->creditHours = $creditHours;
    }

    /**
     * @return mixed
     */
    public function getSeatsOpen()
    {
        return $this->seatsOpen;
    }

    /**
     * @param mixed $seatsOpen
     */
    public function setSeatsOpen($seatsOpen)
    {
        $this->seatsOpen = $seatsOpen;
    }

    public function userPostedReview($user) {
        foreach ($this->reviews as $review) {
            if ($review->getName() == $user) {
                return true;
            }
        }

        return false;
    }

    public function getUserSubscribedCourses($user) {
        $sc[] = array();

        if ($user != null) {
            $subscribedCourses = dbconnection("spSelectUserRegisteredClasses(\"" . $user . "\")");

            foreach ($subscribedCourses as $course) {
                $sc[] = $course["crn"];
            }
        }

        return $sc;

    }

    public function outputReviewForm($user) {
        echo '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">New Review</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <form action ="resources/functions/course/course.details.addreview.function.php" method="post">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="instructor">Instructor</label>
                                                <input type="text" id="instructor" name="instructor" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="campus">Campus</label>
                                                <select name="campus" id="campus" class="custom-select">
                                                    <option value="KC">Kent</option>
                                                    <option value="ST">Stark</option>
                                                    <option value="ON">Online</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label for="semester">Semester</label>
                                                                <select name="semester" id="semester" class="custom-select">
                                                                    <option value="Spring">Spring</option>
                                                                    <option value="Summer">Summer</option>
                                                                    <option value="Fall">Fall</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="year">Year</label>
                                                                <input type="text" id="year" name="year" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="crn">CRN</label>
                                                            <input type="text" id="crn" name="crn" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="reviewDescription">Write a little about your experience</label>
                                        <textarea class="form-control mb-3" id="reviewDescription" name="reviewDescription" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-1">
                                        <label for="rating">Rating</label>
                                        <div id="rating">
                                            <i class="far fa-star fa-lg text-orange reviewStar" onclick="highlightStar(this)" id="oneStar"></i>
                                            <i class="far fa-star fa-lg text-orange reviewStar" onclick="highlightStar(this)" id="twoStar"></i>
                                            <i class="far fa-star fa-lg text-orange reviewStar" onclick="highlightStar(this)" id="threeStar"></i>
                                            <i class="far fa-star fa-lg text-orange reviewStar" onclick="highlightStar(this)" id="fourStar"></i>
                                            <i class="far fa-star fa-lg text-orange reviewStar" onclick="highlightStar(this)" id="fiveStar"></i>
                                        </div>
                                        <input type="hidden" id="ratingValue" value="0" name="ratingValue" />
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="addReview(\'' . $user . '\')" class="btn btn-warning">Post Review</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>';
    }


}