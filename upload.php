<?php
	$file_path = "uploads/";
     
    $file_path = $file_path . getallheaders()['nama'];
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path) ){
        echo "success";
    } else{
        echo "fail";
    }