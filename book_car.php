<?php
	require 'session_required.php';
	require 'connection.php';
	if (isset($_POST['submit']))
	{
		$car_id=$_GET['id'];
		$car_customer_id=$_SESSION['id'];
		$car_from=$_POST['car_from'];
		$car_to=$_POST['car_to'];
		$car_address=$_POST['car_address'];
		$car_number=$_POST['car_number'][0];
		$car_request_date=$_POST['car_request_date'];
		$car_date=date("d.m.y");
		$user->insert_car_request($car_id,$car_customer_id,$car_from,$car_to,$car_number,$car_request_date,$car_date,$car_address);
		header("location:car_online.php");


	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>BooK Car</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link type="text/css" rel="stylesheet" href="css/font-awesome.min.css">
	<link type="text/css" rel="stylesheet" href="css/car.css">
	<link type="text/css" rel="stylesheet" href="css/navbar.css">
	<link type="text/css" rel="stylesheet" href="styles/footer.css">
	<link type="text/css" rel="stylesheet" href="css/customers.css">
	
</head>
<body>
<?php include 'navbar_logged_in.php';  ?>
	<div class="container">
	<div class="col-md-offset-2 col-md-8 req">
	<form method="POST">
		  <div class="form-group">
		    <label for="exampleInputEmail1">From Where</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="car_from" required>
		    <small id="emailHelp" class="form-text text-muted">From where you want to start</small>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">To</label>
		    <input type="text" class="form-control" id="exampleInputPassword1" name="car_to" required>
		  </div>
		  <div class="form-group">
		    <label for="exampleSelect1">Number of vehicles</label>
		    <select class="form-control" id="exampleSelect1" name="car_number[]">
		      <option>1</option>
		      <option>2</option>
		      <option>3</option>
		      <option>4</option>
		      <option>5</option>
		    </select>
		  </div>

		  <div class="form-group">
		    <label for="exampleInputFile">Date</label><br>
		    <input type="date" class="form-control-file" id="exampleInputFile" name="car_request_date" aria-describedby="emailHelp" required>
		    
		  </div>
		  
		  <div class="form-group">
		    <label for="exampleTextarea">Your Address</label>
		    <textarea class="form-control" name="car_address" id="exampleTextarea" rows="3" required></textarea>
		  </div>
		  
		  
		  
		  <button type="submit" class="btn btn-primary" input type="submit" name="submit" onclick="alert('Thank You for booking')">Submit</button>
	</form>
	</div>
	</div>
	<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>