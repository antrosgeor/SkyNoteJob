<!--#index.php  video 23--><!--  exo ftasi mexri to 44.-->
<?php // elexos gia to an o admin einai login.

#start the session:
	session_start();
// an den exei kani login tote ton petati sto login.php
	if (!isset($_SESSION['username']) OR $_SESSION['test'] == "Admin") { header('Location: login.php'); }
?>

<?php include('config/setup.php'); ?><!-- edo pio kato epikinoni me to setup-->

<!DOCTYPE html>
<html>
<head><!-- Start head-->

	<title><?php echo $page.' | '.$page_title; ?> </title> <!-- title -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- meta-->
	<!-- edo exoume tous sindesmous me ta css.php js.php-->

	<script type="text/javascript" src="functions/custom.js"></script>
	<link rel="shortcut icon" href="../images/sharethis.ico" />
	<?php include('config/css.php'); ?>
	<?php include('config/js.php'); ?>
	
</head><!-- Stop head-->

<body><!-- Start body-->

	<div id="wrap"><!-- Start wrap-->	
		<?php include(D_TEMPLATE.'/navigation.php'); ?><!--navbar -->			
