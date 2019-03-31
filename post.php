<?php

dbconnection(spNewUser($_POST['email'], $_POST['dnam'], $_POST['pwd']));
	
	
	header('Location: login.php');
	exit;
	


?>
