<?php #Data File:

// Settings = data_settings
function data_setting($dbc, $id) {
	$q = "SELECT * FROM settings WHERE id = '$id'";
	$r = mysqli_query($dbc, $q);
	$data = mysqli_fetch_assoc($r);

	return $data['value'];
}

// Admin User = data_user
function data_user($dbc, $id) {
	if(is_numeric($id)) {
		$cond = "WHERE id = '$id'";
	} else {
		$cond = "WHERE email = '$id'";
	}
	// edo pernoume tin timi tou $_SESSION[username] kai me vasi afto tha pe3oume me to erotima.
	$q = "SELECT * FROM admin_user $cond";
	$r = mysqli_query($dbc, $q);
	$data = mysqli_fetch_assoc($r);
	// edo exoume to onoma olokliromeno opote mporoume na to kalesoume me to ['fullname'] 
	$data['fullname'] = $data['first'].' '.$data['last'];
	// kai edo to exoume me to epitheto prota. 
	$data['fullname_reverse']= $data['last'].' '.$data['first'];
	
	return $data;
}

// Member = data_member
function data_member($dbc, $id) {
	if(is_numeric($id)){
		$cond = "WHERE id = '$id'";
	} else {
		$cond = "WHERE email = '$id'";
	}
	// edo pernoume tin timi tou $_SESSION[username] kai me vasi afto tha pe3oume me to erotima.
	$q = "SELECT * FROM member $cond";
	$r = mysqli_query($dbc, $q);
	$data = mysqli_fetch_assoc($r);
	// edo exoume to onoma olokliromeno opote mporoume na to kalesoume me to ['fullname'] 
	$data['fullname'] = $data['first'].' '.$data['last'];
	// kai edo to exoume me to epitheto prota. 
	$data['fullname_reverse']= $data['last'].' '.$data['first'];
	
	return $data;
}

// Type Jobs = data_type
function data_type($dbc, $id) {
	if(is_numeric($id)){
		$cond = "WHERE id = '$id'";
	} else {
		$cond = "WHERE email = '$id'";
	}
	// edo pernoume tin timi tou $_SESSION[username] kai me vasi afto tha pe3oume me to erotima.
	$q = "SELECT * FROM type_job $cond";
	$r = mysqli_query($dbc, $q);
	$data = mysqli_fetch_assoc($r);
	// edo exoume to onoma olokliromeno opote mporoume na to kalesoume me to ['fullname'] 
	$data['fullname'] = $data['name_job'];
	return $data;
}

// Pages = data_page 
function data_page($dbc, $id) {
	$q = "SELECT * FROM pages WHERE id = $id";
	$r = mysqli_query($dbc, $q);
	$data = mysqli_fetch_assoc($r);
	$data['body_mohtml'] = strip_tags($data['body']);
	// elexos gia an to body mas einai se morfi kodika i oxi ...
	if($data['body'] == $data['body_mohtml']) {
		//an einai timi tote tha to ri3i se <p></p> kai tha to stili
		$data['body_formatted'] = '<p>'.$data['body'].'</p>';
	} else {
		// an einai se html IDI tote tha to stili kanonika afou exei idi ton kodika mesa.
		$data['body_formatted'] = $data['body'];
	}
	return $data;
}

// News = data_news
function data_news($dbc,$id) {
	$q = "SELECT * FROM news WHERE id = '$id'";	
	$r = mysqli_query($dbc, $q);
	$data = mysqli_fetch_assoc($r);
	
	return $data;
}

// edo pernoume tin imerominia
function get_date() {
	$date = getdate();
	$month = $date['month'];
	$day = $date['mday'];
	$year = $date['year'];
	$date = $month." ".$day.", ".$year;

	return $date;
}

?>