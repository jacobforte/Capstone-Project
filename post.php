<?php

include("resources/function/dbconnection.functions.php");

$email = $_POST["email"];
$dnam = $_POST["dnam"];
$pwd = $_POST["pwd"];

dbconnection("spNewUser($email, $dnam, $pwd)");
	
	
header('Location: login.php');
exit;
	


?>
