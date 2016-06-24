<!--#index.php  video = 8  --> 
<!-- edo pio kato epikinoni me to setup-->
<?php include('config/setup.php'); ?>

<!DOCTYPE html>
<html>
<head><!-- Start Head-->
<!-- title -->
	<title><?php echo $_SESSION['Company_Name']; //echo $page['header'].'|'.$page_title; ?> </title>
<!-- meta-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- edo exoume tous sindesmous me ta css.php js.php-->
	<link rel="shortcut icon" href="images/sharethis.ico" />

	<?php include('config/css.php'); ?>
	<?php include('config/js.php'); ?>
</head><!-- Stop Head-->

<body><!-- Start body-->
	<div id="wrap"><!-- Start wrap -->

		<?php include(D_TEMPLATE.'/navigation.php'); ?><!--navbar -->	