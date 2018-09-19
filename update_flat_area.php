<?php
	
	require 'connection.php';
	$s="";
	$division_table=$_POST["division_table"];
	$data=$user->update_area($division_table);
	//var_dump($data);
	 foreach ($data as $row):
		$s=$s."<option>".$row['area_name']."</option>";
	endforeach; 
	echo $s;
	//var_dump($data);
	
	?>