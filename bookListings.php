<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Book Listing</title>
  <link rel="stylesheet" href="//code.jquery.com/mobile/1.5.0-alpha.1/jquery.mobile-1.5.0-alpha.1.min.css">
  <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="//code.jquery.com/mobile/1.5.0-alpha.1/jquery.mobile-1.5.0-alpha.1.min.js"></script>
</head> 

        <?php include("resources/includes/head.inc.php"); ?>
    </head>
    <body>
        <?php include("resources/includes/header.inc.php"); ?>

       <main>
	<div class="col">
    <div class="container">

	<div class="col-md-auto mt-9">
	<h1> Title <?php $row['title']?> </h1>
		<p> <b> Author </b> <br><?php $row['author']?> </br> </p>
		<p> <b> ISBN </b> <br> <?php $row['isbn']?> </br> </p>
		<button type="button" class="btn btn-warning" action="postABook.php"> Sell Your Textbook </button>
	<div class="row 1">
    <div class="col-sm-auto mt-3">
	<h2> Filters </h2>

			<div>
				Show Condition<br>
				<input type="checkbox"> Mint<br>
				<input type="checkbox"> Good<br>
				<input type="checkbox"> Fair<br>
				<input type="checkbox"> Poor<br>
			</div>

			<div>
				Sort By<br>
				<input type="radio" id="Choice1" name="lowest" value="lowest"> Price (lowest to highest)<br>
				<input type="radio"id="Choice2" name="highest" value="highest"> Price (highest to lowest)<br>
				<input type="radio"id="Choice3" name="newest" value="newest"> Date (newest) <br>
				<input type="radio"id="Choice4" name="oldest" value="oldest"> Date (oldest)<br>
			</div>

			  <div data-role="rangeslider" data-mini="true">
			  <label for="range-4a">Price Range:</label>
			  <input name="range-4a" id="range-4a" min="0" max="1000" value="0" type="range" />
			  <label for="range-4b">Price Range:</label>
			  <input name="range-4b" id="range-4b" min="0" max="25" value="1000" type="range" />
			</div>
			<input type="submit" data-inline="true" class="btn btn-warning" value="Submit" class="col-md-2">
	</div>

	</main>


        <?php include("resources/includes/footer.inc.php"); ?>
    </body>
</html>
