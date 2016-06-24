<?php 
#Remember_Member
$nowdate = date("Y-m-d");
$nowtime = date("H:i:s");
$selectTitle = $_POST["selectTitle"];
$selectBody = $_POST["selectBody"];
$selectLever =$_POST["selectLever"];
$selectColor = $_POST["selectColor"];
$selectColor = strtolower($selectColor);
$selectDate = $_POST["selectDate"];
$selectTime = $_POST["selectTime"];
$Time = str_replace(' ', '', $selectTime);
$my_Id = $_POST["my_Id"];
$Member_id = $_POST["Member_id"];
$action = "To Do";
$comment_final = "write this Remember on android phone";

if($my_Id != "" && $Member_id != ""){
	//store mesasage to db
   $q = "INSERT INTO remember (date_write, title, message, date, time, lever, color, action, id_member, id_second, comment) 
   		VALUES ('$nowdate', '$selectTitle','$selectBody', '$selectDate' ,'$Time', '$selectLever','$selectColor','$action','$my_Id','$Member_id','$comment_final')";
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