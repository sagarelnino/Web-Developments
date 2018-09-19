<?php
	require 'session_required.php';
	require 'connection.php';
	$id=$_GET['id'];
	$customer_id=$_SESSION['id'];
	$torres=$user->getFlat($id);
	//var_dump($torres);
	$house_owner_id=$torres[0]['flat_owner_id'];
	$user->requestFlat($id,$customer_id,$house_owner_id);
	header("location:broad_search.php");


?>