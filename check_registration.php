<?php
session_start();
require 'connection.php';

if(isset($_POST['submit']))
{
	$house_owner_email=$_POST['house_owner_email'];
	$house_owner_name=$_POST['house_owner_name'];
	$house_owner_password=$_POST['house_owner_password'];
	$house_owner_password2=$_POST['house_owner_password2'];
	$user_type=$_POST['user_type'][0];
	var_dump($_POST);

	if($house_owner_password==$house_owner_password2)
	{
		if (mb_strlen($house_owner_password)>=8)
		{
			if($user_type=="House Owner")
			{
			$row=$user->getHouseOwner($house_owner_email);
				if($row['house_owner_email']==$house_owner_email)
				{
					echo "already registered with this email";
				}
				else
				{
					$password=md5($house_owner_password);
					$id=$user->insert_multiple_house_owner($house_owner_email, $house_owner_name, $password);
					

					
					$_SESSION['id']=$id;
					$_SESSION['email']=$house_owner_email;
					$_SESSION['user_type']=$user_type;
					
					echo "Successfull added house owner";
					echo $id;
					header("location:index_logged_in.php");

				}
			}

			if($user_type=="Customer")
			{
			$row=$user->getCustomer($house_owner_email);
				if($row['customer_email']==$house_owner_email)
				{
					echo "already registered with this email";
				}
				else
				{
					$password=md5($house_owner_password);
					$id=$user->insert_multiple_Customer ($house_owner_email, $house_owner_name, $password);
					

					
					$_SESSION['id']=$id;
					$_SESSION['email']=$house_owner_email;
					$_SESSION['user_type']=$user_type;
					
					echo "Successfull added customer";
					
					header("location:index_logged_in.php");

				}
			}
		}

		else
		{
			echo "You have to enter at least 8 characters for password";
		}
	}




	else
	{
		echo "Please enter same password";
	}
}

?>