<?php 

switch ($page) {
#dashboard
	case 'dashboard':
		
	break;

#pages
	case 'pages':
		// exo exoume to insert ,,, kai to vazoume prin tin anazitisi gia to sow gia na efaniziete otan kano save. 
		if(isset($_POST['submitted']) == 1) {
			$title  = mysqli_real_escape_string($dbc, $_POST['title']);
			$label  = mysqli_real_escape_string($dbc, $_POST['label']);
			$header = mysqli_real_escape_string($dbc, $_POST['header']);
			$body   = mysqli_real_escape_string($dbc, $_POST['body']);
			$forto   = mysqli_real_escape_string($dbc, $_POST['forto']);
			
		if(isset($_POST['id']) != '') { // an den einai keno kane update 
			$action = 'updated';
			$q = "UPDATE pages SET user = $_POST[user], slug = '$_POST[slug]', title = '$title', label = '$label', header = '$header', body = '$body', forto = '$forto' WHERE id = $_GET[id]";
		} else { // se periptosi pou einai keno to id tote tha kanis update 
			$action = 'added';
			$q = "INSERT INTO pages (user, slug, title, label, header, body , forto) VALUES ('$_POST[user]','$_POST[slug]','$title','$label','$header','$body', '$forto')";
		}
		
		$r = mysqli_query($dbc, $q);

		if($r){
			$message = '<p class="alert alert-success">Page was '.$action.'!</p>';
		} else {
			$message = '<p class="alert alert-danger">Page could not be '.$action.' because:'.mysqli_error($dbc);
			$message .= '<p class="alert alert-warning"> Query :'.$q.'</p>';
		}
	} 

	if(isset($_GET['id'])) { $opened = data_page($dbc, $_GET['id']); } 
// afto edo einai gia tin epistrofi.. dld gia to deftero button pou kano UPDATE.
	break;

#users		
	case 'users':
	// exo exoume to insert ,,, kai to vazoume prin tin anazitisi gia to sow gia na efaniziete otan kano save. 
		if(isset($_POST['submitted']) == 1) {
			$first  = mysqli_real_escape_string($dbc, $_POST['first']);
			$last   = mysqli_real_escape_string($dbc, $_POST['last']);
			$email   = mysqli_real_escape_string($dbc, $_POST['email']);

			if($_POST['password'] != '') {
				if ($_POST['password'] == $_POST['passwordv']) {
					$password = " password = sha1('$_POST[password]'),";
					$verify = true;
				} else { $verify = false;  }
			}else { $verify = false; }

			// first last name empty
			if ($_POST['first'] == '' OR $_POST['last'] == '' OR $_POST['email'] == '') { $first_last = false; 
			} else { $first_last_email = true; }

			if(isset($_POST['id']) != '') { 
				$action = 'updated';
				$q = "UPDATE admin_user SET first = '$first', last = '$last', email = '$_POST[email]', $password status = $_POST[status] WHERE id = $_GET[id]";
				$r = mysqli_query($dbc, $q);
			} else { 
				$action = 'added';
				$q = "INSERT INTO admin_user (first, last, email, password, status) VALUES ('$first', '$last', '$_POST[email]', sha1('$_POST[password]'), '$_POST[status]')";
				if ($verify == true AND $first_last_email = true) {
					$r = mysqli_query($dbc, $q); 
				}
			}

			if($r) {
				$message = '<p class="alert alert-success">User was '.$action.'!</p>';
			} else {
				$message = '<p class="alert alert-danger">User could not be '.$action.' because:'.mysqli_error($dbc);
				if($verify == false) {
					$message .= '<p class="alert alert-danger">Password fields empty and/or do not match. </p>';
				}
				if($first_last_email == false) {
					$message .= '<p class="alert alert-danger">First Name, Last Name, OR Email is empty. </p>';
				}
				$message .= '<p class="alert alert-warning"> Query :'.$q.'</p>';
			}
		}
		
		// afto edo einai gia tin epistrofi.. dld gia to deftero button pou kano UPDATE.
		if(isset($_GET['id'])) { $opened  = data_user($dbc, $_GET['id']); }
	
	break;

#type job
	case 'type_job':
	// exo exoume to insert ,,, kai to vazoume prin tin anazitisi gia to sow gia na efaniziete otan kano save. 
		if(isset($_POST['submitted']) == 1) {
			$name_job  = mysqli_real_escape_string($dbc, $_POST['name_job']);
			$team      = mysqli_real_escape_string($dbc, $_POST['team']);
			$lever     = mysqli_real_escape_string($dbc, $_POST['lever']);

			if(isset($_POST['id']) != '') { 
				$action = 'updated';
				$q = "UPDATE type_job SET name_job = '$name_job', team = '$team', lever = '$lever' WHERE id = $_GET[id]";
				$r = mysqli_query($dbc, $q);
			} else { 
				$action = 'added';
				$q = "INSERT INTO type_job (name_job, team, lever) VALUES ('$name_job', '$team', '$lever')";
				$r = mysqli_query($dbc, $q); 
			}
			
			if($r) {
				$message = '<p class="alert alert-success">Type Job was '.$action.'!</p>';
			} else {
				$message = '<p class="alert alert-danger">Type Job could not be '.$action.' because:'.mysqli_error($dbc);
				
				$message .= '<p class="alert alert-warning">Type Job :'.$q.'</p>';
			}
		} 
	// afto edo einai gia tin epistrofi.. dld gia to deftero button pou kano UPDATE.
		if(isset($_GET['id'])) { $opened  = data_type($dbc, $_GET['id']); }

	break;

#settings
	case 'settings':
	// exo exoume to insert ,,, kai to vazoume prin tin anazitisi gia to sow gia na efaniziete otan kano save. 
		if(isset($_POST['submitted']) == 1) {
			$label  = mysqli_real_escape_string($dbc, $_POST['label']);
			$value  = mysqli_real_escape_string($dbc, $_POST['value']);
			
			if(isset($_POST['id']) != '') { 
				$action = 'updated';
				$q = "UPDATE settings SET id = '$_POST[id]', label = '$label', value = '$value' WHERE id = '$_POST[openedid]'";
				$r = mysqli_query($dbc, $q);
			}
			
			if($r) {
				$message = '<p class="alert alert-success">Settings was '.$action.'!</p>';
			} else {
				$message = '<p class="alert alert-danger">Settings could not be '.$action.' because:'.mysqli_error($dbc);
				$message .= '<p class="alert alert-warning"> Query :'.$q.'</p>';
			}
		} 

	break;

#news
	case 'news':
		if ( isset($_POST['submited'])==1) {
			$title = mysqli_real_escape_string($dbc,$_POST['title']);
			$date = mysqli_real_escape_string($dbc,$_POST['date']);
			$user = mysqli_real_escape_string($dbc,$_POST['user']);
			$forto = mysqli_real_escape_string($dbc,$_POST['forto']);
			$body = mysqli_real_escape_string($dbc,$_POST['body']);

			if (isset($_POST['id']) !="") {
			   $action = "updated";
			   $q = "UPDATE news SET title = '$title', date = now(), author = '$user', body = '$body', forto = '$forto' WHERE id = $_POST[id] ";
			} else {
			   $action = "added";
			   $q = "INSERT INTO news (title, date, author, body, forto) VALUES ('$title', now(), '$user', '$body', '$forto')";
			}

			$r = mysqli_query($dbc,$q);

			if ($r) {
			   $message = '<p class="alert alert-success">News was '.$action.'!</p>';
			} else {
			   $message = '<p class="alert alert-danger">News could not be'.$action.'</p>'.mysqli_error($dbc);
			   $message .= '<p class="alert alert-warning">'.$q.'</p>';
			}  
		 }	
// afto edo einai gia tin epistrofi.. dld gia to deftero button pou kano UPDATE.
		if (isset($_GET['id'])) { $opened = data_news($dbc,$_GET['id']); } 

	break;

#members
	case 'members':
	// exo exoume to insert ,,, kai to vazoume prin tin anazitisi gia to sow gia na efaniziete otan kano save. 
		if(isset($_POST['submitted']) == 1) {
			$first    = mysqli_real_escape_string($dbc, $_POST['first']);
			$last     = mysqli_real_escape_string($dbc, $_POST['last']);
			$address  = mysqli_real_escape_string($dbc, $_POST['address']);
			$mphone    = mysqli_real_escape_string($dbc, $_POST['mphone']);
			$wphone    = mysqli_real_escape_string($dbc, $_POST['wphone']);
			$type_job = mysqli_real_escape_string($dbc, $_POST['type_job']);

			if($_POST['password'] != '') {
				if ($_POST['password'] == $_POST['passwordv']) {
					$password = " password = sha1('$_POST[password]'),";
					$verify = true;
				} else {
					$verify = false;
				}
			} else {
				$verify = false;
			}

			if($_POST[email] == ''){ $mail_empty = false; } 
			else { $mail_empty = true; }

			if(isset($_POST['id']) != '') { 
				$action = 'updated';
				$q = "UPDATE member SET first = '$first', last = '$last', email = '$_POST[email]', type_job = '$type_job', mphone = '$mphone', wphone = '$wphone', address = '$address', $password status = $_POST[status] WHERE id = $_GET[id]";
				$r = mysqli_query($dbc, $q);
			} else { 
				$action = 'added';
				$q = "INSERT INTO member (first, last, email, password, type_job, mphone, wphone, address, status) VALUES ('$first', '$last', '$_POST[email]', sha1('$_POST[password]'), '$type_job', '$mphone', '$wphone', '$address', '$_POST[status]')";
				if ($verify == true AND $mail_empty = true) {
					$r = mysqli_query($dbc, $q); 
				}
			}
						
			if($r) {
				$message = '<p class="alert alert-success">Member was '.$action.'!</p>';
			} else {
				$message = '<p class="alert alert-danger">Member could not be '.$action.' because:'.mysqli_error($dbc);
				if($verify == false) {
					$message .= '<p class="alert alert-danger">Password fields empty and/or do not match. </p>';
				}
				if($mail_empty == false) {
					$message .= '<p class="alert alert-danger">Email is empty. </p>';
				}
				$message .= '<p class="alert alert-warning"> Query :'.$q.'</p>';
			}
		} 
		// afto edo einai gia tin epistrofi.. dld gia to deftero button pou kano UPDATE.
		if(isset($_GET['id'])) { $opened  = data_member($dbc, $_GET['id']); }

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
				move_uploaded_file($temp, "../files/$name");
				$send_to = true;
				$action = 'added';
				$q = "INSERT INTO messages (title, message, lever, date, admin_from, user_from, admin_to, type_to, user_to, marked, send_note) VALUES ('$title', '$message', '$status', now(), '$admin_from', '$member_from', '$admin_to', '$type_to', '$member_to', '$marked', '$name')";
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
			$admin_from = $_SESSION['id'];
			$member_from = "0";
			$marked 	= "unread";
			$type_to    = "-1";
			$status = "4";  
			$to =  $_SESSION['from_view'];
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
				move_uploaded_file($temp, "../files/$name");
				$send_to = true;
				$action = 'added';
				$q = "INSERT INTO messages (title, message, lever, date, admin_from, user_from, admin_to, type_to, user_to, marked, send_note) VALUES ('$title', '$message', '$status', now(), '$admin_from', '$member_from', '$admin_to', '$type_to', '$member_to', '$marked', '$name')";
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

#default
	default:
		
		break;
	}
	
?>