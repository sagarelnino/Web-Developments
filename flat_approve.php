<?php
	require 'session_required.php';
	require 'connection.php';
	$id=$_GET['id'];
	$user->ApproveFlat($id);
	header("location:alladd.php");

?>