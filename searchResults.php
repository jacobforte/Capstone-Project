<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once("resources/functions/searchResults.function.php");

    $search = "";
    $searchType = "courseNo";
    if (isset($_POST["search"]) && isset($_POST["searchType"])) {
        $search = $_POST["search"];
        $searchType = $_POST["searchType"];
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <?php include("resources/includes/head.inc.php"); ?>
    </head>
    <body>
        <?php include("resources/includes/header.inc.php"); ?>

        <main class="container mt-4">
            <div class="row">
                <div class="col-sm-auto mt-3">
                    <br><br>
                    <strong>Filters</strong>
                    <?php if ($searchType=="courseNo") {?>
                        <div>
                            Show Campus<br>
                            <input type="checkbox"> Kent<br>
                            <input type="checkbox"> Stark<br>
                        </div>
                    <?php } else {?>
                        <div>
                            Condition<br>
                            <input type="checkbox"> New<br>
                            <input type="checkbox"> Like New<br>
                        </div>
                    <?php }?>
                </div>
                <div class="col">
                    <div class="container">
                        <form class="row" method="post" action="searchResults.php">
                            <div class="col-sm">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search" value="<?php echo($search)?>">
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <div class="form-group">
                                    <select class="form-control" name="searchType">
                                        <?php if ($searchType=="courseNo") {?>
                                            <option value="courseNo" selected>Course No</option>
                                            <option value="isbn">Book ISBN</option>
                                        <?php } else {?>
                                            <option value="courseNo">Course No</option>
                                            <option value="isbn" selected>Book ISBN</option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <div class="form-group">
                                    <button type="submit" class="btn bg-orange w-160p"><strong>Submit</strong></button>
                                </div>
                            </div>
                        </form>
                        <?php
                            if ($searchType=="courseNo") {
                                outputClasses($search);
                            }
                            else {

                            }
                        ?>
                    </div>
                </div>
            </div>
        </main>

        <?php include("resources/includes/footer.inc.php"); ?>
    </body>
</html>