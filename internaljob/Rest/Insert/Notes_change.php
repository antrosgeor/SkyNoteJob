<?php 
#Notes_change	
	$nowdate = date("Y-m-d");
	$nowtime = date("H:i:s");
   	$selectTitle = $_POST["selectTitle"];
   	$selectBody = $_POST["selectBody"];
   	$selectLever = $_POST["selectLever"];
   	$selectColor = $_POST["selectColor"];
      $selectColor = strtolower($selectColor);
   	$my_Id = $_POST["my_Id"];
   	$Id_Note = $_POST["Id_Note"];

   	if($Id_Note != "" && $my_Id != "") {
   		$q = "UPDATE notes SET title = '$selectTitle', body = '$selectBody', date = '$nowdate', lever = '$selectLever', color = '$selectColor' WHERE id = '$Id_Note'";
	$result = mysqli_query($con,$q);
	$see = 1;
   	}

if ($see==0) {
	echo "No Insert...";
}elseif ($see==1) {
	echo "Insert...";
}else {
	echo "Error Insert...";
}

?>