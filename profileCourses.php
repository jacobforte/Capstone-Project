<!doctype html>
<html lang="en">
    <head>
        <?php include("resources/includes/head.inc.php"); ?>
    </head>
    <body>
        <?php include("resources/includes/header.inc.php"); ?>

        <main>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2 col-12 py-2 py-lg-3 pb-lg-4 bg-light" id="sidenav">
                        <nav class="nav nav-pills flex-column flex-sm-row flex-lg-column">
                            <a class="h5 mb-1 text-blue font-weight-bold flex-fill text-lg-right text-center nav-link" href="profileAccount.php">Account</a>
                            <a class="h5 mb-1 text-blue font-weight-bold flex-fill text-lg-right text-center nav-link" href="profileNotifications.php">Notifications</a>
                            <a class="h5 mb-1 text-blue font-weight-bold flex-fill text-lg-right text-center nav-link" href="profileCourses.php">Courses</a>
                            <a class="h5 mb-1 text-blue font-weight-bold flex-fill text-lg-right text-center nav-link" href="profileListings.php">Listings</a>
                        </nav>
                    </div>
					<div class="col-12 col-lg-10 pt-4 pb-4">
						<h1>Courses</h1>
						<br>
						<h2>You can update your notifications for your registered course by selecting the notifications tab on the left.</h2>
						<br>
						<?php
							include_once("resources/functions/dbconnection.function.php");
						
							$user = $_SESSION['user']['email'];
							
							$result = dbconnection("spSelectUserRegisteredClasses('$user')");
							
							foreach($result as $row){
								
								echo '<a href="courseDetails.php?id=CS-' . $row['crn'] . '"><h3><strong>' . $row['title'] . '</strong></h3></a>';		
								
							echo '<div class="container-fluid row">';
							echo '<div class="col-2" style="padding-left: 0;">';
								

								
								echo '<h3>CRN: ' . $row['crn'] . '</h3>';
								echo '<h3>Campus: ' . $row['campus'] . '</h3>';
								echo '<h3>Credits: ' . $row['credits'] . '</h3>';
								echo '<form action="#">';
								echo '<button type="submit" class="btn btn-lg bg-orange w-160p"><strong>Book Info</strong></button>';
								echo '</form>';
								
							echo '<br></br></div>';

							echo '<div class="col-10">';
							
								echo '<h3>Start Date: ' . $row['startDate'] . ' End Date: ' . $row['endDate'] . '</h3>';
								echo '<h3>Meeting Days: ' . $row['meetDays'] . ' Time: ' . $row['startTime'] . '-' . $row['endTime'] . '</h3>';
								echo '<h3>Instructor: ' . $row['instructor'] . '</h3>';
								echo '<form action="#">';
								echo '<button type="submit" class="btn btn-lg bg-orange w-160p"><strong>Remove</strong></button>';
								echo '</form>';
								
							echo '</div><br>';
							
							}
							
							
							
						?>
					</div>
                </div>
            </div>
        </main>

        <?php include("resources/includes/footer.inc.php"); ?>
    </body>
</html>
