<?php
	$image = "Capture.PNG";
	$a = file_get_contents($image);
	$a = base64_encode($a);
	echo $a.'<br><br>';
	$src = 'data: '.mime_content_type($image).';base64,'.$a;

	// Echo out a sample image
	echo '<img src="'.$src.'">';
	
	echo crypt("123123","effendydarrenwahyusinarta");

?>
