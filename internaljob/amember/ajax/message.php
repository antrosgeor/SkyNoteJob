<?php #delete from type_job.
// me too kalesmas diagrafete to type_job pou exei to id.

include('../../config/connection.php');

$id = $_GET['id'];
echo $id;

$q = "DELETE FROM messages WHERE id = $id";
$r = mysqli_query($dbc,$q);

if ($r) {
	echo "Message deleted";
} else {
	echo "there was an error...<br>";
	echo $q.'<br>';
	echo mysqli_error($dbc);
}

?>