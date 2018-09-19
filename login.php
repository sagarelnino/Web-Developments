<!DOCTYPE html>
<html lang="en">
    <head> 
		<meta name="viewport" content="width=device-width, initial-scale=1">


		<!-- Website CSS style -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/registration.css">

		<title>Login</title>
	</head>
	<body>
		<div class="container">
			<div class="row main">
				<div class="main-login main-center">
				<h3 style="text-align: center;">Sign in </h3>
					<form class="" method="POST" action="check_login.php">
						
						

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" id="email" name="email" placeholder="Enter your Email" required>
								</div>
							</div>
						</div>

						

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" id="password" name="password"  placeholder="Enter your Password"/ required>
								</div>
							</div>
						</div>


						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">User Type</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<select name="user_type[]" class="form-control" required>  
										<option>House Owner</option>
										<option>Customer</option>
										<option>Admin</option>
										
									  </select>
								</div>
							</div>
						</div>


						<div class="form-group ">
							<button type="submit" id="button" class="btn btn-primary btn-lg btn-block login-button" input type="submit" name="submit">Login</button> 
						</div>
						
					</form>

					<p style="text-align: center;"> Not a member?? <a href="registration.php" style="color: red;"> Register Here </a></p>
				</div>
			</div>
		</div>

		 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	</body>
</html>