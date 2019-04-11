<?php
    require("resources/functions/course/CourseDetails.php");
?>
<!doctype html>
<html lang="en">
<head>
    <?php include("resources/includes/head.inc.php"); ?>
    <script src="resources/js/course.details.js"></script>
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

        <?php if (sizeof($courseDetails->getSections()) == 0) { ?>

        <div class="row">
            <div class="col-12">
                <h5 class="my-4">No sections found for selected term.</h5>
            </div>
        </div>

        <?php } ?>

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

            $courseDetails->outputReviewSection();
            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br />
</main>

<?php include('resources/includes/footer.inc.php'); ?>

</body>
</html>


