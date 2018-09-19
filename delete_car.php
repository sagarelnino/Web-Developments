<?php
require 'session_required.php';
require 'connection.php';
$id = $_GET['id'];
$user->deleteCar($id);
header("location:car_admin.php");

?>