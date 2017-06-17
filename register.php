<?php
	//include 'conn.php';
	$ctr = 0;
	$nama	= strtoupper($_POST['nama1']);
	$email 		= $_POST['email1'];
	$phone 	= $_POST['telpon1'];
	$username 	= $_POST['username1'];
	$pass	= $_POST['pass1'];

	$post_data = array(
		"NAME" => $nama,
		"ADDRESS" => $email,
		"PHONE" => $phone,
		"USERNAME" => $username,
		"PASSWORD" => $pass
	);
	$url = 'localhost/edws/api/company/register';

	$curl = curl_init();
	curl_setopt($curl,CURLOPT_URL,$url);
	curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
	//curl_setopt($curl,CURLOPT_HTTPGET,TRUE);
	curl_setopt($curl,CURLOPT_POST,TRUE);
	curl_setopt($curl,CURLOPT_POSTFIELDS,$post_data);
	//curl_setopt($curl, CURLOPT_HTTPHEADER, array(
	//	'APIKEY: 18c86fc9a70fd942e862ec17313385a7'
	//));
	$output = curl_exec($curl);
	if($output === FALSE)
	{
		echo "Failed!";
		//echo "cURL Error :".curl_error($curl);
	}
	else
	{
		echo json_encode(json_decode($output), JSON_PRETTY_PRINT);
	}
	curl_close($curl);


?>
