
<?php 
    require_once("resources/functions/dbconnection.function.php");
   
    $isbn ="";
    if (isset($_GET["isbn"])) {
        $isbn = $_GET["isbn"];
    }

    $booksList = dbconnection("spSelectUserSellBook(NULL, NULL,\"". $isbn ."\" ,NULL, NULL, NULL)");
    $book = dbconnection("spSelectSingleBook( \"". $isbn ."\")")[0];

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
                        <button type="button" class="btn btn-warning" action="postABook.php"> Sell Your Textbook </button>
   						 <div class="row 1">
							<div class="col-sm-auto mt-3">
								<h2> Filters </h2>
                                    <form method="get" action="/s" class="aok-inline-block a-spacing-none">
                                        
                                        <span class="a-dropdown-container"><label for="s-result-sort-select" class="a-native-dropdown"><b> Sort by:</b> </label><select name="<?php echo $book["price"];?>" autocomplete="off" id="s-result-sort-select" tabIndex="-1" class="a-native-dropdown">
                                            
                                                <option value="price-asc-rank">Price: Low to High</option>
                                            
                                        <option value="price-desc-rank">Price: High to Low</option>

                                        <option value="date-desc-rank">Newest Arrivals</option>

                                    </select><span tabIndex="-1" aria-label="Sort by: " class="a-button a-button-dropdown a-button-small"><span class="a-button-inner"><span class="a-button-text a-declarative" data-action="a-dropdown-button" role="button" tabIndex="0" aria-hidden="true"><span class="a-dropdown-label"></span><span class="a-dropdown-prompt"></span></span><i class="a-icon a-icon-dropdown"></i></span></span></span>
                            </form>
                            <form method="get" action="/s" class="aok-inline-block a-spacing-none">

                                <span class="a-dropdown-container"><label for="s-result-sort-select" class="a-native-dropdown"><b>Condition: </b> </label><select name="<?php echo $book["bookCondition"];?>" autocomplete="off" id="s-result-sort-select" tabIndex="-1" class="a-native-dropdown">

                                        <option value="checkbox"> Mint</option>
                                        <option value="checkbox"> Good</option>
                                        <option value="checkbox"> Fair</option>
                                        <option value="checkbox"> Poor</option>
                                    </select><span tabIndex="-1" aria-label="Conditon: " class="a-button a-button-dropdown a-button-small"><span class="a-button-inner"><span class="a-button-text a-declarative" data-action="a-dropdown-button" role="button" tabIndex="0" aria-hidden="true"><span class="a-dropdown-label"></span><span class="a-dropdown-prompt"></span></span><i class="a-icon a-icon-dropdown"></i></span></span></span>
                            </form>
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