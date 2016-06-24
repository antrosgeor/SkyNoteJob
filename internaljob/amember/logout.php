<?php #Start Session:

	session_start();
	unset($_SESSION['username']); //Delete the username Key
	unset($_SESSION['username']); //Delete the username Key
	unset($_SESSION['first']); //Delete the username Key
	unset($_SESSION['last']); //Delete the username Key
	unset($_SESSION['status']); //Delete the username Key
	unset($_SESSION['avatar']); //Delete the username Key
	unset($_SESSION['id']); //Delete the username Key
	unset($_SESSION['type_job']); //Delete the username Key
	unset($_SESSION['mphone']); //Delete the username Key
	unset($_SESSION['wphone']); //Delete the username Key
	unset($_SESSION['address']); //Delete the username Key
	unset($_SESSION['username']); //Delete the username Key
	unset($_SESSION['modal_send']); //Delete the username Key
 	unset($_SESSION['modal_send_member']); //Delete the username Key
 	unset($_SESSION['social_id']); //Delete the username Key
 	unset($_SESSION['from_view']); //Delete the username Key
 	unset($_SESSION['from_id']); //Delete the username Key
	unset($_SESSION['test']);
	session_destroy(); // This would  delete all of the session keys.
	header('Location: login.php'); // se perni sto login.php

?>