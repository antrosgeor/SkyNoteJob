<?php 

//Include Connection
include_once('connection.php');

//Header
header('Content-type: application/json');

//REQUEST_METHOD
$method = $_SERVER['REQUEST_METHOD'];

//CHECK REQUEST_METHOD
if ($method=="POST"){

   //input data
   $user_name     = $_POST["user_name"];
   $from          = $_POST["user_email"];
   $phone_number  = $_POST["phone_number"];
   $body          = $_POST["msg"];

   //store mesasage to db
   $q = "INSERT INTO messages (name,email,phone,message,date) VALUES ('$user_name ','$from','$phone_number','$body', now() )";
   $r = mysqli_query($dbc,$q);

   if ($r) {
       deliver_response(200,"message sent",NULL);
   }else{
       deliver_response(200,"no data",NULL);
   }

}else{
    deliver_response(400,"invalid request",NULL);
}





//Deliver Response
function deliver_response($status,$message,$data){

	header("HTTP/1.1 $status $message ");

	$response['status'] = $status; 
	$response['message'] = $message; 
	$response['data'] = $data; 

	$json_response = json_encode($response);
	echo $json_response;
}
?>						