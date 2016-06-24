<?php 
#Remember_add

$nowdate = date("Y-m-d");
$nowtime = date("H:i:s");
$selectTitle = $_POST["selectTitle"];
$selectBody = $_POST["selectBody"];
$selectDate = $_POST["selectDate"];
$selectTime = $_POST["selectTime"];
$Time = str_replace(' ', '', $selectTime);
$selectLever = $_POST["selectLever"];
$selectColor = $_POST["selectColor"];
$selectColor = strtolower($selectColor);
$my_Id = $_POST["my_Id"];
$My_send = $_POST["My_send"];
$action = "To Do";
$comment =  $_POST["comment"];
$comment_final =  $comment + "write this Remember on android phone";

if($my_Id != ""){
	//store mesasage to db
   $q = "INSERT INTO remember (date_write, title, message, date, time, lever, color, action, id_member, id_second, comment) 
   		VALUES ('$nowdate', '$selectTitle','$selectBody', '$selectDate' ,'$Time', '$selectLever','$selectColor','$action','$my_Id','$My_send','$comment_final')";
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