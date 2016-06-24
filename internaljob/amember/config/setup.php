<?php  #Setup File:

	error_reporting(0);
	
	#Database Connection:
	include('config/connection.php');

	# Constants: <!-- me afto to tropo an ala3ouem to onoma tou pinaka tole alazoume mono afto edo.-->
	DEFINE('D_TEMPLATE', 'template');

	#Functions:
	include('functions/data.php');
	include('functions/template.php');
	include('functions/sandbox.php');

	#site Setup:
	$debug = data_setting($dbc, 'debug-status');

	//statikes times.
	$site_title = 'Page User';
	$page_title = 'Name User';

//metavlites times me vasi tin vasei dedomenon mas.

	if(isset($_GET['page'])){
		$page = $_GET['page']; // edo perni tin kathe selida ?page=
	} else {
		$page = "dashboard"; // edo perni tin selida ?page=1
	}
	# page 	# to data_page einai funcrions pou to exoume sto data. 
	include('config/queries.php');
	//$page = data_page($dbc, $pageid);

	#User Setup
	$user = data_user($dbc, $_SESSION['username']);

?>