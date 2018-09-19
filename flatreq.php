<?php
require 'session_required.php';
require 'connection.php';
$id = $_SESSION['id'];
$fifa = $user->getFlatCustomer($id);
//var_dump($fifa);


?>
<!DOCTYPE html>
<html>
<head>
	<title>My Flat Cart</title>
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
				$name=$result['flat_id'];
				//echo $name;
				$pes=$user->getFlat($name);
				//var_dump($pes);
			?>
				<div class="final">
					<div class="row">
						<div class="col-md-5">
							<img src="user_images/<?php echo $pes[0]['flat_picture']; ?>" class="img-rounded" alt="Cinque Terre" width="204" height="436">


						</div>
						<div class="col-md-3">
							<p> For: <?php echo $pes[0]['flat_type'];?> </p>
								<p> Monthly rent: <?php echo $pes[0]['flat_rent'];?> tk</p>
								<p> Advance: <?php echo $pes[0]['flat_rent_advance'];?> tk </p>
								<h4> Posted On: <?php echo $pes[0]['flat_date']; ?> </h4>
							
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