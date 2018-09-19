<?php
require 'session_required.php';
require 'connection.php';
$fifa = $user->getAllCar();


?>
<!DOCTYPE html>
<html>
<head>
	<title>Transport</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	 <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css">
	 <link type="text/css" rel="stylesheet" href="css/car.css">
	 <link type="text/css" rel="stylesheet" href="css/navbar.css">
	 <link type="text/css" rel="stylesheet" href="styles/footer.css">
	 <link href="css/style.css" rel="stylesheet" type="text/css"/>
</head>
<body>


		<div id="wrapper" class="container">
							
			<!-- Top Nav hoby !-->
<?php
	include 'navbar_admin.php';
?>

			<section class="main-content">				
				<div class="row">
				<div class="rs">
					<div class="span9">					
						<h4 class="title"><span class="text"><strong>ALL</strong> Transport</span></h4>
						<table class="table table-striped">
							<thead>
								<tr div align="center">
									
									<th>Image</th>
									<th>Truck Type</th>
									<th> Contact Owner </th>
									<th>Shift Rate</th>
									<th>Action</th>
									
									
								</tr>
							</thead>
							<tbody>
							<?php foreach ($fifa as $result) {
								?>
							
								<tr>
									
									<td><a href="#"><img alt="" src="pic/<?php echo $result['car_image']; ?>"></a></td>
									<td><?php echo $result['car_type']; ?></td>
									<td> <?php echo $result['car_phone_number']; ?> </td>
									<td><?php echo $result['car_rate']; ?>tk</td>
									<td><button type="button" class="btn btn-info" onclick="window.location.href='edit_car.php?id=<?php echo $result['car_id']; ?>'">Edit </button>
									<button type="button" class="btn btn-danger" onclick="window.location.href='delete_car.php?id=<?php echo $result['car_id']; ?>'">Delete </button>


									</td>
									
								</tr>			  
								
								<?php } ?>		  
							</tbody>
						</table>
						
						
						<hr>
						
						
						
											
					</div>
					
				</div>
				</div>
			</section>

			<?php include 'footer.php'; ?>	
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>