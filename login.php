<?php
	session_start();
	include 'conn.php';
	include 'api/config.php';
	$ctr = 0;
	$username 	= $_POST['username1'];
	$pass	= crypt($_POST['pass1'],CRYPTKEY);

	$query = "SELECT * FROM company WHERE USERNAME = '$username' AND PASSWORD ='$pass'";
	$result = mysqli_query($conn,$query);
	if(mysqli_num_rows($result)>0)
	{
		$row = mysqli_fetch_array($result);

		/*$post_data = "(
			'NAME':'".$row['NAME']."',
			'ADDRESS':'".$row['ADDRESS']."',
			PHONE':'".$row['PHONE']."',
			'USERNAME':'". $row['USERNAME']."',
			'PASSWORD':'".$row['PASSWORD']."',
			'APIKEY':'".$row['APIKEY']."'
		)";*/


		//echo json_encode(json_decode($post_data), JSON_PRETTY_PRINT);
		$_SESSION['NAME'] = $row['NAME'];
		$_SESSION['ADDRESS'] = $row['ADDRESS'];
		$_SESSION['PHONE'] = $row['PHONE'];
		$_SESSION['USERNAME'] = $row['USERNAME'];
		$_SESSION['APIKEY'] = $row['APIKEY'];
		echo "Login Success!";
	}
	else
	{
		echo "Username or Password Wrong!";
	}
?>
