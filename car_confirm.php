<?php
	require 'session_required.php';
	require 'connection.php';
	$id = $_GET['id'];
	$user->confirmCar($id);
	header("location:car_request.php");

?>