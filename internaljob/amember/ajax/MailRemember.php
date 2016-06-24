<?php #Mail send to second.

include('../../config/connection.php');

$id = $_GET['id'];
echo $id;

$q = "SELECT * FROM remember WHERE id = $id";
$r = mysqli_query($dbc,$q);
$remembersend = mysqli_fetch_assoc($r);

$me = $remembersend['id_member'];
$you = $remembersend['id_second'];

$qme = "SELECT * FROM member WHERE id = $me";
$rme = mysqli_query($dbc,$qme);
$from_send = mysqli_fetch_assoc($rme);

$qyou = "SELECT * FROM member WHERE id = $you";
$ryou = mysqli_query($dbc,$qyou);
$to_send = mysqli_fetch_assoc($ryou);

if ($r) {
	$from= $from_send['email'];
	$email= $to_send['email'];
	$subject= $remembersend['title'];
	$message= $remembersend['message'];

mail($email, $subject, $message,"From:".$from);

	print "your message has been sent: <br/>$email<br/>$subject<br/>$message<br/>";
	echo "Sent to Mail";
} else {
	echo "there was an error...<br>";
	echo $q.'<br>';
	echo mysqli_error($dbc);
}

?>