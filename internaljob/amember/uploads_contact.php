<?php
	
 include('../config/connection.php');

	// edo pernoume to  onoma tou arxeiou
	$name = $_FILES['upload']['name'];
	//$name = mt_rand(10000000, 99999999).$name;
	$temp = $_FILES['upload']['tmp_name'];
	// o tipos tou arxeiou 
	$type = $_FILES['upload']['type'];
	// to megethos tou arxeiou 
	$size = $_FILES['upload']['size'];

	//$name - preg_replace("#[^a-z0-9.]#i", "",$name);

	//m elexos gia to type an einai images i oxi....
	if(($type == "image/jpeg") || ($type == "image/gif") || ($type == "image/jpg") || ($type == "image/pjpeg") ) {
		// to megethos tou arxeiou
		if($size <= 10000000) {
			//metafora tou arxeiou 
			move_uploaded_file($temp, "uploads_contact/$name");
			$message = "<img src='$name'> <br>";
			$message = "$name <br>";
		}else{
			$message = "<br>The size of this file $name is max an the $size<br>";			
		}

		$message = "<br>The file type $type is allowed<br>";
	} else {
		$message =	"<br>This type $type is not allowed<br>";
	}

?>