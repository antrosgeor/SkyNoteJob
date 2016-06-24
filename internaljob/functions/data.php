<?php  #Data File:

function data_setting($dbc, $id){
	$q = "SELECT * FROM settings WHERE id = '$id'";
	$r = mysqli_query($dbc, $q);
	$data = mysqli_fetch_assoc($r);

	return $data['value'];
}

function data_page($dbc, $id) {

	if(is_numeric($id)) {
		$cond = "WHERE id = $id";
	} else { 
		$cond = "WHERE slug = '$id'";
	}

	$q = "SELECT * FROM pages $cond";
	$r = mysqli_query($dbc, $q);
	$data = mysqli_fetch_assoc($r);
	$data['body_mohtml'] = strip_tags($data['body']);
	
	// elexos gia an to body mas einai se morfi kodika i oxi ...
	if($data['body'] == $data['body_mohtml']){
		//an einai timi tote tha to ri3i se <p></p> kai tha to stili
		$data['body_formatted'] = '<p>'.$data['body'].'</p>';
	} else{
		// an einai se html IDI tote tha to stili kanonika afou exei idi ton kodika mesa.
		$data['body_formatted'] = $data['body'];
	}

	return $data;
}

?>