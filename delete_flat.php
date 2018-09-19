<?php
require 'session_required.php';
require 'connection.php';

$id=$_GET['id'];

$user->deleteFlat($id);
$user->deleteFlatRequest($id);
header("location:view_my_flat.php");
?>