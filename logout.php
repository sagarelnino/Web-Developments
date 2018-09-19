<?php
	session_start();
	
	session_destroy();
	unset($_SESSION['email']);
	unset($_SESSION['password']);
	$_SESSION['message'] = "You have been logged out";
	header ("location: home.php");
	
?>