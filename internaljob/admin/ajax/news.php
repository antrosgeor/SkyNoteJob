<?php 
// me too kalesmas diagrafete to news pou exei to id.
include('../../config/connection.php');

	$id = $_GET['id'];
	echo $id;

	$q = "DELETE FROM news WHERE id = $id";
	$r = mysqli_query($dbc,$q);

	if ($r) {
		echo "post deleted";
	}else{
		echo "there was an error...<br>";
		echo $q.'<br>';
		echo mysqli_error($dbc);
	}

?>