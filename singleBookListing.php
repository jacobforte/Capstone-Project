<?php 
require_once("resources/functions/dbconnection.function.php");
$isbn = "12345";
$title ="Test";
$author = "Thanos";
$books = dbconnection("spSelectUserSellBook( \"". $isbn. "\", \"". $title. "\", \"". $author. "\", NULL,NULL, NULL)");
?>
<!doctype html>
<html lang="en">
<head>
  <title>Book Listing</title>
  <?php include("resources/includes/head.inc.php"); ?>
</head> 
    <body>
        <?php include("resources/includes/header.inc.php"); ?>
       <main>
			<div class="col">
				<div class="container">
					<div class="col-md-auto mt-9">
						<h1> Title <?php 
									foreach ($books as $book) {
										echo $row['title'];
									 }
										?> </h1>
							<p> <b> Author  <?php 
									foreach ($books as $book) {
										echo $row['author'];
									 }
										?> </b> <br></br> </p>
							<p> <b> ISBN  <?php 
									foreach ($books as $book) {
										echo $row['isbn'];
									 }
										?> </b> <br>  </br> </p>
							<button type="button" class="btn btn-warning" action="postABook.php"> Sell Your Textbook </button>
					</div>
				</div>
			</div>
				<h2> <?php 
									foreach ($books as $book) {
										echo $row['title'];
									 }
					?> Images </h2>
					<?php  $result = $_GET['image']; ?>

					<img src="images/gallery/<?php echo $result ?>.jpg">
	

		</main>
		
    <?php include("resources/includes/footer.inc.php"); ?>

    </body>
</html>
