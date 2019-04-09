<?php 
require_once("resources/functions/dbconnection.function.php");
$isbn = "12345";
$title ="Test";
$author = "Thanos";
$books = dbconnection("spSelectUserSellBook( \"". $isbn. "\", \"". $title. "\", \"". $author. "\", NULL,NULL, NULL)");
$email ="vta@kent.edu";
$bookCondition="Fair";
$price ="32";
$postDate ="2019-11-11";
$User = dbconnection("spSelectUserSellBook(NULL, \"". $email. "\", \"". $bookISBN. "\", NULL,NULL, \"". $bookCondition. "\",\"". $price. "\",\"". $postDate. "\",)");
$sql = "SELECT * FROM books left join UserSellBook on isbn "; 
if ($res = mysqli_query($link, $sql)) { 
    if (mysqli_num_rows($res) > 0) { 
        echo "<table>"; 
        echo "<tr>"; 
        echo "<th>Title</th>"; 
        echo "<th>ISBN</th>"; 
        echo "<th>Email</th>";
	echo "<th>Book Conditon </th>"; 
        echo "<th>Price </th>"; 
        echo "<th>Post Date</th>"; 
        echo "</tr>"; 
        while ($row = mysqli_fetch_array($res)) { 
            echo "<tr>"; 
            echo "<td>".$row['title']."</td>"; 
            echo "<td>".$row['isbn']."</td>"; 
            echo "<td>".$row['email']."</td>"; 
            echo "<td>".$row['bookCondition']."</td>"; 
            echo "<td>".$row['price']."</td>"; 
            echo "<td>".$row['postDate']."</td>"; 
            echo "</tr>"; 
        } 
        echo "</table>"; 
        mysqli_free_res($res); 
    } 
    else { 
        echo "No matching records are found."; 
    } 
} 
else { 
    echo "ERROR: Could not able to execute $sql. "
                                .mysqli_error($link); 
} 
mysqli_close($link); 
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
										echo $book['title'];
									 }
										?> </h1>
							<p> <b> Author </b> <br></br> </p>
							<p> <b> ISBN </b> <br>  </br> </p>
							<button type="button" class="btn btn-warning" action="postABook.php"> Sell Your Textbook </button>
   						 <div class="row 1">
							<div class="col-sm-auto mt-3">
								<h2> Filters </h2>
                                    <form method="get" action="/s" class="aok-inline-block a-spacing-none">
                                        
                                        <span class="a-dropdown-container"><label for="s-result-sort-select" class="a-native-dropdown"><b> Sort by:</b> </label><select name="s" autocomplete="off" id="s-result-sort-select" tabIndex="-1" class="a-native-dropdown">
                                            
                                                <option value="price-asc-rank">Price: Low to High</option>
                                            
                                        <option value="price-desc-rank">Price: High to Low</option>
                                            
                                                <option value="date-desc-rank">Newest Arrivals</option>
                                            
                                        </select><span tabIndex="-1" aria-label="Sort by: " class="a-button a-button-dropdown a-button-small"><span class="a-button-inner"><span class="a-button-text a-declarative" data-action="a-dropdown-button" role="button" tabIndex="0" aria-hidden="true"><span class="a-dropdown-label"></span><span class="a-dropdown-prompt"></span></span><i class="a-icon a-icon-dropdown"></i></span></span></span>
                                    </form>
                                <form method="get" action="/s" class="aok-inline-block a-spacing-none">
                                        
                                        <span class="a-dropdown-container"><label for="s-result-sort-select" class="a-native-dropdown"><b>Condition: </b> </label><select name="s" autocomplete="off" id="s-result-sort-select" tabIndex="-1" class="a-native-dropdown">
                                      
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
		</main>
		
    <?php include("resources/includes/footer.inc.php"); ?>
    </body>
</html>
