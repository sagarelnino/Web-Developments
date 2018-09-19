<?php
require 'session_required.php';
require 'connection.php';
$id = $_SESSION['id'];
$fifa = $user->getCarCustomer($id);
//var_dump($fifa);


?>
<!DOCTYPE html>
<html>
<head>
	<title>My Cart</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	 <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css">
	 <link type="text/css" rel="stylesheet" href="css/car-req.css">
	 <link type="text/css" rel="stylesheet" href="css/navbar.css">
	 <link type="text/css" rel="stylesheet" href="styles/footer.css">
	 <link href="css/style.css" rel="stylesheet" type="text/css"/>
</head>
<body>


		
							
			<!-- Top Nav hoby !-->
<?php
	include 'navbar_logged_in.php';
?>

	<div class="container">
	<div class="col-md-offset-1 col-md-10">
		
			<div class="req">
			<?php foreach ($fifa as $result) {
				$name=$result['car_id'];
				$pes=$user->getCarId($name);
			?>
				<div class="final">
					<div class="row">
						<div class="col-md-5">
							<img src="pic/<?php echo $pes['car_image']; ?>" class="img-rounded" alt="Cinque Terre" width="204" height="436">


						</div>
						<div class="col-md-3">
							From: <?php echo $result['car_from']; ?> <br>
							To: <?php echo $result['car_to']; ?> <br>
							Address: <?php echo $result['car_address']; ?> <br>
							Number Of cars: <?php echo $result['car_number']; ?> <br>
							Requested Date: <?php echo $result['car_request_date']; ?> <br>
							Requested On: <?php echo $result['car_date']; ?> <br>
							
						</div>
						<div class="col-md-4">
							<?php  
								if ($result['car_confirm']=="confirmed")
								{?>
									<img src="pic/21956237-closeup-of-confirmed-letter-on-rubber-stamp-Stock-Photo.jpg" class="img-rounded" alt="Cinque Terre" width="204" height="436">
								<?php } ?>
							
							
						</div>
					</div>
				</div>
				<?php } ?>
			
		</div>
		</div>
	</div>

			
				
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>