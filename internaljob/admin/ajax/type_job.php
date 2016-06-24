<?php #delete from type_job.
// me too kalesmas diagrafete to type_job pou exei to id.

include('../../config/connection.php');

	$id = $_GET['id'];
	echo $id;

	$q = "DELETE FROM type_job WHERE id = $id";
	$r = mysqli_query($dbc,$q);

	if ($r) {
		echo "Type deleted";
	}else{
		echo "there was an error...<br>";
		echo $q.'<br>';
		echo mysqli_error($dbc);
	}
	
?>