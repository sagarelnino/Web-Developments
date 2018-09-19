<?php
	require 'session_required.php';
	require 'connection.php';
	$fifa = $user->getAllCustomer();
	//var_dump($fifa);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Customers</title>

    <!-- Bootstrap Core CSS -->

   	 <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
 	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	 <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Custom CSS -->
    <link href="css/full-slider.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <link href="css/customers.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
	<?php include 'navbar_admin.php'; ?>
	<div class="tab">
		<div class="col-md-offset-2 col-md-8">
			<table class="table table-hover">
			    <thead>
			      <tr>
			        <th>Customer Id</th>
			        <th>Name</th>
			        <th>View</th>
			        <th>Delete</th>
			      </tr>
			    </thead>
			    <tbody>
			    <?php foreach ($fifa as $result) {
			    	# code...
			    ?>
			      <tr>
			        <td><?php echo $result['customer_id']; ?></td>
			        <td><?php echo $result['customer_name']; ?></td>
			        <td><button type="button" class="btn btn-info" onclick="window.location.href='customer_admin.php?id=<?php echo $result['customer_id']; ?>'">Visit</button></td>
			        <td><button type="button" class="btn btn-danger" onclick="window.location.href='delete_customer.php?id=<?php echo $result['customer_id']; ?>'">Bann</button></td>
			      </tr>
			      
			      <?php } ?>
			    </tbody>
		 	</table>
	 	</div>
 	</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script> 
</body>
</html>
