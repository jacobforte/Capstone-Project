<html lang="en">
    <head>
        <?php include("resources/includes/head.inc.php"); ?>
    </head>
    <body>
        <?php include("resources/includes/header.inc.php"); ?>
        
        <main>
            
            <div  class="container-fluid" style="width: 500px; height: 800px;">

<div class="row">

<div class="col-sm-12 text-center" >

  <div class="panel panel-default ">

	<div id="loginform" class="panel-body">
	<h1>Sign-in</h1>
		<form action="userlogin.php" method="post">
			<div class="form-group text-left">
				<label for="email">Email address:</label>
				<input type="email" class="form-control" name="email">
			</div>
			<div class="form-group text-left">
				<label for="pwd">Password:</label>
				<input type="password" class="form-control" name="pwd">
			</div>
				<button type="submit" class="btn btn-warning btn-block">Submit</button>
				<br></br>
			<a href="register.php"><p>Don't have an Account?</p></a>
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
