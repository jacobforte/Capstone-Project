<?php

require( $_SERVER["DOCUMENT_ROOT"] . "/" . "resources/functions/dbconnection.function.php");
require( $_SERVER["DOCUMENT_ROOT"] . "/" . "resources/functions/course/Course.php");
require( $_SERVER["DOCUMENT_ROOT"] . "/" . "resources/functions/course/Review.php");


class CourseDetails
{
    private $id;
    private $term;
    private $title;
    private $creditHours;
    private $seatsOpen;
    private $sections = array();
    private $reviews = array();
    private $totalReviews = 0;
    private $overallReviewScore = 0.0;

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
                $this->overallReviewScore += $review["rating"];
                $this->totalReviews++;
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

    public function outputReviewSection() {
          echo'<div id="reviewPart"> 
            <div class="row">
            <div class="col-12">
                <h4 class="font-weight-bold mb-1">Reviews</h4>
            </div>';

          if ($this->totalReviews > 0) {
              echo '<div class="col-12">';
              for ($i = 0; $i < $this->overallReviewScore/$this->totalReviews; $i++) {
                echo '<i class="fas fa-star text-orange"></i>';
              }
              while ($i != 5) {
                echo '<i class="far fa-star text-orange"></i>';
                $i++;
              }
              echo '<p>' . $this->overallReviewScore/$this->totalReviews . '/5 stars</p>';
          }

          echo '</div>
            <div class="col-12">
                <h6>Sorting by newest (' . $this->totalReviews . ' of ' . $this->totalReviews . ' reviews)</h6>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-12">';

                    if(isset($_SESSION['user'])) {
                        if ($this->userPostedReview($_SESSION['user']['name'])) {
                            echo '<button type="button" class="btn btn-warning" disabled>
                                Review Submitted
                            </button>';
                        } else {
                            echo '<button type="button" id="postReviewButton" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
                                Post Review
                            </button>';
                        }
                    }
                    else {
                        echo '<a href="login.php" class="btn btn-warning">
                            Login to Review
                        </a>';
                    }
           echo ' </div>
        </div>';
        foreach ($this->getReviews() as $review) {
            echo '<div class="review mb-3">
                <div class="row mb-1">
                    <div class="col-12">
                        <h5 class="font-weight-bold">' . $review->getName() . '</h5>
                        <h6 class="d-sm-inline mr-sm-2"><i class="fas fa-chalkboard-teacher text-orange" aria-label="Professor"></i> '. $review->getInstructor() .'</h6>
                        <h6 class="d-sm-inline mr-sm-2"><i class="fas fa-calendar-day text-orange" aria-label="Semester"></i> ' . $review->getSemester() . '</h6>
                        <h6 class="d-sm-inline"><i class="fas fa-school text-orange" aria-label="Campus"></i> '. $review->getCampus(). '</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="mb-2">' . $review->getDescription() . '</p>
                    </div>
                    <div class="col-12">';
                            for ($i = 0; $i < $review->getRating(); $i++) {
                                echo '<i class="fas fa-star text-orange"></i>';
                            }
                            while ($i != 5) {
                                echo '<i class="far fa-star text-orange"></i>';
                                $i++;
                            }
                    echo '</div>
                </div>
            </div>';
        }
        echo '</div>';
        if (isset($_SESSION['user'])){
            if (!$this->userPostedReview($_SESSION['user']['name'])) {
                $this->outputReviewForm($_SESSION['user']['email']);
            }
        }

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
                        <button type="button" onclick="addReview(\'' . $user . '\', \'' . $this->id . '\')" class="btn btn-warning">Post Review</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>';
    }


}