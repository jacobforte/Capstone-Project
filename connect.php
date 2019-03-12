<html>
<!DOCTYPE html>
<html>
<head>
     <meta http-equiv='content-type' content='text/html;charset=utf-8' />
     <title>Capstone Project: BookIt </title>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="/bootstrap/css">
</head>
<body>

<div class="container">

<header>
   <h1> BookIt </h1>
<?php
$user = 'root';
$pass = '';
$db = 'foodcm';

$db = new mysqli('localhost',$user, $pass, $db) or die("Unable to connect");

?>
</header> 
<nav>
  <ul>
    <li><a href="home.php">Home Page<br></a></li>
	<li><a href="register.php">Register<br></a></li>
	<li><a href="signup">Sign Up<br></a></li>
	<li><a href="profile.php">User Account<br></a></li>
	<li><a href="search.php">Search Book<br></a></li>
	<li><a href="booklisting.php">Book Listing<br></a></li>
	<li><a href="course.php">Course Lookup<br></a></li>
	<li><a href="book details.php">Book details<br></a></li>
  </ul>
</nav>

</html>

