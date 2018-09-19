<?php 
require 'session_required.php';

require 'connection.php';

$id=$_SESSION['id'];

$flat_division=$_SESSION['flat_division'];
//var_dump($_SESSION);

$flats = $user->getFlats($flat_division);




$division = strtolower($flat_division);
$div=$division."_table";
$new = $user->getArea($div);
	if(isset($_POST['submit']))
	{
		$flat_division=$_SESSION['flat_division'];
		$flat_type=$_SESSION['flat_type'];
		$flat_area=$_POST['flat_area'][0];
		$flat_rent=$_POST['flat_rent'][0];
		$flats=$user->getfiltered($flat_division,$flat_type,$flat_area,$flat_rent);
		//var_dump($flats);
		
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Find Flat</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css">
 <link type="text/css" rel="stylesheet" href="css/search.css">
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
		<div class="flat_section">
			
				<div class="col-md-9">
					<div class="row">
					<?php foreach ($flats as $result)
					{ ?>
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
								<p> For: <?php echo $result['flat_type'];?> </p>
								<p> Monthly rent: <?php echo $result['flat_rent'];?> tk</p>
								<p> Advance: <?php echo $result['flat_rent_advance'];?> tk </p>
								<h4> Posted On: <?php echo $result['flat_date']; ?> </h4>

								<button type="button" class="btn btn-info" onclick="window.location.href='flat.php?id=<?php echo $result['flat_id'];?>'">More details</button>
								
								

							</div>

						</div>

						<?php } ?>

						
					</div>
				</div>

				<div class="col-md-3">
				<div class="fernando">
				<h2 class="text-center"> Add filters: </h2>
					<form method="POST">
					  <div class="form-group">
					    <label for="formGroupExampleInput">Select area</label>
						<select name="flat_area[]" class="form-control" id="slct1" required> 
						<?php foreach ($new as $result) {
							# code...
						?>
	                        <option value="<?php echo $result['area_name'];?>"><?php echo $result['area_name'];?></option>
	                        <?php } ?>
                        
                        </select>
					  </div>

					  
					  <div class="form-group">
					    <label for="formGroupExampleInput2">Rent within</label>
					    <select name="flat_rent[]" class="form-control">  
	                        <option>5000</option>
	                        <option>10000</option>
	                        <option>15000</option>
	                        <option>20000</option>
	                        <option>25000</option>
	                        <option>30000</option>
	                        <option>35000</option>
	                        <option>40000</option>
	                        
                        
                      </select>
					    
					  </div>
					  
					  
					  <div class="form-group">
					    <button type="submit" class="btn btn-success" input type="submit" name="submit"> Submit </button>
					  </div>
				</form>
				</div>
				</div>
			
		</div>
	</div>
</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script> 
</body>
</html>