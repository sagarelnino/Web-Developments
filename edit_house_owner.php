<?php
require 'session_required.php';

require 'connection.php';
$id=$_SESSION['id'];

$doc=$user->getHouseOwnerId($id);
//var_dump($doc);

if(isset($_POST['change']))
{
	
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
		
                
                //$user_pic=rand(1000,1000000).".".$imgExt;
                
                //move_uploaded_file($tmp_dir,$upload_dir.$picture);
        
        //$user->createDoctor($name,$specialist,$institute,$time,$phone_number,$email,$picture);

    $doc=$user->EditDocPicHw($id,$user_pic);

		
	header ("location:profile_house_owner.php");
}

if(isset($_POST['submit']))
{
	$house_owner_name=$_POST['house_owner_name'];
	$house_owner_phone=$_POST['house_owner_phone'];
	$house_owner_mobile=$_POST['house_owner_mobile'];
	$house_owner_occupation=$_POST['house_owner_occupation'];
	$house_owner_national_id=$_POST['house_owner_national_id'];
	$house_owner_payment_method=$_POST['house_owner_payment_method'];
	$house_owner_payment_id=$_POST['house_owner_payment_id'];

	$user->EditHouseOwner($id,$house_owner_name,$house_owner_phone,$house_owner_mobile,$house_owner_occupation,$house_owner_national_id,$house_owner_payment_method,$house_owner_payment_id);
	header("location:profile_house_owner.php");
}




?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Profile</title>
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
		<div class="row">
		<div class="profile">
			<div class="col-md-4">
				<img class="img-circle" alt="Cinque Terre" width="404" height="436" src="user_images/<?php if($doc['house_owner_image']==null)
				{
					echo "4.jpg";
					} 
					else
					{
						echo $doc['house_owner_image'];
					}
					?>">

					<form class="form-inline" role="form" method="POST" enctype="multipart/form-data">
						<div class="form-group">
						   <label for="email">Choose Pic:</label>
						   <input type="file" class="form-control" id="email" name="customer_picture">
						</div>

						<button type="submit" class="btn btn-success edit_change_button" input type="submit" name="change">Change</button>
					</form>

			</div>
			<div class="col-md-offset-2 col-md-4">
				<div class="details">
					<form method="POST">
					  <div class="form-group">
					    <label for="formGroupExampleInput">Name</label>
					    <input type="text" class="form-control" id="formGroupExampleInput" name="house_owner_name" value="<?php echo $doc['house_owner_name'];?>">
					  </div>
					  <div class="form-group">
					    <label for="formGroupExampleInput2">Phone Number</label>
					    <input type="text" class="form-control" id="formGroupExampleInput2" name="house_owner_phone" value="<?php echo $doc['house_owner_phone'];?>">
					  </div>
					  <div class="form-group">
					    <label for="formGroupExampleInput2">Mobile</label>
					    <input type="text" class="form-control" id="formGroupExampleInput2" name="house_owner_mobile" value="<?php echo $doc['house_owner_mobile'];?>">
					  </div>
					  <div class="form-group">
					    <label for="formGroupExampleInput2">Occupation</label>
					    <input type="text" class="form-control" id="formGroupExampleInput2" name="house_owner_occupation" value="<?php echo $doc['house_owner_occupation'];?>">
					  </div>
					  <div class="form-group">
					    <label for="formGroupExampleInput2">National Id</label>
					    <input type="text" class="form-control" id="formGroupExampleInput2" name="house_owner_national_id" value="<?php echo $doc['house_owner_national_id'];?>">
					  </div>
					  <div class="form-group">
					    <label for="formGroupExampleInput2">Payment Method</label>
					    <input type="text" class="form-control" id="formGroupExampleInput2" name="house_owner_payment_method" value="<?php echo $doc['house_owner_payment_method'];?>">
					  </div>
					  <div class="form-group">
					    <label for="formGroupExampleInput2">Payment Id</label>
					    <input type="text" class="form-control" id="formGroupExampleInput2" name="house_owner_payment_id" value="<?php echo $doc['house_owner_payment_id'];?>">
					  </div>
					  <div class="form-group">
					    <button type="submit" class="btn btn-success" input type="submit" name="submit"> Submit </button>
					  </div>
					</form>
				

				</div>
				<div class="list">
				<button type="button" onclick="window.location.href='profile_house_owner.php'" class="btn btn-success new"> Profile</button>
				<br>
				<button type="button" onclick="window.location.href='search.php'" class="btn btn-primary new"> Add Flat</button>



				</div>
			</div>
		</div>
		</div>
	</div>
	
</body>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</html>