<?php include('resources/functions/account/account.listings.list.function.php'); ?>
<!doctype html>
<html lang="en">
    <head>
        <?php include("resources/includes/head.inc.php"); ?>

        <script>
            function removeById(str) {
                $.ajax({
                    url:"resources/functions/account/account.listings.remove.function.php?id=" + str,
                    type: "POST",
                    data:{
                        id: str,
                    },
                    success:function(data) {
                        $('#' + str).fadeOut();
                    },
                    error:function(data){
                        alert("Whoops, something went wrong! Please try again.");
                    }
                });
            }
        </script>
    </head>
    <body>
        <?php include("resources/includes/header.inc.php"); ?>

        <main>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2 col-12 py-2 py-lg-3 pb-lg-4 bg-light">
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

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
            crossorigin="anonymous"></script>
</html>