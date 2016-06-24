<?php #login.php
//include_once('init.php');

#bitbager
require "../init.php";

$idse = $_POST["change_id"];
$see = 0;

if($_POST["change_email"] != "") {
	$email = $_POST["change_email"];
	$q = "UPDATE member SET email = '$email' WHERE id = '$idse' ";
	$result = mysqli_query($con,$q);
	$see = 1;
}
if($_POST["change_pass"] != "") {
	$pass = $_POST["change_pass"];
	$q = "UPDATE member SET password = '$pass' WHERE id = '$idse' ";
	$result = mysqli_query($con,$q);
	$see = 1;
}
if($_POST["change_first"] != "") {
	$first = $_POST["change_first"];
	$q = "UPDATE member SET first = '$first' WHERE id = '$idse' ";
	$result = mysqli_query($con,$q);
	$see = 1;
}
if($_POST["change_last"] != "") {
	$last = $_POST["change_last"];
	$q = "UPDATE member SET last = '$last' WHERE id = '$idse' ";
	$result = mysqli_query($con,$q);
	$see = 1;
}
if($_POST["change_mobile"] != "") {
	$mobile = $_POST["change_mobile"];
	$q = "UPDATE member SET mphone = '$mobile' WHERE id = '$idse' ";
	$result = mysqli_query($con,$q);
	$see = 1;
}
if($_POST["change_word"] != "") {
	$word = $_POST["change_word"];
	$q = "UPDATE member SET wphone = '$word' WHERE id = '$idse' ";
	$result = mysqli_query($con,$q);
	$see = 1;
}
if($_POST["change_address"] != "") {
	$address = $_POST["change_address"];
	$q = "UPDATE member SET address = '$address' WHERE id = '$idse' ";
	$result = mysqli_query($con,$q);
	$see = 1;
}

if ($see==0) { echo "No UpDate Is available..."; }
elseif ($see==1) {	echo "UpDate Is available..."; } 
else {	echo "Error ..."; }


?>