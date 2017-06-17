<?php
	$reqapa = $_POST["reqapa"];
	//$data2 = $_POST["data2"];

	if($reqapa == "Semua Resto")
	{
		$url = 'localhost/edws/api/restaurant/findAll';

		$curl = curl_init();
		curl_setopt($curl,CURLOPT_URL,$url);
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($curl,CURLOPT_HTTPGET,TRUE);
		//curl_setopt($curl,CURLOPT_POSTFIELDS,$post_data);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'APIKEY: 417ebb5ba57f1379ddc9d66311b91278'
		));
		$output = curl_exec($curl);
		if($output === FALSE)
		{
			echo "Data Gagal";
			//echo "cURL Error :".curl_error($curl);
		}
		else
		{
			echo json_encode(json_decode($output), JSON_PRETTY_PRINT);
		}
		curl_close($curl);
	}
	else if($reqapa == "Resto By Id")
	{
		$restoid = $_POST["restoid"];
		$url = "localhost/edws/api/restaurant/findById/$restoid";

		$curl = curl_init();
		curl_setopt($curl,CURLOPT_URL,$url);
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($curl,CURLOPT_HTTPGET,TRUE);
		//curl_setopt($curl,CURLOPT_POSTFIELDS,$post_data);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'APIKEY: 417ebb5ba57f1379ddc9d66311b91278'
		));
		$output = curl_exec($curl);
		if($output === FALSE)
		{
			echo "Data Gagal";
			//echo "cURL Error :".curl_error($curl);
		}
		else
		{
			echo json_encode(json_decode($output), JSON_PRETTY_PRINT);
		}
		curl_close($curl);
	}
	else if($reqapa == "Resto Rating By Id")
	{
		$restoid = $_POST["restoid"];
		$url = "localhost/edws/api/restaurant/rating/$restoid";

		$curl = curl_init();
		curl_setopt($curl,CURLOPT_URL,$url);
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($curl,CURLOPT_HTTPGET,TRUE);
		//curl_setopt($curl,CURLOPT_POSTFIELDS,$post_data);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'APIKEY: 417ebb5ba57f1379ddc9d66311b91278'
		));
		$output = curl_exec($curl);
		if($output === FALSE)
		{
			echo "Data Gagal";
			//echo "cURL Error :".curl_error($curl);
		}
		else
		{
			echo json_encode(json_decode($output), JSON_PRETTY_PRINT);
		}
		curl_close($curl);
	}
	else if($reqapa == "User By Id")
	{
		$userid = $_POST["userid"];
		$url = "localhost/edws/api/user/findById/$userid";

		$curl = curl_init();
		curl_setopt($curl,CURLOPT_URL,$url);
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($curl,CURLOPT_HTTPGET,TRUE);
		//curl_setopt($curl,CURLOPT_POSTFIELDS,$post_data);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'APIKEY: 417ebb5ba57f1379ddc9d66311b91278'
		));
		$output = curl_exec($curl);
		if($output === FALSE)
		{
			echo "Data Gagal";
			//echo "cURL Error :".curl_error($curl);
		}
		else
		{
			echo json_encode(json_decode($output), JSON_PRETTY_PRINT);
		}
		curl_close($curl);
	}
	else if($reqapa == "Semua User")
	{
		$url = 'localhost/edws/api/user/findAll';

		$curl = curl_init();
		curl_setopt($curl,CURLOPT_URL,$url);
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($curl,CURLOPT_HTTPGET,TRUE);
		//curl_setopt($curl,CURLOPT_POSTFIELDS,$post_data);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'APIKEY: 417ebb5ba57f1379ddc9d66311b91278'
		));
		$output = curl_exec($curl);
		if($output === FALSE)
		{
			echo "Data Gagal";
			//echo "cURL Error :".curl_error($curl);
		}
		else
		{
			echo json_encode(json_decode($output), JSON_PRETTY_PRINT);
		}
		curl_close($curl);
	}
	else if($reqapa == "Semua Menu")
	{
		$url = 'localhost/edws/api/menu/findAll';

		$curl = curl_init();
		curl_setopt($curl,CURLOPT_URL,$url);
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($curl,CURLOPT_HTTPGET,TRUE);
		//curl_setopt($curl,CURLOPT_POSTFIELDS,$post_data);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'APIKEY: 417ebb5ba57f1379ddc9d66311b91278'
		));
		$output = curl_exec($curl);
		if($output === FALSE)
		{
			echo "Data Gagal";
			//echo "cURL Error :".curl_error($curl);
		}
		else
		{
			echo json_encode(json_decode($output), JSON_PRETTY_PRINT);
		}
		curl_close($curl);
	}
	else if($reqapa == "findrestaurant")
	{
		$namaresto = $_POST["namaresto"];
		$latituderesto = $_POST["latituderesto"];
		$longituderesto = $_POST["longituderesto"];
		$timenowresto = $_POST["timenowresto"];

		$data = array();
		if($namaresto != "")
		{
			$data["name"] = $namaresto;
		}
		if($latituderesto != "")
		{
			$data["latitude"] = $latituderesto;
		}
		if($longituderesto != "")
		{
			$data["longitude"] = $longituderesto;
		}
		if($timenowresto != "")
		{
			$data["time_now"] = $timenowresto;
		}

		$hasildata = http_build_query($data);
		$url = "localhost/edws/api/restaurant/findRestaurant?$hasildata";

		$curl = curl_init();
		curl_setopt($curl,CURLOPT_URL,$url);
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($curl,CURLOPT_HTTPGET,TRUE);
		//curl_setopt($curl,CURLOPT_POSTFIELDS,$post_data);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'APIKEY: 417ebb5ba57f1379ddc9d66311b91278'
		));
		$output = curl_exec($curl);
		if($output === FALSE)
		{
			echo "Data Gagal";
			//echo "cURL Error :".curl_error($curl);
		}
		else
		{
			echo json_encode(json_decode($output), JSON_PRETTY_PRINT);
		}
		curl_close($curl);
	}
	else if($reqapa == "findbymenu")
	{
		$menuname = $_POST["menuname"];
		$minprice = $_POST["minprice"];
		$maxprice = $_POST["maxprice"];

		$data = array();
		if($menuname != "")
		{
			$data["menuName"] = $menuname;
		}
		if($minprice != "")
		{
			$data["minPrice"] = $minprice;
		}
		if($maxprice != "")
		{
			$data["maxPrice"] = $maxprice;
		}

		$hasildata = http_build_query($data);
		$url = "localhost/edws/api/restaurant/findByMenu?$hasildata";

		$curl = curl_init();
		curl_setopt($curl,CURLOPT_URL,$url);
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($curl,CURLOPT_HTTPGET,TRUE);
		//curl_setopt($curl,CURLOPT_POSTFIELDS,$post_data);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'APIKEY: 417ebb5ba57f1379ddc9d66311b91278'
		));
		$output = curl_exec($curl);
		if($output === FALSE)
		{
			echo "Data Gagal";
			//echo "cURL Error :".curl_error($curl);
		}
		else
		{
			echo json_encode(json_decode($output), JSON_PRETTY_PRINT);
		}
		curl_close($curl);
	}
	else if($reqapa == "findnearby")
	{
		$latituderesto = $_POST["latituderesto"];
		$longituderesto = $_POST["longituderesto"];

		$data = array();

		if($latituderesto != "")
		{
			$data["latitudeHere"] = $latituderesto;
		}
		if($longituderesto != "")
		{
			$data["longitudeHere"] = $longituderesto;
		}


		$hasildata = http_build_query($data);
		$url = "localhost/edws/api/restaurant/findNearbyRestaurant?$hasildata";

		$curl = curl_init();
		curl_setopt($curl,CURLOPT_URL,$url);
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($curl,CURLOPT_HTTPGET,TRUE);
		//curl_setopt($curl,CURLOPT_POSTFIELDS,$post_data);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'APIKEY: 417ebb5ba57f1379ddc9d66311b91278'
		));
		$output = curl_exec($curl);
		if($output === FALSE)
		{
			echo "Data Gagal";
			//echo "cURL Error :".curl_error($curl);
		}
		else
		{
			echo json_encode(json_decode($output), JSON_PRETTY_PRINT);
		}
		curl_close($curl);
	}
?>
