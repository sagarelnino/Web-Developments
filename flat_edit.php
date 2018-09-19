<?php
require 'session_required.php';
require 'connection.php';

$id=$_GET['id'];
$torres=$user->getFlat($id);

$flat_division=$torres[0]['flat_division'];


$division = strtolower($flat_division);
$div=$division."_table";
$new = $user->getArea($div);

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

    $doc=$user->EditFlatPic($id,$user_pic);

		
	header ("location:view_my_flat.php");
}

if(isset($_POST['submit']))
{
	$flat_area=$_POST['flat_area'][0];
	$flat_type=$_POST['flat_type'][0];
	$flat_rent=$_POST['flat_rent'];
	$flat_rent_advance=$_POST['flat_rent_advance'];
	$flat_details=$_POST['flat_details'];
	$flat_link=$_POST['flat_link'];

	$user->editFlat($id,$flat_area,$flat_type,$flat_rent,$flat_rent_advance,$flat_details,$flat_link);
	header("location:view_my_flat.php");
}

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
	<div class="edit">
		<div class="row">
			<div class="col-md-4">
				<img class="img-rounded" alt="Cinque Terre" width="304" height="236" src="user_images/<?php if($torres[0]['flat_picture']==null)
									{
									echo 'No-image-available.jpg';
								}
								else
								{
									echo $torres[0]['flat_picture'];
								}
								?>"><br>
				<form class="form-inline" role="form" method="POST" enctype="multipart/form-data">
						<div class="form-group">
						   <label for="email">Change Pic:</label>
						   <input type="file" class="form-control" id="email" name="customer_picture">
						</div>

						<button type="submit" class="btn btn-success edit_change_button" input type="submit" name="change">Change</button>
					</form>				

			</div>

			<div class="col-md-offset-2 col-md-6">
				
					<form method="POST" enctype="multipart/form-data">
					  <div class="form-group">
					    <label for="formGroupExampleInput">Select area</label>
						<select name="flat_area[]" class="form-control" id="slct1" required> 
						<?php foreach ($new as $result) {
							# code...
						?>
	                        <option value="<?php echo $torres[0]['flat_area'];?>"><?php echo $torres[0]['flat_area'];?></option>

	                        <option value="<?php echo $result['area_name'];?>"><?php echo $result['area_name'];?></option>
	                        <?php } ?>
                        
                        </select>
					  </div>

					  <div class="form-group">
					    <label for="formGroupExampleInput2">Flat type</label>
					    <select name="flat_type[]" class="form-control">
					    	<option><?php echo $torres[0]['flat_type']; ?> </option>  
	                        <option>For family</option>
	                        <option>Sharing</option>
	                        
                        
                      </select>
					    
					  </div>

					  
					  <div class="form-group">
					    <label for="formGroupExampleInput2">Rent</label>
					    <input type="number" class="form-control" id="formGroupExampleInput2" name="flat_rent" value="<?php echo $torres[0]['flat_rent']; ?>" required>
					    
					  </div>


					  <div class="form-group">
					    <label for="formGroupExampleInput2">Advance</label>
					    <input type="number" class="form-control" id="formGroupExampleInput2" name="flat_rent_advance" value="<?php echo $torres[0]['flat_rent_advance']; ?>" required>
					    
					  </div>

					  


					    <div class="form-group">
						    <label for="exampleTextarea">Add details</label>
						    <textarea class="form-control" id="exampleTextarea" rows="3" name="flat_details"  required><?php echo $torres[0]['flat_details']; ?></textarea>
						</div>



						<div class="form-group">
						    <label for="exampleTextarea">Edit link</label>
						    <textarea class="form-control" id="exampleTextarea" rows="3" name="flat_link"  required><?php echo $torres[0]['flat_link']; ?></textarea>
						</div>

					
					  
					  
					  <div class="form-group">
					    <button type="submit" class="btn btn-success" input type="submit" name="submit"> Submit </button>
					  </div>
				</form>
				

				</div>
				
			

		</div>
		</div>



	</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script> 
</body>
</html>