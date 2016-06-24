<?php 
#amember

switch ($page) {
#dashboard
	case 'dashboard':
		
	break;

#pages
	case 'pages':

	if(isset($_GET['id'])) { $opened = data_page($dbc, $_GET['id']); } 
// afto edo einai gia tin epistrofi.. dld gia to deftero button pou kano UPDATE.
		
	break;

#users		
	case 'users':

		if (isset($_GET['id'])) { $opened = data_news($dbc,$_GET['id']); } 
		// afto edo einai gia tin epistrofi.. dld gia to deftero button pou kano UPDATE.
	break;

#type job
	case 'type_job':
	break;

#settings
	case 'settings':

	break;

#news
	case 'news':
	
	if (isset($_GET['id'])) { $opened = data_news($dbc,$_GET['id']); } 
		// afto edo einai gia tin epistrofi.. dld gia to deftero button pou kano UPDATE.

	break;

#members
	case 'members':
	// exo exoume to insert ,,, kai to vazoume prin tin anazitisi gia to sow gia na efaniziete otan kano save. 
	if(isset($_POST['submitted_admin']) == 1) {
				
		$admin_from = "0";
		$member_from = $_SESSION['id'];
		$marked 	= "unread";
		$type_to    = "-1"; 
		$member_to  = "-1";
		$admin_to  = $_SESSION['modal_send'];
		$status = "4";
		$title = mysqli_real_escape_string($dbc, $_POST['recipient-name']);
		$message = mysqli_real_escape_string($dbc, $_POST['message-text']);

			$name = $_FILES['upload']['name'];
			// afto edo einai gia na valo arithous prosta
			$name = mt_rand(10000000, 99999999).$name;
			$temp = $_FILES['upload']['tmp_name'];
			$type = $_FILES['upload']['type'];
			$size = $_FILES['upload']['size'];
			//kai edo einai to ti idous arithoums tha mpoune
			// o logos pou to kano afto einai gia na min exo to idio onoma se ikones.
			$name - preg_replace("#[^a-z0-9.]#i", "",$name);

		if($type_to == '-1' && $member_to == '-1' && $admin_to == '-1' ) {
				$send_to = false;
			} else {
				$send_to = true;

				move_uploaded_file($temp, "../files/$name");

				$action = 'added';
				$q = "INSERT INTO messages (title, message, lever, date, admin_from, user_from, admin_to, type_to, user_to, marked, send_note) 
								VALUES ('$title', '$message', '$status', now(), '$admin_from', '$member_from', '$admin_to', '$type_to', '$member_to', '$marked', '$send_note')";
				if ($send_to == true) {
				$r = mysqli_query($dbc, $q); 
			}
		}
					
		if($r){
			$message = '<p class="alert alert-success">Message was '.$action.'!</p>';
		} else {
			$message = '<p class="alert alert-danger">Contact could not be '.$action.' because:'.mysqli_error($dbc);
			if($send_to == false) {
				$message .= '<p class="alert alert-danger">You have not selected sender. </p>';
			}
			$message .= '<p class="alert alert-warning"> Query :'.$q.'</p>';
		}
	}

	if(isset($_POST['submitted_member']) == 1)	{
		$admin_from = "0";
		$member_from = $_SESSION['id'];
		$marked 	= "unread";
		$type_to    = "-1"; 
		$member_to  = $_SESSION['modal_send_member'];
		$admin_to  = "-1";
		$status = "4";
		$title = mysqli_real_escape_string($dbc, $_POST['recipient-name']);
		$message = mysqli_real_escape_string($dbc, $_POST['message-text']);

			$name = $_FILES['upload']['name'];
			// afto edo einai gia na valo arithous prosta
			$name = mt_rand(10000000, 99999999).$name;
			$temp = $_FILES['upload']['tmp_name'];
			$type = $_FILES['upload']['type'];
			$size = $_FILES['upload']['size'];
			//kai edo einai to ti idous arithoums tha mpoune
			// o logos pou to kano afto einai gia na min exo to idio onoma se ikones.
			$name - preg_replace("#[^a-z0-9.]#i", "",$name);

		if($type_to == '-1' && $member_to == '-1' && $admin_to == '-1' ) {
				$send_to = false;
			} else {
				$send_to = true;

				move_uploaded_file($temp, "../files/$name");

				$action = 'added';
				$q = "INSERT INTO messages (title, message, lever, date, admin_from, user_from, admin_to, type_to, user_to, marked, send_note) 
								VALUES ('$title', '$message', '$status', now(), '$admin_from', '$member_from', '$admin_to', '$type_to', '$member_to', '$marked', '$name')";
				if ($send_to == true) {
				$r = mysqli_query($dbc, $q); 
			}
		}
					
		if($r){
			$message = '<p class="alert alert-success">Message was '.$action.'!</p>';
		} else {
			$message = '<p class="alert alert-danger">Contact could not be '.$action.' because:'.mysqli_error($dbc);
			if($send_to == false) {
				$message .= '<p class="alert alert-danger">You have not selected sender. </p>';
			}
			$message .= '<p class="alert alert-warning"> Query :'.$q.'</p>';
		}
	}


/////////////
if (isset($_POST['changes_my']) == 9) {
		
		$first = mysqli_real_escape_string($dbc, $_POST['first']);
		$last = mysqli_real_escape_string($dbc, $_POST['last']);
		$email = mysqli_real_escape_string($dbc, $_POST['email']);
		$address = mysqli_real_escape_string($dbc, $_POST['address']);
		$wphone = mysqli_real_escape_string($dbc, $_POST['wphone']);
		$mphone = mysqli_real_escape_string($dbc, $_POST['mphone']);
		$password = mysqli_real_escape_string($dbc, $_POST['password']);
		$member = $_SESSION['id'];

		$name = $_FILES['upload']['name'];
		// afto edo einai gia na valo arithous prosta
		$name = mt_rand(10000000, 99999999).$name;
		$temp = $_FILES['upload']['tmp_name'];
		$type = $_FILES['upload']['type'];
		$size = $_FILES['upload']['size'];
		//kai edo einai to ti idous arithoums tha mpoune
		// o logos pou to kano afto einai gia na min exo to idio onoma se ikones.
		$name - preg_replace("#[^a-z0-9.]#i", "",$name);

		
	if($first != "" && $last != "" && $email != "" && $name == ""){
		$all = true;
		$action = 'added';
		
		$q = "UPDATE member SET first = '$first', last = '$last', email = '$email', address = '$address', mphone = '$mphone', wphone = '$wphone' WHERE id = '$member'";
		// bazo edo to anevasma tis foto.. giati thelo na gini kai i extelese..
		//an perasi to proto erotima kai oxi to deftero tote aneveni i foto.
		// ara to vazo edo gia na min aneveni sinexia i foto kai m gemizi ton xoro..
		// move_uploaded_file($temp, "../uploads_member/$name");

	}elseif($first != "" && $last != "" && $email != "" && $name != ""){
		$all = true;
		$action = 'added';
		$q = "UPDATE member SET first = '$first', last = '$last', email = '$email', address = '$address', mphone = '$mphone', wphone = '$wphone', avatar = '$name' WHERE id = '$member'";
		// bazo edo to anevasma tis foto.. giati thelo na gini kai i extelese..
		//an perasi to proto erotima kai oxi to deftero tote aneveni i foto.
		// ara to vazo edo gia na min aneveni sinexia i foto kai m gemizi ton xoro..
		move_uploaded_file($temp, "../uploads_member/$name");
	} else { 
		$all = false; 
	} 
	
	if($all == true){
			$r = mysqli_query($dbc, $q); 
		}
		if($r){
			$message = '<p class="alert alert-success">Message was '.$action.'!</p>';
		} else {
			$message = '<p class="alert alert-danger">Contact could not be '.$action.' because:'.mysqli_error($dbc);
			if($all == false) {
				$message .= '<p class="alert alert-danger">You have not selected a VALUES. </p>';
			}
					
			$message .= '<p class="alert alert-warning"> Query :'.$q.' You have to logout and login again</p>';
		}
	}

/////////////






	if (isset($_POST['contactplus']) == 3) {
		
		$first = mysqli_real_escape_string($dbc, $_POST['first']);
		$last = mysqli_real_escape_string($dbc, $_POST['last']);
		$email = mysqli_real_escape_string($dbc, $_POST['email']);
		$address = mysqli_real_escape_string($dbc, $_POST['address']);
		$wphone = mysqli_real_escape_string($dbc, $_POST['wphone']);
		$mphone = mysqli_real_escape_string($dbc, $_POST['mphone']);
		$note = mysqli_real_escape_string($dbc, $_POST['note-text']);
		$member = $_SESSION['id'];
		$social = "0";

		$name = $_FILES['upload']['name'];
		// afto edo einai gia na valo arithous prosta
		$name = mt_rand(10000000, 99999999).$name;
		$temp = $_FILES['upload']['tmp_name'];
		$type = $_FILES['upload']['type'];
		$size = $_FILES['upload']['size'];
		//kai edo einai to ti idous arithoums tha mpoune
		// o logos pou to kano afto einai gia na min exo to idio onoma se ikones.
		$name - preg_replace("#[^a-z0-9.]#i", "",$name);

	if(($type == "image/jpeg") || ($type == "image/gif") || ($type == "image/jpg") || ($type == "image/pjpeg") ) {
		$images = true;
		
	if($first != "" && $last != "" && $email != "" && $address != "" && $wphone != "" && $mphone != ""){
		$all = true;
		$action = 'added';
		$q = "INSERT INTO contact (first, last, email, address, mphone, wphone, avatar, note, id_member, id_social) VALUES ('$first', '$last', '$email', '$address', '$mphone', '$wphone', '$name', '$note', '$member', '$social')";
		
		// bazo edo to anevasma tis foto.. giati thelo na gini kai i extelese..
		//an perasi to proto erotima kai oxi to deftero tote aneveni i foto.
		// ara to vazo edo gia na min aneveni sinexia i foto kai m gemizi ton xoro..
		move_uploaded_file($temp, "../uploads_contact/$name");

	} else { $all = false; } 
} else { $images = false; }

		if(($images == true) && ($all == true)){
			$r = mysqli_query($dbc, $q); 
		}
						
		if($r){
			$message = '<p class="alert alert-success">Message was '.$action.'!</p>';
		} else {
			$message = '<p class="alert alert-danger">Contact could not be '.$action.' because:'.mysqli_error($dbc);
			if($images == false) {
					$message .= '<p class="alert alert-danger">You have not selected image. </p>';
				}
			if($all == false) {
				$message .= '<p class="alert alert-danger">You have not selected a VALUES. </p>';
			}
					
			$message .= '<p class="alert alert-warning"> Query :'.$q.'</p>';
		}
	}

	if (isset($_POST['social']) == 4) {

		$ok = false;
		$Bebo = mysqli_real_escape_string($dbc, $_POST['Bebo']);
		$Classmates = mysqli_real_escape_string($dbc, $_POST['Classmates']);
		$Facebook = mysqli_real_escape_string($dbc, $_POST['Facebook']);
		$Friendster = mysqli_real_escape_string($dbc, $_POST['Friendster']);
		$Google = mysqli_real_escape_string($dbc, $_POST['Google']);
		$LinkedIn = mysqli_real_escape_string($dbc, $_POST['LinkedIn']);
		$MySpace = mysqli_real_escape_string($dbc, $_POST['MySpace']);
		$Orkut = mysqli_real_escape_string($dbc, $_POST['Orkut']);
		$Instagram = mysqli_real_escape_string($dbc, $_POST['Instagram']);
		$Pinterest = mysqli_real_escape_string($dbc, $_POST['Pinterest']);
		$StumbleUpon = mysqli_real_escape_string($dbc, $_POST['StumbleUpon']);
		$Twitter = mysqli_real_escape_string($dbc, $_POST['Twitter']);
		$Skype = mysqli_real_escape_string($dbc, $_POST['Skype']);
		$YouTube = mysqli_real_escape_string($dbc, $_POST['YouTube']);
		$member_social = $_SESSION['social_id'];//=> $member_social == $opened_contact['id'];

		$q ="SELECT * FROM social WHERE id_contact = '$member_social'";
		$r=mysqli_query($dbc, $q);
		$row = mysqli_num_rows($r);

		if ($row == 0) {
			$action = "added";
		$q = "INSERT INTO social (id_contact, bebo, classmates, facebook, friendster, google, linkedin, myspace, orkut, instagram, pinterest, stumbleupon, twitter, skype, youtube) 
			VALUES ('$member_social', '$Bebo', '$Classmates', '$Facebook', '$Friendster', '$Google', '$LinkedIn', '$MySpace', '$Orkut', '$Instagram', '$Pinterest','$StumbleUpon','$Twitter', '$Skype','$YouTube')";
		$r = mysqli_query($dbc, $q);
		$ok= true;
		$message = '<p class="alert alert-success">Message was '.$action.'!</p>';

		} else {
			$ok= true;
			$action = "update";
			$q = "UPDATE social SET id_contact = '$member_social', bebo = '$Bebo', classmates = '$Classmates', facebook = '$Facebook', friendster = '$Friendster', google = '$Google', linkedin = '$LinkedIn', myspace = '$MySpace', orkut = '$Orkut', instagram = '$Instagram', pinterest = '$Pinterest', stumbleupon = '$StumbleUpon', twitter = '$Twitter', skype = '$Skype', youtube = '$YouTube' WHERE id_contact = '$member_social'";
		$r = mysqli_query($dbc, $q);
		$ok= true;
		$message = '<p class="alert alert-success">Message was '.$action.'!</p>';
		} if ($ok == false) {
			$message .= '<p class="alert alert-warning">Something went wrong, please try again OR send mail to Admin!.</p>';
		}	
	}

		// afto edo einai gia tin epistrofi.. dld gia to deftero button pou kano UPDATE.
		if(isset($_GET['id_contact'])) { $opened_contact  = data_contact($dbc, $_GET['id_contact']); }
		if(isset($_GET['id_member'])) { $opened_member  = data_member($dbc, $_GET['id_member']); }
		if(isset($_GET['id_admin'])) { $opened_admin  = data_user($dbc, $_GET['id_admin']); }
	break;
		
#Messages
	case 'messages':

	break;

#Contact
	case 'contact':
	// exo exoume to insert ,,, kai to vazoume prin tin anazitisi gia to sow gia na efaniziete otan kano save. 
		if(isset($_POST['submitted']) == 1) {
			$admin_from = $_SESSION['id'];
			$member_from = "0";
			$marked 	= "unread";
			$type_to    = mysqli_real_escape_string($dbc, $_POST['type_to']);
			$member_to  = mysqli_real_escape_string($dbc, $_POST['member_to']);
			$admin_to   = mysqli_real_escape_string($dbc, $_POST['admin_to']);
			$date       = mysqli_real_escape_string($dbc, $_POST['date']);
			$status     = mysqli_real_escape_string($dbc, $_POST['status']);
			$title      = mysqli_real_escape_string($dbc, $_POST['title']);
			$message    = mysqli_real_escape_string($dbc, $_POST['body']);

			$name = $_FILES['upload']['name'];
			// afto edo einai gia na valo arithous prosta
			$name = mt_rand(10000000, 99999999).$name;
			$temp = $_FILES['upload']['tmp_name'];
			$type = $_FILES['upload']['type'];
			$size = $_FILES['upload']['size'];
			//kai edo einai to ti idous arithoums tha mpoune
			// o logos pou to kano afto einai gia na min exo to idio onoma se ikones.
			$name - preg_replace("#[^a-z0-9.]#i", "",$name);

			if($type_to == '-1' && $member_to == '-1' && $admin_to == '-1' ) {
					$send_to = false;
				} else {
					$send_to = true;

					move_uploaded_file($temp, "../files/$name");

					$action = 'added';
					$q = "INSERT INTO messages (title, message, lever, date, admin_from, user_from, admin_to, type_to, user_to, marked, send_note) 
									VALUES ('$title', '$message', '$status', now(), '$admin_from', '$member_from', '$admin_to', '$type_to', '$member_to', '$marked', '$send_note')";
					if ($send_to == true) {
					$r = mysqli_query($dbc, $q); 
				}
			}
						
			if($r) {
				$message = '<p class="alert alert-success">Message was '.$action.'!</p>';
			} else {
				$message = '<p class="alert alert-danger">Contact could not be '.$action.' because:'.mysqli_error($dbc);
				if($send_to == false) {
					$message .= '<p class="alert alert-danger">You have not selected sender. </p>';
				}
				$message .= '<p class="alert alert-warning"> Query :'.$q.'</p>';
			}
		} 

	break;

#view_message
	case 'view_message':
	// exo exoume to insert ,,, kai to vazoume prin tin anazitisi gia to sow gia na efaniziete otan kano save. 
		if(isset($_POST['submitted']) == 1) {
			$admin_from = "0";
			$member_from = $_SESSION['id'];
			$marked 	= "unread";
			$type_to    = "-1";
			$status = "4";  
			$to =  $_SESSION['from_view'];

			$name = $_FILES['upload']['name'];
			// afto edo einai gia na valo arithous prosta
			$name = mt_rand(10000000, 99999999).$name;
			$temp = $_FILES['upload']['tmp_name'];
			$type = $_FILES['upload']['type'];
			$size = $_FILES['upload']['size'];
			//kai edo einai to ti idous arithoums tha mpoune
			// o logos pou to kano afto einai gia na min exo to idio onoma se ikones.
			$name - preg_replace("#[^a-z0-9.]#i", "",$name);

		if($to == "1") {
			$member_to  = "-1";
			$admin_to   = $_SESSION['from_id'];
		} elseif ($to == "2") {
			$admin_to   = "-1";
			$member_to  = $_SESSION['from_id'];
		} else {
			$member_to  = "10";
			$admin_to   = "3";
		}
			$title      = mysqli_real_escape_string($dbc, $_POST['recipient-name']);
			$message    = mysqli_real_escape_string($dbc, $_POST['message-text']);

			if($type_to == '-1' && $member_to == '-1' && $admin_to == '-1' ) {
					$send_to = false;
				} else {
					$send_to = true;
					
					move_uploaded_file($temp, "../files/$name");

					$action = 'added';
					$q = "INSERT INTO messages (title, message, lever, date, admin_from, user_from, admin_to, type_to, user_to, marked, send_note) 
									VALUES ('$title', '$message', '$status', now(), '$admin_from', '$member_from', '$admin_to', '$type_to', '$member_to', '$marked', '$name')";
					if ($send_to == true) {
					$r = mysqli_query($dbc, $q); 
				}
			}
						
			if($r) {
				$message = '<p class="alert alert-success">Message was '.$action.'!</p>';
			} else {
				$message = '<p class="alert alert-danger">Contact could not be '.$action.' because:'.mysqli_error($dbc);
				if($send_to == false) {
					$message .= '<p class="alert alert-danger">You have not selected sender. </p>';
				}
				$message .= '<p class="alert alert-warning"> Query :'.$q.'</p>';
			}
		} 

	break;
#notes
	case 'notes':
		if(isset($_POST['notesplus']) == 1) {
			$title = mysqli_real_escape_string($dbc, $_POST['title']);
			$body  = mysqli_real_escape_string($dbc, $_POST['body']);
			$color = mysqli_real_escape_string($dbc, $_POST['color']);
			$lever = mysqli_real_escape_string($dbc, $_POST['lever']);
			$id_note_member = $_SESSION['id'];

		$action = 'added';
			$q = "INSERT INTO notes (title, body, date, lever, color, id_member) VALUES ('$title', '$body', now(), '$lever', '$color', '$id_note_member')";
			$r = mysqli_query($dbc, $q); 
					
		if($r) {
			$message = '<p class="alert alert-success">Note was '.$action.'!</p>';
		} else {
			$message = '<p class="alert alert-danger">Note could not be '.$action.' because:'.mysqli_error($dbc);
			$message .= '<p class="alert alert-warning"> Query :'.$q.'</p>';
		}
	}

	if(isset($_GET['id'])) { $opened = data_notes($dbc, $_GET['id']); }

	break;

#type job
	case 'remember':
	if(isset($_POST['rememberPlus']) == 1) {
		//titlos remember
		$title = mysqli_real_escape_string($dbc, $_POST['title']);
		// to minima pou theli na stili
		$message  = mysqli_real_escape_string($dbc, $_POST['message']);
		//action
		$action  = mysqli_real_escape_string($dbc, $_POST['action']);
		//radio_name
		$radio_name  = mysqli_real_escape_string($dbc, $_POST['radio_name']);
		//second
		$second  = mysqli_real_escape_string($dbc, $_POST['second']);
		//date
		$date  = mysqli_real_escape_string($dbc, $_POST['date']);
		//time
		$time  = mysqli_real_escape_string($dbc, $_POST['time']);
		//to xroma tou remember
		$color = mysqli_real_escape_string($dbc, $_POST['color']);
		// to lever tou remember
		$lever = mysqli_real_escape_string($dbc, $_POST['lever']);
		// to id tou user..
		$id_member = $_SESSION['id'];

		if ($action == "others") {
			$real_action = $radio_name;
		} else {
			$real_action = $action;
		}
			$action = 'added';
			$q = "INSERT INTO remember 
			(date_write, title, message, date, time, lever, color, action, id_member, id_second) 
		VALUES (now(), '$title', '$message', '$date', '$time', '$lever', '$color', '$real_action', '$id_member', '$second')";
			$r = mysqli_query($dbc, $q); 
					
		if($r) {
			$message = '<p class="alert alert-success">Remember was '.$action.'!</p>';
		} else {
			$message = '<p class="alert alert-danger">Remember could not be '.$action.' because:'.mysqli_error($dbc);
			$message .= '<p class="alert alert-warning"> Query :'.$q.'</p>';
		}
	}

	break;

#default
	default:
		
		break;
	}

?>