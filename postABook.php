<!doctype html>
<html lang="en">
    <head>
        <?php include("resources/includes/head.inc.php"); ?>
    </head>
    <body>
        <?php include("resources/includes/header.inc.php"); ?>
        
        <main>
<br></br>
        <div  class="container-fluid" >


			<div class="row">

			<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
                <div class="card bg-blue mt-5">
                    <div class="card-body px-4 text-white">
                        <h4 class="font-weight-bold text-center">Post a Book</h4>
                        <form action="postABook.php" method="post">
							<div class="form-group text-left">
								<label for="title">Title:</label>
								<input type="text" class="form-control" name="title">
							</div>
							<div class="form-group text-left">
								<label for="isbn">ISBN:</label>
								<input type="text" class="form-control" name="isbn">
							</div>
							<div class="row">
							<div class="form-group text-left col-sm-6">
								<label for="price">Price:</label>
								<input type="text" class="form-control" name="price">
							</div>
							<div class="form-group text-left col-sm-6">
								<label for="condition">Condition:</label>
								<select class="form-control" name="condition">
									<option value="New">New</option>
									<option value="Min">Some Damage</option>
									<option value="Bad">Bad</option>
								</select>
							</div>
							</div>
							
							<div class="form-group text-left">
								<label for="desc">Description</label>
								<textarea class="form-control" row="5" cols="50" name="desc" >enter short description</textarea>
							</div>
								<button type="submit" class="btn btn-warning btn-block">Submit</button>
						</form>

                    </div>
                </div>
            </div>


		</div>
		</div> 

        </main>

        <?php include("resources/includes/footer.inc.php"); ?>
    </body>
</html>
