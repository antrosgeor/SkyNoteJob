<?php 
#delete.php

require "init.php";
// to see if install is ok.
$see = 0;
$method = $_POST["method"];
$Id_Note = $_POST["Id_Note"];
$my_Id = $_POST["my_Id"];

if($Id_Note != "" && $my_Id != "") {
	if ($method == "notesDelete") {
		$q = "DELETE FROM notes WHERE id = $Id_Note AND id_member = $my_Id";
		$r = mysqli_query($con,$q);
	   	$see = 1;
	}elseif ($method == "rememberDelete") {
		$q = "DELETE FROM remember WHERE id = $Id_Note AND id_member = $my_Id";
		$r = mysqli_query($con,$q);
	   	$see = 1;
	}
}

if ($see==0) {
	echo "No Delete...";
}elseif ($see==1) {
	echo "Delete...";
}else {
	echo "Error Insert...";
}


?>