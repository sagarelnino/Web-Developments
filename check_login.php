<?php 
session_start();
require ('connection.php');
	
	if(isset($_POST['submit']))
	{
		$email=$_POST['email'];
		$password=md5($_POST['password']);
		$user_type=$_POST['user_type'][0];

		if($user_type=="House Owner")
		{
			$fi=$user->LoginHouseOwner($email, $password);
			if($fi['house_owner_email']==$email && $fi['house_owner_password']==$password)
			{
				echo "successfull owner";
				$_SESSION['email']=$email;
				$_SESSION['id']=$fi['house_owner_id'];
				$_SESSION['user_type']=$user_type;

				header("location:index_logged_in.php");
			}
			else
			{
				echo "invalid";
			}
		}

		else if($user_type=="Customer")
		{
			$fifa=$user->LoginCustomer($email, $password);
			if($fifa['customer_email']==$email && $fifa['customer_password']==$password)
			{
				echo "successfull customer";
				$_SESSION['email']=$email;
				$_SESSION['id']=$fifa['customer_id'];
				$_SESSION['user_type']=$user_type;

				header("location:index_logged_in.php");
			}
			else
			{
				echo "invalid";
			}
		}

		else 
		{
			$pes=$user->LoginAdmin($email, $password);
			//var_dump($pes);
			//var_dump($_POST);
			//echo $password;
			if($pes['admin_email']==$email && $pes['admin_password']==$password)
			{
				echo "successfull Admin";
				$_SESSION['email']=$email;
				$_SESSION['id']=$pes['admin_id'];
				$_SESSION['user_type']=$user_type;

				header("location:index_admin.php");
			}
			else
			{
				echo "invalid";
			}
		}

		
		
		
		
		
		
		
		
		
			
		
		
		
		
	}
	
	
	
	



?>