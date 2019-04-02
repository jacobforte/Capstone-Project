<!doctype html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> 

    <head>
        <?php include("resources/includes/head.inc.php"); ?>
    </head>
    <body>
        <?php include("resources/includes/header.inc.php"); ?>

       <main>
	<div class="col">
    <div class="container">

	<img src="testing.jpg" class="col-md-4" alt="Datebase" width="150" height="400"> 
	<div class="col-md-auto mt-9">
	<h1> Title <?php $row['title']?> </h1>
		<p> <b> Author </b> <br><?php $row['author']?> </br> </p>
		<p> <b> ISBN </b> <br> <?php $row['isbn']?> </br> </p>
		<button type="button" a href="postABook.php"> Sell a Textbook </button>
	<div class="row">
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
	  <?php //} elseif {?>
 <div data-role="main" class="ui-content">
    <form method="post" action="/action_page_post.php">
      <div data-role="option">
        <label for="price-min">Price Range:</label>
        <input type="range" name="price-min" id="price-min" value="25" min="0" max="500">      
      </div>
    </form>
  </div>

	</div>

	</main>


        <?php include("resources/includes/footer.inc.php"); ?>
    </body>
</html>
