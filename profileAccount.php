<?php include('resources/functions/account/account.listings.list.function.php'); ?>
<!doctype html>
<html lang="en">
    <head>
        <?php include("resources/includes/head.inc.php"); ?>
        <title>Profile | BookIt - KSU</title>
    </head>
    <body>
        <?php include("resources/includes/header.inc.php"); ?>
		<?php
		
		include_once("resources/functions/dbconnection.function.php");
		
			

			/*if(isset($_POST['email'])){
				$newemail = $_POST['email'];
				$currentemail = $_SESSION['user']['email'];
				
				dbconnection("spUpdateUser('$newemail', '$_SESSION['user']['name']', '$_SESSION['user']['password']', '$_SESSION['user']['id'])");
				
			}*/
			
			
			
		?>
        <main>
            <div class="container-fluid" >
                <div class="row">
                    <div class="col-lg-2 col-12 py-2 py-lg-3 pb-lg-4 bg-light">
                        <nav class="nav nav-pills flex-column flex-sm-row flex-lg-column">
                            <a class="h5 mb-1 text-blue font-weight-bold flex-fill text-lg-right text-center nav-link" href="#">Account</a>
                            <a class="h5 mb-1 text-blue font-weight-bold flex-fill text-lg-right text-center nav-link" href="#">Notifications</a>
                            <a class="h5 mb-1 text-blue font-weight-bold flex-fill text-lg-right text-center nav-link" href="#">Courses</a>
                            <a class="h5 mb-1 text-blue font-weight-bold flex-fill text-lg-right text-center nav-link" href="#">Listings</a>
                        </nav>
                    </div>
                    <div class="col-12 col-lg-10 pt-4 pb-4">
						<h1><strong>Account</strong></h1>
						<div >
							<form action="profileAccount.php" method="post">
								<div>
									<h3>Email:</h3>

									<input type="email" name="email">
								</div>
								<br></br>
								
								<div><h2>Change password</h2></div>
								<br>
								<div>
									<h3>Enter new password:</h3>
									<input type="text" name="password">
								</div>
								<div>
									<h3>Confirm new password:</h3>
									<input type="text" name="confirm">
								</div>
								<br></br>
								<button type="submit" class="btn btn-lg bg-orange">Update</button>
							</form>
							<br>
							<?php
							
							if(isset($_POST['password'])){
								if($_POST['password'] == $_POST['confirm']){
									echo '<p>Password was changed</p>';
					
								}
								else{
									echo '<p>Passwords do not match re-enter please.</p>';
								}
				
							}
			
							
							?>
						</div>
                    </div>
                </div>
            </div>
        </main>

        <?php include("resources/includes/footer.inc.php"); ?>
    </body>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
            crossorigin="anonymous"></script>

    <script src="resources/js/account.listings.js"></script>
</html>
