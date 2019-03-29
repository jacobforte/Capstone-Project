<?php include('resources/functions/account.listings.function.php'); ?>
<!doctype html>
<html lang="en">
    <head>
        <?php include("resources/includes/head.inc.php"); ?>
    </head>
    <body>
        <?php include("resources/includes/header.inc.php"); ?>

        <main>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2 col-12 py-2 py-lg-3 pb-lg-4" style="background-color: #EDF2F4;">
                        <nav class="nav nav-pills flex-column flex-sm-row flex-lg-column">
                            <a class="h5 mb-1 text-blue font-weight-bold flex-fill text-lg-right text-center nav-link" href="#">Account</a>
                            <a class="h5 mb-1 text-blue font-weight-bold flex-fill text-lg-right text-center nav-link" href="#">Notifications</a>
                            <a class="h5 mb-1 text-blue font-weight-bold flex-fill text-lg-right text-center nav-link" href="#">Courses</a>
                            <a class="h5 mb-1 text-blue font-weight-bold flex-fill text-lg-right text-center nav-link" href="#">Listings</a>
                        </nav>
                    </div>
                    <div class="col-12 col-lg-10 pt-4 pb-4">
                        <div class="mb-3">
                            <div class="row mb-3">
                                <div class="col-12">
                                    <h4 class="font-weight-bold">Your Listings</h4>
                                </div>
                            </div>
                        </div>
                        <?php outputUserListings("zbrockwa@kent.edu"); ?>
                    </div>
                </div>
            </div>
        </main>

        <?php include("resources/includes/footer.inc.php"); ?>
    </body>
</html>