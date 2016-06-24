<!-- static value -->
<?php
// Start the session
	session_start();
	$_SESSION['Company_Name'] = "Name of Company"; 
?>
<!--header -->
	<?php include('template/header.php'); ?>
<!--page -->
	<?php include('views/page.php'); ?>	
<!--footer -->
	<?php include('template/footer.php'); ?>