<?php

include("resources/functions/dbconnection.function.php");

$email = $_POST["email"];
$dnam = $_POST["dnam"];
$pwd = $_POST["pwd"];

dbconnection("spNewUser('$email', '$dnam', '$pwd')");
	
	
header('Location: login.php');
exit;
	


?>
