<?php
    require("resources/functions/course/CourseDetails.php");
?>

<!doctype html>
<html lang="en">
<head>
    <?php include("resources/includes/head.inc.php"); ?>
    <script src="resources/js/course.details.js"></script>
    <script>
        function highlightStar($this) {
            $('#rating').children('i').each(function () {
                $("#"+this.id).removeClass("fas");
            });
            switch($this.id) {
                case "fiveStar":
                    $("#fiveStar").addClass("fas");
                    $("#fourStar").addClass("fas");
                    $("#threeStar").addClass("fas");
                    $("#twoStar").addClass("fas");
                    $("#oneStar").addClass("fas");
                    $("#ratingValue").val("5");
                    break;
                case "fourStar":
                    $("#fourStar").addClass("fas");
                    $("#threeStar").addClass("fas");
                    $("#twoStar").addClass("fas");
                    $("#oneStar").addClass("fas");
                    $("#ratingValue").val("4");
                    break;
                case "threeStar":
                    $("#threeStar").addClass("fas");
                    $("#twoStar").addClass("fas");
                    $("#oneStar").addClass("fas");
                    $("#ratingValue").val("3");
                    break;
                case "twoStar":
                    $("#twoStar").addClass("fas");
                    $("#oneStar").addClass("fas");
                    $("#ratingValue").val("2");
                    break;
                case "oneStar":
                    $("#oneStar").addClass("fas");
                    $("#ratingValue").val("1");
                    break;
            }
        }
    </script>
</head>
<body>
<?php include("resources/includes/header.inc.php"); ?>

