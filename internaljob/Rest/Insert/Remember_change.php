<?php 
#Remember_change
	$nowdate = date("Y-m-d");
	$nowtime = date("H:i:s");
  	$selectTitle = $_POST["selectTitle"];
	$selectBody = $_POST["selectBody"];
	$selectDate = $_POST["selectDate"];
	$selectTime = $_POST["selectTime"];
	$selectLever = $_POST["selectLever"];
	$selectColor = $_POST["selectColor"];
	$selectColor = strtolower($selectColor);
	$my_Id = $_POST["my_Id"];
	$Id_Note = $_POST["Id_Note"];
	$action = "To Do";
	$Time = str_replace(' ', '', $selectTime);

	if($Id_Note != "" && $my_Id != "") {
		$q = "UPDATE remember SET date_write = '$nowdate', title = '$selectTitle', message = '$selectBody', date = '$selectDate', time = '$Time', lever = '$selectLever', color = '$selectColor', action = '$action'  WHERE id = '$Id_Note' && id_member = '$my_Id'";
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