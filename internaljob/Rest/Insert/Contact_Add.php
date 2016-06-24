<?php #login.php
//include_once('init.php');

require "../init.php";

//$Add_To = $_POST["Add_To"];
$see = 0;

	//input data 
	$Add_First = $_POST["Add_First"];
	$Add_Last = $_POST["Add_Last"];
	$Add_Email = $_POST["Add_Email"];
	$Add_Notes = $_POST["Add_Notes"];
	$Add_Address = $_POST["Add_Address"];
	$Add_Mobile = $_POST["Add_Mobile"];
	$Add_Word = $_POST["Add_Word"];
	$Add_Avatar = "";
	$Add_Id = $_POST["Add_Id"];
   //store mesasage to db
   $q = "INSERT INTO contact (first, last, email, address, mphone, wphone, avatar, note, id_member) VALUES ('$Add_First','$Add_Last','$Add_Email','$Add_Address','$Add_Mobile','$Add_Word','$Add_Avatar', '$Add_Notes', '$Add_Id')";
   $r = mysqli_query($con,$q);
   $see = 1;

if ($see==0) {
	echo "No Add Contact...";
}elseif ($see==1) {
	echo "Add New Contact...";
}else {
	echo "Error Add Contact...";
}


?>