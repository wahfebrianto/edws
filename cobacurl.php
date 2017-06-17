<?php 
	include 'conn.php';
	$username = $_POST["username"];
	
	$query = "SELECT * FROM tuser WHERE username='$username'";
	$result = mysqli_query($conn,$query);
	
	if(mysqli_num_rows($result)>0)
	{
		//sudah ada username tersebut
		echo "Username Sudah Ada";
	}
	else
	{
		echo "Username Belum Ada";
	}
?>