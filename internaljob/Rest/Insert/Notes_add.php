<?php 
#Notes_add

$nowdate = date("Y-m-d");
$nowtime = date("H:i:s");
$selectTitle = $_POST["selectTitle"];
$selectBody = $_POST["selectBody"];
$selectLever = $_POST["selectLever"];
$selectColor = $_POST["selectColor"];
$selectColor = strtolower($selectColor);
$my_Id = $_POST["my_Id"];

if($my_Id != ""){
	//store mesasage to db
   $q = "INSERT INTO notes (title, body, date, lever, color, id_member) VALUES ('$selectTitle','$selectBody', '$nowdate' ,'$selectLever','$selectColor','$my_Id')";
   $r = mysqli_query($con,$q);
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