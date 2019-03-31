<?php

	require_once('config.php');

	$sql = "INSERT INTO tblUsers (email, name, password)
	VALUE ('$_POST[email]', '$_POST[dnam]', '$_POST[pwd]')";
	
	mysqli_query($connect, $sql);
	
	
	
	
	header('Location: login.php');
	exit;
	


?>