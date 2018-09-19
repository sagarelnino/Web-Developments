<?php
require 'session_required.php';

require 'connection.php';
$id=$_GET['id'];

$doc=$user->getCarId($id);



if(isset($_POST['change']))
{
	
	$customer_picture=$_FILES['customer_picture']['name'];
        //var_dump($picture);
        $tmp_dir=$_FILES['customer_picture']['tmp_name'];
                
                $upload_dir='pic/';
                $imgExt=strtolower(pathinfo($customer_picture,PATHINFO_EXTENSION));
                $userpic=$customer_picture;
                move_uploaded_file($tmp_dir,$upload_dir.$userpic);

                $image_path="pic/".$customer_picture;
				$resize_image="pic/resized_$customer_picture";
		
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

    $doc=$user->EditCarPic($id,$user_pic);

		
	header ("location:car_admin.php");
}

if(isset($_POST['submit']))
{
	$car_type=$_POST['car_type'];
	
	$car_phone_number=$_POST['car_phone_number'];
	$car_rate=$_POST['car_rate'];
	

	$user->EditCar($id,$car_type,$car_phone_number,$car_rate);
	header("location:car_admin.php");
}




?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Car</title>
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
	include 'navbar_admin.php';
?>

	<div class="container">
		<div class="row">
		<div class="profile">
			<div class="col-md-4">
				<img class="img-circle" alt="Cinque Terre" width="404" height="436" src="pic/<?php echo $doc['car_image']; ?>">


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
					    <label for="formGroupExampleInput">Car Type</label>
					    <input type="text" class="form-control" id="formGroupExampleInput" name="car_type" value="<?php echo $doc['car_type'];?>">
					  </div>
					  <div class="form-group">
					    <label for="formGroupExampleInput2">Phone Number</label>
					    <input type="text" class="form-control" id="formGroupExampleInput2" name="car_phone_number" value="<?php echo $doc['car_phone_number'];?>">
					  </div>
					  
					  <div class="form-group">
					    <label for="formGroupExampleInput2">Rate</label>
					    <input type="text" class="form-control" id="formGroupExampleInput2" name="car_rate" value="<?php echo $doc['car_rate'];?>">
					  </div>
					  
					  <div class="form-group">
					    <button type="submit" class="btn btn-success" input type="submit" name="submit"> Submit </button>
					  </div>
					</form>
				

				</div>
				<div class="list">
				<button type="button" onclick="window.location.href='car_admin.php'" class="btn btn-success new"> Back</button>
				<br>
				<button type="button" onclick="window.location.href='delete.php?id=<?php echo $doc['car_id']; ?>'" class="btn btn-danger new"> Delete Car</button>



				</div>
			</div>
		</div>
		</div>
	</div>
	
</body>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</html>