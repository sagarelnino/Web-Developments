<?php 
	require 'session_required.php';
	require 'connection.php';
	$id = $_GET['id'];
	$user->deleteHouseOwner($id);
	$user->deleteFlatHo($id);
	header("location:view_house_owners.php");

?>