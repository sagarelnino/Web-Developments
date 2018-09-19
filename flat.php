<?php 
require 'session_required.php';
require 'connection.php';

$id=$_GET['id'];
$torres=$user->getFlat($id);
var_dump($_SESSION);
$house_owner_id=$torres[0]['flat_owner_id'];

$fernando = $user->getOwner($house_owner_id);






?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>My flats</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link type="text/css" rel="stylesheet" href="css/flat.css">
 <link type="text/css" rel="stylesheet" href="css/view_my_flat.css">
 <link type="text/css" rel="stylesheet" href="css/navbar.css">
 <link type="text/css" rel="stylesheet" href="styles/footer.css">
 
</head>

<body>
<?php
	$user_type=$_SESSION['user_type'];
	if($user_type=="House Owner")
	{
	 	include 'navbar_house_owner.php'; 
	}
	elseif($user_type=="Customer")
	{
	  	include 'navbar_logged_in.php'; 
	}
	else
	{
	  	include 'navbar_admin.php'; 
	}
?>


	<div class="container">
		<div class="torres">
			<div class="row">
				<div class="col-md-8">
					<div class="flat-details">
						<img class="img-rounded new" alt="Cinque Terre" width="604" height="336" src="user_images/<?php if($torres[0]['flat_picture']==null)
					 	{
						echo "4.jpg";
						} 
						else
						{
							echo $torres[0]['flat_picture'];
						}
						?>">

						<div class="details">
							Place: <?php echo $torres[0]['flat_area'].",".$torres[0]['flat_division']; ?> <br>
							Available for: <?php echo $torres[0]['flat_type']; ?> <br>
							Flat Rent: <?php echo $torres[0]['flat_rent']; ?> <br>
							Advance Payable: <?php echo $torres[0]['flat_rent_advance']; ?> <br>
							Details: <?php echo $torres[0]['flat_details']; ?> <br>
							
							Have a look?? <a href="<?php echo $torres[0]['flat_link']; ?> " target="_blank"> See on google maps  </a>
						</div>

					</div>



				</div>

				<div class="col-md-4">


					<div class="house-owner">
					<h2 class="text-center"><i> Meet The Owner </i></h2><br><br>
						<img class="img-circle wow" alt="Cinque Terre" width="204" height="236" src="user_images/<?php if($fernando['house_owner_image']==null)
					 	{
							echo "4.jpg";
						} 
						else
						{
							echo $fernando['house_owner_image'];
						}
						?>">

						<div class="owner">
						House Owner: <?php  echo $fernando['house_owner_name'];  ?><br>
						Occupation: <?php  echo $fernando['house_owner_occupation'];  ?><br>
						Email: <?php  echo $fernando['house_owner_email'];  ?><br>
						Mobile: <?php  echo $fernando['house_owner_mobile'];  ?><br>
						Phone: <?php  echo $fernando['house_owner_phone'];  ?><br>
						Payment Method: <?php  echo $fernando['house_owner_payment_method'];  ?><br>
						Payment Id: <?php  echo $fernando['house_owner_payment_id'];  ?><br>


						</div>
					</div>


				</div>	
			</div>

			

		</div>

	</div>
	<script src="http://maps.googleapis.com/maps/api/js"></script>
	<script>
		function initMap()
		{
			var location = {lat: 23.8104659, lng: 90.327261};
			var map = new google.maps.Map(document.getElementById("maps"),{ zoom: 4, center: location});

			var marker = new google.maps.Marker({
				position: location, maps: maps
			});
		}
	</script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzc-kfI-UcyAonxaKS3pRY4nc4uPYib5w&callback=initMap">

		
	</script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script> 
</body>
</html>
