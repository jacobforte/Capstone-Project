
<?php 
    require_once("resources/functions/dbconnection.function.php");
   
    $isbn ="";
    if (isset($_GET["isbn"])) {
        $isbn = $_GET["isbn"];
    }
    $book = dbconnection("spSelectSingleBook( \"". $isbn ."\")")[0];
    $booksList = dbconnection("spSelectUserSellBook(NULL, NULL,\"". $isbn ."\" ,NULL, NULL, NULL)")[0];
?> 

<!doctype html>
<html lang="en">

<head>
  <title>Book Listing</title>
  <?php include("resources/includes/head.inc.php"); ?>
</head> 
    <body>
        <?php include("resources/includes/header.inc.php"); ?>
       <main class= "container-mt-4">
        <div class="row">
			<div class="col">
				<div class="container">
					<div class="col-md-auto mt-9">

                        <h1> <?php echo $book["title"];?> </h1>
                        <p> 
                            <strong>
                            Author 
                                <?php echo $book["author"];?>
                            </strong> 
                        </p>
                        <p> 
                            <strong>
                            ISBN 
                                <?php echo $book["isbn"];?>
                            </strong> 
                        </p>
                        <button type="button" class="btn btn-warning" a href="postABook.php"> Sell Your Textbook </button>
                            <div class="row mb-3">
                                <div class="col-sm-12 col-md-9 col-lg-6 col-xl-5">
                                    <div class="row">
                                            <p> <?php
                                                if (empty($booksList["price"])) {echo "0.00";}
                                                else {echo $booksList["price"];}
                                            ?> </p>
                                            <p><?php echo $booksList["bookCondition"];?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
    </div>
    </main>

    <?php include("resources/includes/footer.inc.php"); ?>
</body>

</html> 