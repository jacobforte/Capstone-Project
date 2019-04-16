
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
                        <p> 
                            <strong>
                            Edition 
                                <?php echo $book["edition"];?>
                            </strong> 
                        </p>
                        <button class="btn btn-warning" onclick="window.location.href='/postABook.php'">Post a Book</button>
                        </div>
                        <form action='<?php echo $_POST['UserSellBook']; ?>' method='post' name='form_filter' >

                <select name="value">
                    <option value="all">All</option>
                    <option value="price-asc-rank">Price: Low to High</option>     
                    <option value="price-desc-rank">Price: High to Low</option>

                                                    
                </select>

                <br />

                <input type='submit' value = 'Filter'>

                </form>
                <?php

                //connect to database, checking, etc

                if($_POST['value'] == 'price'){
                // query to get price 
                $query = "SELECT * FROM price WHERE name='price'";
                } else {
                // query to get all price
                $query = "SELECT * FROM price";
                }
                $sql = mysql_query($query);

                while ($row = mysql_fetch_array($query)){
                    $price = $row["price"];       
                ?>
                        </div>
                    </div>

        </div>
    </main>

<?php include('resources/includes/footer.inc.php'); ?>

</body>
</html>