<main class="mb-4">
    <div class="container">

        <?php
            if ((isset($_POST['termSubmit'])))
                $courseDetails = new CourseDetails($_GET["id"], $_POST['term']);
            else
                $courseDetails = new CourseDetails($_GET["id"], "2019-06-10:2019-08-17");
        ?>

        <div class="row">
            <div class="col-12 col-lg-10 pt-4">
                <h3 class="font-weight-bold"><?php echo $courseDetails->getTitle(); ?></h3>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-12 col-md-9 col-lg-6 col-xl-5">
                <div class="row">
                    <div class="col-12 col-sm-3">
                        <h5><?php echo $courseDetails->getId() ?></h5>
                    </div>
                    <div class="col-12 col-sm-3">
                        <h5><?php echo $courseDetails->getCreditHours(); ?> Credits</h5>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h5><?php echo $courseDetails->getSeatsOpen(); ?> Seats Available</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <form action="" method="post" class="form-inline">
                    <select class="custom-select mb-3 mb-sm-0 mr-sm-3" name="term">
                        <option value="2019-06-10:2019-08-17"
                            <?php if(isset($_POST['termSubmit'])) { if ($_POST["term"] == "2019-06-10:2019-08-17") { echo 'selected'; } } ?>
                        >Summer 2019</option>
                        <option value="2019-08-22:2019-12-08"
                            <?php if(isset($_POST['termSubmit'])) { if ($_POST["term"] == "2019-08-22:2019-12-08") { echo 'selected'; } } ?>
                        >Fall 2019</option>
                    </select>
                    <button type="submit" name="termSubmit" class="btn btn-warning d-inline">Submit</button>
                </form>
            </div>
        </div>

        <?php
            $prev = null;
            foreach ($courseDetails->getSections() as $section) {
                if (!isset($prev)) {
        ?>
                    <div class="row">
                        <div class="col-12">
                            <h4 class="font-weight-bold mb-3"><?php echo $section->getCampus(); ?> Campus</h4>
                        </div>
                    </div>
                    <div class="row">
        <?php } else if (isset($prev) && $prev->getCampus() != $section->getCampus()) { ?>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h4 class="font-weight-bold mb-3"><?php echo $section->getCampus(); ?> Campus</h4>
                        </div>
                    </div>
                    <div class="row">
        <?php } ?>
            <div class="col-12 col-md-6 col-lg-4 mb-3 section">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Section <?php echo explode('-', $section->getCourse())[2] . ' (' . $section->getCrn() . ')'; ?></h5>
                        <div class="card-text">
                            <div class="row">
                                <div class="col-12">
                                    <p>Meets on <?php echo $section->getMeetDays() . ' ' . $section->getStartTime() . ' - ' . $section->getEndTime(); ?></p>
                                    <p>Meets in <?php echo $section->getLocation(); ?></p>
                                    <p>Taught by <?php echo str_replace("(P)", "", $section->getInstructor()); ?></p>
                                    <p><?php echo $section->getRemainOpen(); ?> seat remaining</p>
                                    <p><?php echo $section->getEnrolled(); ?> enrolled</p>
                                </div>
                            </div>

        <?php
                if (isset($_SESSION['user']['email'])) {
                    if (in_array($section->getCrn(), $courseDetails->getUserSubscribedCourses($_SESSION['user']['email']))) {
                        echo '<button type="button" class="btn btn-warning" disabled>Subscribed</button>';
                    }
                    else {
                        echo '<button type="button" class="btn btn-warning" id="btn' . $section->getCrn() . '" onclick="subscribeByCrn(\'' . $section->getCrn() . '\', \'' . $_SESSION['user']['email'] . '\')">Subscribe</button>';
                    }
                }
                else {
                    echo '<button type="button" class="btn btn-warning" onclick="alert(\'Please login\')">Subscribe</button>';
                }
                $prev = $section;

                echo '</div></div></div></div>';
            }

            if (sizeof($courseDetails->getSections()) > 0) {
                echo '</div>';
            }
        ?>

        <div class="row">
            <div class="col-12">
                <h4 class="font-weight-bold mb-1">Reviews</h4>
            </div>
            <div class="col-12">
                <i class="fas fa-star text-orange"></i>
                <i class="fas fa-star text-orange"></i>
                <i class="fas fa-star text-orange"></i>
                <i class="fas fa-star text-orange"></i>
                <i class="far fa-star text-orange"></i>
                <p>4 out of 5 stars</p>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-12">
                <h6>Sorting by newest (2 of 2 reviews)</h6>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-12">
                <?php
                    if(isset($_SESSION['user'])) {
                        if ($courseDetails->userPostedReview($_SESSION['user']['name'])) {
                            echo '<button type="button" class="btn btn-warning" disabled>
                                Already reviewed this course
                            </button>';
                        } else {
                            $courseDetails->outputReviewForm($_SESSION['user']['email']);
                            echo '<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
                                Post Review
                            </button>';
                        }
                    }
                    else {
                        echo '<button type="button" class="btn btn-warning" disabled>
                            Login to add your review
                        </button>';
                    }
                ?>
            </div>
        </div>
        <?php foreach ($courseDetails->getReviews() as $review) { ?>
            <div class="review mb-3">
                <div class="row mb-1">
                    <div class="col-12">
                        <h5 class="font-weight-bold"><?php echo $review->getName(); ?></h5>
                        <h6 class="d-sm-inline mr-sm-2"><i class="fas fa-chalkboard-teacher text-orange" aria-label="Professor"></i> <?php echo $review->getInstructor(); ?></h6>
                        <h6 class="d-sm-inline mr-sm-2"><i class="fas fa-calendar-day text-orange" aria-label="Semester"></i> <?php echo $review->getSemester(); ?></h6>
                        <h6 class="d-sm-inline"><i class="fas fa-school text-orange" aria-label="Campus"></i> <?php echo $review->getCampus(); ?></h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="mb-2"><?php echo $review->getDescription(); ?></p>
                    </div>
                    <div class="col-12">
                        <?php
                            for ($i = 0; $i < $review->getRating(); $i++) {
                                echo '<i class="fas fa-star text-orange"></i>';
                            }
                            while ($i != 5) {
                                echo '<i class="far fa-star text-orange"></i>';
                                $i++;
                            }
                        ?>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
    <br />
</main>

<?php include('resources/includes/footer.inc.php'); ?>


<script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>

</body>

</html>


