<?php 
	require 'session_required.php';
	require 'connection.php';
	$id = $_GET['id'];
	$user->deleteCustomer($id);
	$user->deleteFlatCu($id);
	header("location:view_customers.php");

?>