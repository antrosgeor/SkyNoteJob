<?php

require "init.php";
// to see if install is ok.
$see = 0;
$method = $_POST["method"];

if (empty($_POST["method"])){
	$see = -1;
}elseif ($_POST["method"] == "No_User_Message") {
	require "Insert/Add_to_date.php";
} elseif ($_POST["method"] == "update") {
	require "Insert/change.php";
}elseif ($_POST["method"] == "Contact_Add") {
	require "Insert/Contact_Add.php";
}elseif ($_POST["method"] == "Notes_change") {
	require "Insert/Notes_change.php";
}elseif ($_POST["method"] == "Remember_change") {
	require "Insert/Remember_change.php";
}elseif ($_POST["method"] == "Notes_add") {
	require "Insert/Notes_add.php";
}elseif ($_POST["method"] == "Remember_add") {
	require "Insert/Remember_add.php";
}elseif ($_POST["method"] == "Remember_Member") {
	require "Insert/Remember_Member.php";
}elseif (!empty($_POST["method"])){
	echo "kati alo";
}else {	echo "Error"; }

?>