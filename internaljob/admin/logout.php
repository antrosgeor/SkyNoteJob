<?php #Start Session:
	session_start();
	unset($_SESSION['username']); //Delete the username Key
	unset($_SESSION['test']); //Delete the username Key
	session_destroy(); // This would  delete all of the session keys.
	header('Location: login.php'); // se perni sto login.php
?>