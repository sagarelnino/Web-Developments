<?php 
require 'session_required.php';
require 'connection.php';
$id=$_SESSION['id'];

$flats=$user->getAllFlat();

//var_dump($flats);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>My flats</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css">
 <link type="text/css" rel="stylesheet" href="css/view_my_flat.css">
 <link type="text/css" rel="stylesheet" href="css/navbar.css">
 <link type="text/css" rel="stylesheet" href="styles/footer.css">
 <script src="../../ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
 
</head>

<body>
<?php
	include 'navbar_admin.php';
?>
<div class="container">
	<div class="row">
		<div class="flat_section">
			
				<div class="col-md-offset-1 col-md-10">
					<div class="row">
					<?php foreach ($flats as $result)
					{ 

						$person=$result['flat_id'];
						$cavani=$user->getFlatRequest($person);
						?>
						<div class="my_flat">
							<div class="col-md-6">
								<img class="img-rounded" alt="Cinque Terre" width="304" height="236" src="user_images/<?php if($result['flat_picture']==null)
								{
									echo 'No-image-available.jpg';
								}
								else
								{
									echo $result['flat_picture'];
								}
								?>">
							</div>
							<div class="col-md-6">
								<h3> Flat available in <?php echo $result['flat_area'].",".$result['flat_division']; ?> </h3>
								<h4> <?php echo $cavani; ?> person requested for this flat </h4>
								<p> For: <?php echo $result['flat_type'];?> </p>
								<p> Monthly rent: <?php echo $result['flat_rent'];?> tk</p>
								<p> Advance: <?php echo $result['flat_rent_advance'];?> tk </p>
								<h4> Posted On: <?php echo $result['flat_date']; ?> </h4>

								<button type="button" class="btn btn-info" onclick="confirm_ex()">More details</button>
								
								<button type="button" class="btn btn-danger" onclick="confirm_delete()">Delete</button>

							</div>

						</div>

						<?php } ?>

						
					</div>
				</div>
			
		</div>
	</div>
</div>
<script type="text/javascript">
	function confirm_ex()
	{
		if(confirm("Sure??"))
		{
			window.location.href='flat.php?id=<?php echo $result['flat_id'];?>'
		}

	}

	function confirm_delete()
	{
		if(confirm("Delete this add??"))
		{
			window.location.href='delete_flat_admin.php?id=<?php echo $result['flat_id'];?>'		}

	}
</script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script> 
</body>
</html>