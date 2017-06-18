<?php
function createCompany($nama){
		$servername = "localhost";
		$username = "root";
		$password = "";

		// Create connection
		//$conn = new mysqli($servername, $username, $password);
		$conn = mysqli_connect($servername,$username,$password);
		// Check connection
		if ($conn === false) {
			die("Connection failed: " . mysqli_connect_error());
		}

		// Create database
		$dbname = "dbrestaurant_$nama";
		$sqlfile = "dbrestaurant.sql";
		$sql = "CREATE DATABASE $dbname";
		if(mysqli_query($conn,$sql)){
			mysqli_query($conn,"USE $dbname");
			$file = file_get_contents($sqlfile);
			 mysqli_multi_query($conn,$file);
		}
		else{
			echo "Error creating database: ".mysqli_error();
		}
		/*if ($conn->query($sql) === TRUE) {
			echo "Database created successfully";
			shell_exec('"C:\xampp\mysql\bin\mysql.exe" -u '.$username.(($password!="")?" -p $password ":' ').$dbname.' < "'.getcwd().'\\'.$sqlfile.'"');
		} else {
			echo "Error creating database: " . $conn->error;
		}*/

		$conn->close();
}
createCompany("cobaeffendy");
