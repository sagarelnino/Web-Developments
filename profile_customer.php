<?php
require 'session_required.php';

require 'connection.php';
$id=$_SESSION['id'];

$doc=$user->getCustomerId($id);
//var_dump($doc);
//var_dump($_SESSION);




?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Customer Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css">
 <link type="text/css" rel="stylesheet" href="css/doctor_profile.css">
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
 else if($user_type="Customer")
 {
  include 'navbar_logged_in.php'; 
 }

?>

	<div class="container">
		<div class="row">
		<div class="profile">
			<div class="col-md-4">
				<img class="img-circle" alt="Cinque Terre" width="404" height="436" src="user_images/<?php if($doc['customer_picture']==null)
				 {
					echo "4.jpg";
					} 
					else
					{
						echo $doc['customer_picture'];
					}
					?>">

			</div>
			<div class="col-md-offset-2 col-md-4">
				<div class="details">
					<p><i class="fa fa-address-book" aria-hidden="true"></i> Name: <?php echo $doc['customer_name'];?> </p>
					<p><i class="fa fa-envelope" aria-hidden="true"></i> Email: <?php echo $doc['customer_email'];?> </p>
					<p><i class="fa fa-mobile" aria-hidden="true"></i> Mobile Number: <?php echo $doc['customer_phone_number'];?> </p>
					<p><i class="fa fa-industry" aria-hidden="true"></i> Occupation: <?php echo $doc['customer_occupation'];?> </p>
					<p><i class="fa fa-address-book" aria-hidden="true"></i> National Id: <?php echo $doc['customer_national_id'];?> </p>
				

				</div>
				<div class="list">
				<button type="button" onclick="window.location.href='edit_customer.php'" class="btn btn-success new"> Edit Profile</button>
				<br>
				<button type="button" onclick="window.location.href='search.php'" class="btn btn-primary new"> Find Flat</button>



				</div>
			</div>
		</div>
		</div>
	</div>


	
	
</body>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</html>