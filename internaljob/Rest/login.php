<?php #login.php
//include_once('init.php');

require "init.php";

$user_email = $_POST["login_email"];
$user_pass =  $_POST["login_pass"];

$sql_query = "SELECT * FROM member WHERE email = '$user_email' AND password = sha1('$user_pass')";


$result = mysqli_query($con,$sql_query);

if (mysqli_num_rows($result)==0) {
	echo "No info Is available....";
}elseif (mysqli_num_rows($result)==1) {
	$row = mysqli_fetch_assoc($result);
	$user = $row["first"].' '.$row['last'];

	echo "welcome member";//.$user." .";

}elseif (mysqli_num_rows($result)>1) {
	echo "We have meny user with email";
}else {
	echo "Error ...";
}


?>