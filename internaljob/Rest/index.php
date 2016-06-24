<?php 

//Include Connection
include_once('connection.php');

//Header
header('Content-type: application/json');

//REQUEST_METHOD
$method = $_SERVER['REQUEST_METHOD'];

//Switch REST
switch ($method) {
  case 'POST':
    rest_post($dbc);  
    break;
  case 'GET':
	rest_get($dbc);
    break;
  default:
    break;
}

//Rest Get
function rest_get($dbc){
	//Process client url
	if (!empty($_GET['key'])) {// an den einai keno to $_GET['key']
		//get data from url
		$key = $_GET['key'];
		$data = get_data($key,$dbc);
		//Server info
	 	//print_r($_SERVER);
		if (empty($data)) {// an to $data einai keno tote den exoume dedomena.
			//no data to send 
			deliver_response(200,"no data",NULL);
		}else{//diaforetika an exoume dedomena tote.
			//send data
			deliver_response(200,$key,$data);
		}
	}else{
		//throw invalid request
		deliver_response(400,"invalid request",NULL);
	}
}

//Get Data From Database
function get_data($key,$dbc){

	$q = " select * from  $key ";
	// *admin_user, type_job, member, news, pages, contact, messages, notes, remember, social, setting
//all

	if (isset($_GET['id']) && ($key == "admin_user" || $key == "type_job" || $key == "news" || $key == "contact" || $key == "pages" || $key == "messages" || $key == "notes" || $key == "remember" || $key == "social" || $key == "setting")) 
	{// efanizi ta pages me vasi tin doulia.
		$q = " select * from  $key where id = '$_GET[id]'";
	} 
	elseif (isset($_GET['forto']) & $key == "pages" ) 
	{// efanizi ta pages me vasi tin doulia. //pages
		//$q = " select * from  $key where forto = '$_GET[forto]'";
		$q = "SELECT p.id, p.title, p.header, p.body, p.label, p.slug, p.type, CONCAT( admin_user.last,', ', admin_user.first) AS user, CONCAT(type_job.name_job) AS forto
               FROM pages p 
               INNER JOIN admin_user ON p.user = admin_user.id
               INNER JOIN type_job ON p.forto = type_job.id WHERE forto = 0 OR forto = '$_GET[forto]'";
	} 
	elseif (isset($_GET['forto']) & $key == "news" ) 
	{//news forto
	$q = "SELECT n.id, n.title, n.date, n.body, CONCAT( admin_user.last,', ', admin_user.first) AS author, forto, CONCAT(type_job.name_job) AS type_job
               FROM news n 
               INNER JOIN admin_user ON n.author = admin_user.id
               INNER JOIN type_job ON n.forto = type_job.id WHERE forto = 0 OR forto = '$_GET[forto]'";
	}
	elseif (isset($_GET['id_member']) & $key == "notes" ) 
	{//notes id_member
	$q = "SELECT n.id, n.title, n.body, n.date, n.lever, n.color, n.id_member, CONCAT( member.first,', ', member.last) AS member
               FROM notes n 
               INNER JOIN member ON n.id_member = member.id
               WHERE id_member = '$_GET[id_member]'";
	}
	elseif (isset($_GET['id_member']) & $key == "remember" ) 
	{//notes
	$q = "SELECT n.id, n.date_write, n.title, n.message, n.date, n.time, n.lever, n.color, n.action, n.id_member, n.id_second, CONCAT(m.first,', ', m.last) AS member_write, CONCAT(h.first,', ', h.last) AS members_add
			   FROM remember n            
			   INNER JOIN member m ON n.id_member = m.id 
   			   INNER JOIN member h ON n.id_second = h.id 
               WHERE id_member = '$_GET[id_member]' OR id_second = '$_GET[id_member]'";
	}
	elseif (isset($_GET['mail']) && $key == "member" ) 
	{//member mail
		$q = "SELECT m.id, m.first, m.last, m.email, m.password, m.avatar, m.mphone , m.wphone, m.address, m.status, m.type_job, CONCAT(type_job.name_job) AS name_job
               FROM member m 
               INNER JOIN type_job ON m.type_job = type_job.id WHERE email = '$_GET[mail]'";
	}
	elseif (isset($_GET['id_member']) & $key == "contact" ) 
	{//notes id_member
	$q = "SELECT n.id, n.first, n.last, n.email, n.address, n.mphone, n.wphone, n.avatar, n.note, n.id_member
               FROM contact n 
               WHERE id_member = '$_GET[id_member]'";
	}
	elseif ($key == "member") 
	{//member
		$q = "SELECT m.id, m.first, m.last, m.email, m.password, m.avatar, m.mphone , m.wphone, m.address, m.status, m.type_job, CONCAT(type_job.name_job) AS name_job
               FROM member m 
               INNER JOIN type_job ON m.type_job = type_job.id
               WHERE m.id != '0' ";
	} 
	elseif($key == "news") 
	{
//news
         $q = "SELECT n.id, n.title, n.date, CONCAT( admin_user.last,', ', admin_user.first) AS author , n.body,n.forto, CONCAT(type_job.name_job) AS forto_name
               FROM news n
               INNER JOIN admin_user ON n.author = admin_user.id
               INNER JOIN type_job ON n.forto = type_job.id
               ORDER BY date DESC";
    }
    elseif ($key == "pages") 
    {
//pages
    	$q = "SELECT p.id, p.title, p.header, p.body, p.label, p.slug, p.type, CONCAT( admin_user.last,', ', admin_user.first) AS user, CONCAT(type_job.name_job) AS forto
               FROM pages p 
               INNER JOIN admin_user ON p.user = admin_user.id
               INNER JOIN type_job ON p.forto = type_job.id";
    } elseif (isset($_GET['User_id']) && $key == "now_remember") 
    {
//now remember
    	# get date
	$nowdate = date("Y-m-d");
	# get time
	$nowtime = date("H:i:s");
	$user = $_GET['User_id'];
      $q = "SELECT n.id, n.date_write, n.title, n.message, n.date, n.time, n.lever, n.color, n.action, n.id_member, n.id_second, n.comment, CONCAT(m.first,', ', m.last) AS member_write, CONCAT(h.first,', ', h.last) AS members_add
        FROM remember n            
        INNER JOIN member m ON n.id_member = m.id 
        INNER JOIN member h ON n.id_second = h.id 
        WHERE (id_member = '$user' OR id_second = '$user') AND (date = '$nowdate') ORDER BY time  ASC";
    }

	$r = mysqli_query($dbc,$q);

	if ($r) {
		//$data = mysqli_fetch_all($r);

		$data = [];
		while ($row = mysqli_fetch_assoc($r)) {
    		$data[] = $row;
		}
	}
	else{
		$data =NULL;
	}
	
	return $data;
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


//Rest Post
function rest_post($dbc){

   //input data
   $user_name     = $_POST["user_name"];
   $from          = $_POST["user_email"];
   $phone_number  = $_POST["phone_number"];
   $body          = $_POST["msg"];

   //store mesasage to db
   $q = "INSERT INTO messages (name,email,phone,message,date) VALUES ('$user_name ','$from','$phone_number','$body', now() )";
   $r = mysqli_query($dbc,$q);

   if ($r) {
       deliver_response(200,"message sent",$NULL);
   }else{
       deliver_response(200,"no data",NULL);
   }


}


?>