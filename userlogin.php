<?php
	
	session_start();

	include 'dbconnection.function.php';
	
	$email = $_POST['email'];
	$password = $_POST['pwd'];
	
	dbconnection("spSelectUser('$email', '$password')");
	
	$_SESSION['username'] = $_POST['email'];
	
	
	header('Location: index.php');
	exit;
	



?>
