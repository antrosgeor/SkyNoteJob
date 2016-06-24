<?php #login.php
//include_once('init.php');

require "../init.php";

//$Add_To = $_POST["Add_To"];
$see = 0;

if($_POST["Add_To"] == "No_User_Message") {
	//input data 
	$Add_Type = $_POST["Add_Type"];
	$Add_Title = $_POST["Add_Title_Mail_No_User"];
	$Add_email = $_POST["Add_Edit_email"];
	$Add_First = $_POST["Add_Edit_First"];
	$Add_Last = $_POST["Add_Edit_Last"];
	$Add_Phone = $_POST["Add_Edit_Phone"];
	$Add_Message = $_POST["Add_Edit_Message"];
   //store mesasage to db
   $q = "INSERT INTO no_user_messages (Type, Title, Mail, First, Last, Phone, Message) VALUES ('$Add_Type','$Add_Title','$Add_email','$Add_First','$Add_Last','$Add_Phone','$Add_Message')";
   $r = mysqli_query($con,$q);
   $see = 1;
}

if ($see==0) {
	echo "No Send Message To Admin...";
}elseif ($see==1) {
	echo "Message Send To Admin...";
}else {
	echo "Error Send Message...";
}


?>