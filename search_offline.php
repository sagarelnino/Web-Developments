<?php
session_start();

require 'connection.php';

if(isset($_POST['submit']))
{
	$flat_division=$_POST['flat_division'][0];
	$_SESSION['flat_division']=$flat_division;
	$flat_type=$_POST['flat_type'][0];
	$_SESSION['flat_type']=$flat_type;
	header("location:search_final_offline.php");
	
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
		<div class="col-md-offset-4 col-md-4">
			<div class="flat">
			<p class="head"><b> Choose Your flat location & type: </b></p><br>
				<form method="POST">
					  <div class="form-group">
					    <label for="formGroupExampleInput">Select Division</label>
						<select name="flat_division[]" class="form-control" id="slct1" >  
	                        <option value="Dhaka">Dhaka</option>
	                        <option value="Chittagong">Chittagong</option>
	                        <option value="Barisal">Barisal</option>
	                        <option value="Rajshahi">Rajshahi</option>
	                        <option value="Sylhet">Sylhet</option>
	                        <option value="Khulna">Khulna</option>
	                        <option value="Rangpur">Rangpur</option>
                        
                        </select>
					  </div>

					  
					  <div class="form-group">
					    <label for="formGroupExampleInput2">Flat type</label>
					    <select name="flat_type[]" class="form-control">  
	                        <option>For family</option>
	                        <option>Sharing</option>
	                        
                        
                      </select>
					    
					  </div>
					  
					  
					  <div class="form-group">
					    <button type="submit" class="btn btn-success" input type="submit" name="submit"> Submit </button>
					  </div>
				</form>
			</div>
		</div>

	</div>


	
	
</body>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</html>