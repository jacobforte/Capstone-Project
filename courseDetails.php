<?php include('resources/functions/course/course.details.list.function.php'); ?>
<!doctype html>
<html lang="en">
<head>
    <?php include("resources/includes/head.inc.php"); ?>
</head>
<body>
<?php include("resources/includes/header.inc.php"); ?>

<main class="mb-4">
    <div class="container">

        <?php
            if ((isset($_POST['termSubmit'])))
                printHeader($_GET["id"], $_POST['term']);
            else
                printHeader($_GET["id"], "2019-06-10:2019-08-17");
        ?>

        <div class="row mb-3">
            <div class="col-12 col-sm-6 col-md-3">
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
            if ((isset($_POST['termSubmit'])))
                outputAllSectionsFor($_GET["id"], $_POST['term']);
            else
                outputAllSectionsFor($_GET["id"], "2019-06-10:2019-08-17");
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
                <p>4 out of 5 stars</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h6>Sorting by newest (2 of 2 reviews)</h6>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-12">
                <button class="btn btn-warning">Post Review</button>
            </div>
        </div>
        <div class="review mb-3">
            <div class="row mb-1">
                <div class="col-12">
                    <h5 class="font-weight-bold">zbrockway</h5>
                    <h6 class="d-sm-inline mr-sm-2"><i class="fas fa-chalkboard-teacher text-orange" aria-label="Professor"></i> Dr. Guercio</h6>
                    <h6 class="d-sm-inline mr-sm-2"><i class="fas fa-calendar-day text-orange" aria-label="Semester"></i> Spring 2019</h6>
                    <h6 class="d-sm-inline"><i class="fas fa-school text-orange" aria-label="Campus"></i> Stark</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam tellus neque, rhoncus sit amet felis id, placerat
                        bibendum erat. Suspendisse potenti. Integer vel.</p>
                </div>
                <div class="col-12">
                    <i class="fas fa-star text-orange"></i>
                    <i class="fas fa-star text-orange"></i>
                    <i class="fas fa-star text-orange"></i>
                    <i class="fas fa-star text-orange"></i>
                </div>
            </div>
        </div>
        <div class="review mb-3">
            <div class="row mb-1">
                <div class="col-12">
                    <h5 class="font-weight-bold">evargo</h5>
                    <h6 class="d-sm-inline mr-sm-2"><i class="fas fa-chalkboard-teacher text-orange" aria-label="Professor"></i> Dr. Guercio</h6>
                    <h6 class="d-sm-inline mr-sm-2"><i class="fas fa-calendar-day text-orange" aria-label="Semester"></i> Spring 2019</h6>
                    <h6 class="d-sm-inline"><i class="fas fa-school text-orange" aria-label="Campus"></i> Stark</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id tempus massa.</p>
                </div>
                <div class="col-12">
                    <i class="fas fa-star text-orange"></i>
                    <i class="fas fa-star text-orange"></i>
                    <i class="fas fa-star text-orange"></i>
                    <i class="fas fa-star text-orange"></i>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include('resources/includes/footer.inc.php'); ?>

</body>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>

<script src="resources/js/course.details.js"></script>
</html>