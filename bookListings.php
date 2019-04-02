<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv='content-type' content='text/html;charset=utf-8' />

<link rel="stylesheet" href="resources/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="resources/js/bootstrap.min.js"></script>

<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">

<link rel="stylesheet" href="resources/css/capstoneCSSFile.css">    </head>

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

			    <form method="post" action="/bookListing.php">
			      <div data-role="option">
				<label for="price-min">Price Max:</label>
				<input type="range" name="price-min" id="price-min" value="25" min="0" max="500">      
			      </div>
			    </form>
			  </div>
			<input type="submit" data-inline="true" class="btn btn-warning" value="Submit" class="col-md-2">
	</div>

	</main>


        <?php include("resources/includes/footer.inc.php"); ?>
    </body>
</html>
