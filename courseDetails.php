<?php include('resources/functions/course/course.details.list.function.php'); ?>
<!doctype html>
<html lang="en">
<head>
    <?php include("resources/includes/head.inc.php"); ?>
</head>
<body>
<?php include("resources/includes/header.inc.php"); ?>

<main>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 pt-4">
                <h3 class="font-weight-bold">Introduction to Computer Science</h3>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-12 col-md-9 col-lg-6 col-xl-5">
                <div class="row">
                    <div class="col-12 col-sm-3">
                        <h5>CS-10051</h5>
                    </div>
                    <div class="col-12 col-sm-3">
                        <h5>4 Credits</h5>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h5>34 Seats Available</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12 col-sm-6 col-md-3">
                <select class="custom-select">
                    <option selected>Spring 2019</option>
                    <option value="1">Summer 2019</option>
                    <option value="2">Fall 2019</option>
                </select>
            </div>
        </div>

        <?php outputAllSectionsFor($_GET["id"]); ?>

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