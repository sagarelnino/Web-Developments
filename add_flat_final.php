<?php
require 'session_required.php';

require 'connection.php';

$id=$_SESSION['id'];

$flat_division=$_SESSION['flat_division'];


$division = strtolower($flat_division);
$div=$division."_table";
$new = $user->getArea($div);
//var_dump($new);
//var_dump($_POST);
//var_dump($_SESSION);


if(isset($_POST['submit']))
{
	$house_owner_id=$_SESSION['id'];

	$flat_division=$_SESSION['flat_division'];
	$flat_type=$_SESSION['flat_type'];
	$flat_area=$_POST['flat_area'][0];
	$flat_rent=$_POST['flat_rent'];
	$flat_rent_advance=$_POST['flat_rent_advance'];
	$flat_details=$_POST['flat_details'];
	$flat_link=$_POST['flat_link'];
	$flat_date=date("Y/m/d");

	$customer_picture=$_FILES['customer_picture']['name'];
        //var_dump($picture);
        $tmp_dir=$_FILES['customer_picture']['tmp_name'];
                
                $upload_dir='user_images/';
                $imgExt=strtolower(pathinfo($customer_picture,PATHINFO_EXTENSION));
                $userpic=$customer_picture;
                move_uploaded_file($tmp_dir,$upload_dir.$userpic);

                $image_path="user_images/".$customer_picture;
				$resize_image="user_images/resized_$customer_picture";
		
				$imgExt = strtolower(pathinfo($customer_picture,PATHINFO_EXTENSION));

				$src="";
				if($imgExt=="gif"){
					$src=imagecreatefromgif($image_path);
					
					
					
					}
					
				else if($imgExt=="png" ){
					$src=imagecreatefrompng($image_path);
					
					
					
					}
				else if($imgExt=="jpeg" ){
					$src=imagecreatefromjpeg($image_path);
					
					
					
					}
				else if($imgExt=="jpg" ){
					$src=imagecreatefromjpeg($image_path);
					
					
					
					}

					list($width,$height)=getimagesize($image_path);	
					$newWidth=500;
					$newHeight=($height/$width)*$newWidth;
					
					$tmp=imagecreatetruecolor($newWidth,$newHeight);
					imagecopyresampled($tmp,$src,0,0,0,0,$newWidth,$newHeight,$width,$height);
					imagejpeg($tmp,$resize_image,100);
					
					
					$user_pic="resized_$customer_picture";
					

					$user->addFlat($house_owner_id,$flat_division,$flat_type,$flat_area,$flat_rent,$flat_rent_advance,$flat_details,$flat_link,$user_pic,$flat_date);
					header("location:view_my_flat.php");
}

//var_dump($_SESSION);




?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Flat</title>
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
			<div class="final">
			<p class="head"><b> Choose Your flat location & type: </b></p><br>
				<form method="POST" enctype="multipart/form-data">
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
					    <label for="formGroupExampleInput2">Rent</label>
					    <input type="number" class="form-control" id="formGroupExampleInput2" name="flat_rent" required>
					    
					  </div>


					  <div class="form-group">
					    <label for="formGroupExampleInput2">Advance</label>
					    <input type="number" class="form-control" id="formGroupExampleInput2" name="flat_rent_advance" required>
					    
					  </div>

					  


					    <div class="form-group">
						    <label for="exampleTextarea">Add details</label>
						    <textarea class="form-control" id="exampleTextarea" rows="3" name="flat_details" required></textarea>
						</div>

						<div class="form-group">
					    <label for="formGroupExampleInput2">Google maps link</label>
					    <input type="text" class="form-control" id="formGroupExampleInput2" name="flat_link" required>
					    
					  </div>

					<div class="form-group">
					    <label for="formGroupExampleInput2">Select a pic of your flat</label>
					    <input type="file" class="form-control" id="formGroupExampleInput2" name="customer_picture" required>
					    
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