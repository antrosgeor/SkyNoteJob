<?php 
include('../../config/connection.php');

	$id = $_GET['id'];
	$q = "SELECT avatar FROM member WHERE id = $id";
	$r = mysqli_query($dbc, $q);
	$data = mysqli_fetch_assoc($r);
?>

<div class="avatar-container" style="background-image: url('../uploads_member/<?php echo $opened['avatar']; ?>')"></div>