<?php 


require 'connection.php';


//var_dump($_SESSION);

$flats = $user->getAllFlat();
$new = $user-> allarea();
if(isset($_POST['submit']))
{
	$flat_division=$_POST['flat_division'][0];
	$flat_area=$_POST['flat_area'][0];
	$flat_type=$_POST['flat_type'][0];
	$flat_rent_min=$_POST['flat_rent_min'][0];
	$flat_rent_max=$_POST['flat_rent_max'][0];
	//var_dump($_POST);

	if($flat_division=="all" and $flat_area=="All" and $flat_type=="All" and $flat_rent_min=="All" and $flat_rent_max="All")
	{

		
		$flats = $user->getAllFlat();
	}
	else if($flat_division!="all" and $flat_area!="All" and $flat_type!="All" and $flat_rent_min!="All" and $flat_rent_max!="All")
	{
		
		$flats=$user->getfiltered($flat_division,$flat_type,$flat_area,$flat_rent_min,$flat_rent_max);
	}
	else if($flat_division="all" and $flat_area="All" and $flat_type!="All" and $flat_rent_min!="All" and $flat_rent_max!="All")
	{
		
		$flats=$user->getfilteredone($flat_type,$flat_rent_min,$flat_rent_max);
	}

	else if($flat_division!="all" and $flat_area!="All" and $flat_type!="All" and $flat_rent_min=="All" and $flat_rent_max=="All")
	{
		
		$flats=$user->getfilteredseven($flat_division,$flat_area,$flat_type);
	}
	else if($flat_division="all" and $flat_area="All" and $flat_type="All" and $flat_rent_min!="All" and $flat_rent_max!="All")
	{
		
		
		$flats=$user->getfilteredtwo($flat_rent_min,$flat_rent_max);
	}

	else if($flat_division="all" and $flat_area="All" and $flat_type="All" and $flat_rent_min="All" and $flat_rent_max!="All")
	{
		echo "YES";
		$flats=$user->getfilteredthree($flat_rent_max);
		//var_dump($flats);

	}
	
	elseif($flat_division=="all" and $flat_area=="All" and $flat_type=="All" and $flat_rent_min!="All" and $flat_rent_max=="All")
	{
		
		$flats=$user->getfilteredfour($flat_rent_min);
		var_dump($flats);
	}
	elseif($flat_division=="all" and $flat_area=="All" and $flat_type!="All" and $flat_rent_min=="All" and $flat_rent_max=="All")
	{
		
		$flats=$user->getfilteredfive($flat_type);
		var_dump($flats);
	}

	elseif($flat_division!="all" and $flat_area!="All" and $flat_type="All" and $flat_rent_min="All" and $flat_rent_max="All")
	{
		echo "YES";
		$flats=$user->getfilteredsix($flat_division,$flat_area);
		
	}
	
		
}
//var_dump($new);

//$division = strtolower($flat_division);
//$div=$division."_table";
//$new = $user->getArea($div);

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
 <script type="text/javascript" src="js/jquery.js"></script>
</head>

<body>
<?php
	include 'navbar.php'; 
?>

<div class="container-fluid">
	<div class="row">
		<div class="flat_section edit_label">
			
				<div class="col-md-12">
					<div class="col-md-offset-1">

				<form class="form-inline" role="form" method="POST">
					  <div class="form-group edit_label">

					  	<label for="formGroupExampleInput2">Select Division</label>
					    <select name="flat_division[]" class="form-control" id="division">  
	                        <option value="all">All</option>		
					        <option value="Dhaka">Dhaka</option>
					        <option value="Barisal">Barisal</option>
					        <option value="Sylhet">Sylhet</option>
					        <option value="Rajshahi">Rajshahi</option>
					        <option value="Khulna">Khulna</option>
					        <option value="Chittagong">Chittagong</option>
					        <option value="Rangpur">Rangpur</option>
	                        
                        
                      </select>
                      </div>

                      <div class="form-group edit_label">

					  <label for="formGroupExampleInput2">Area</label>
					    <select name="flat_area[]" class="form-control" id="area"> 
							              
							<option>All</option>              
							<option>null</option>              
				        </select>
					  </div>
					 
					  <div class="form-group edit_label">
					    <label for="formGroupExampleInput2">Flat type</label>
					    <select name="flat_type[]" class="form-control">  
	                        <option>All</option>
	                        
	                        <option>For family</option>
	                        <option>Sharing</option>
	                        
                        
                      </select>
					  </div>

					  <div class="form-group edit_label">
					  <label for="formGroupExampleInput2">Rent Minimum</label>
					    <select name="flat_rent_min[]" class="form-control">  
	                        <option>All</option>
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

						<div class="form-group edit_label">
					  <label for="formGroupExampleInput2">Rent Maximum</label>
					    <select name="flat_rent_max[]" class="form-control">  
	                        <option>All</option>
	                        <option>5000</option>
	                        <option>10000</option>
	                        <option>15000</option>
	                        <option>20000</option>
	                        <option>25000</option>
	                        <option>30000</option>
	                        <option>35000</option>
	                        <option>40000</option>
	                        <option>50000</option>
	                        
                        
                      	</select>
						</div>

					  <button type="submit" class="btn btn-success" input type="submit" name="submit">Submit</button>
				</form>
			</div>
					<!--<button type="button" class="btn btn-primary search" onclick="window.location.href='search_offline.php'">Search By Filter</button>-->
					<div class="container">
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

								<button type="button" class="btn btn-info" onclick="window.location.href='flat_offline.php?id=<?php echo $result['flat_id'];?>'">More details</button>
								
								

							</div>

						</div>

						<?php } ?>

						
					</div>
				</div>

				<div class="col-md-4">

				</div>
			
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#division").on("change",function(){
			var division_table=$(this).val().toLowerCase()+"_table";
			if(division_table=="all")
			{
					$("#area").html("<option>null</option>");
			}
			else{
				var area_name=$.ajax({
				   url: 'update_flat_area.php',
				   data: {
				     		division_table:division_table
				   },
				   success: function(data) {
				   	$("#area").html("");
				   	$("#area").append(data);
				   },
				   type: 'POST'
				});
			}
				
		});

	});
	</script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script> 	

</body>
</html>