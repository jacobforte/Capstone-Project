<?php 
    require_once("resources/functions/dbconnection.function.php");

    $bookID = "";
    if (isset($_GET["id"])) {
        $bookID = $_GET["id"];
    }

    $bookData = dbconnection("spSelectUserSellBook({$bookID}, NULL, NULL, NULL, NULL, NULL)");
    if (count($bookData) != 1) {
        die("Error: invalid book posting.");
    }
    $bookData = $bookData[0];
    $photos = dbconnection("spSelectUserSellBookPhoto({$bookID})");
    $sellerInfo = dbconnection("spSelectEmail(\"". $bookData["email"] ."\")")[0];
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Book Listing</title>
        <?php include("resources/includes/head.inc.php"); ?>
        <link type="text/css" rel="stylesheet" href="resources/css/lightslider.css">
        <script src="resources/js/lightslider.js"></script>
    </head> 
    <body>
        <?php include("resources/includes/header.inc.php"); ?>

        <main class="container my-4">
            <div class="row">
                <div class="col">
                    <h1 class="mt-2"><?php echo $bookData["title"];?></h1>
                    <h2 class="mt-2">Seller</h2>
                    <p><?php echo $sellerInfo["name"];?></p>
                    <h2 class="mt-2">ISBN</h2>
                    <p><?php echo $bookData["bookISBN"];?></p>
                    <h2 class="mt-2">Condition</h2>
                    <p><?php echo $bookData["bookCondition"];?></p>
                    <h2 class="mt-2">Price</h2>
                    <p>$<?php
                            if (empty($bookData["price"])) {echo "0.00";}
                            else {echo $bookData["price"];}
                        ?></p>
                    <h2 class="mt-2">Listing Description</h2>
                    <p><?php echo $bookData["longDescription"];?></p><br>
                    <button class="btn bg-orange mt-4 mb-4" type="button">Contact Seller</button>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?php if (count($photos) > 0) {?>
                        <h1>Pictures</h1>
                        <ul id="lightSlider">
                            <?php
                                foreach($photos as $photo) {
                                    echo "<li>
                                        <img src='resources/images/{$photo['photoName']}' alt='Picture'>
                                    </li>";
                                }
                            ?>
                        </ul>
                    <?php }else {?>
                        <p>There are no pictures for this book</p>
                    <?php }?>
                </div>
            </div>
        </main>

        <?php include("resources/includes/footer.inc.php"); ?>

    </body>
</html>

<script type="text/javascript">
  $(document).ready(function() {
    $("#lightSlider").lightSlider(); 
  });
</script>