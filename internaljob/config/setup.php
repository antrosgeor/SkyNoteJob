<?php  #Setup File:
	error_reporting(0);

	#Database Connection:
	include('config/connection.php');
	# Constants: <!-- me afto to tropo an ala3ouem to onoma tou pinaka tole alazoume mono afto edo.-->
	DEFINE('D_TEMPLATE', 'template');

	#Functions:
	include('functions/sandbox.php');
	include('functions/data.php');
	include('functions/template.php');

	#site Setup:
	$debug = data_setting($dbc, 'debug-status');

	$path = get_path();

	//statikes times.
	$site_title = 'Page User';
	$page_title = 'Name User';

	//metavlites times me vasi tin vasei dedomenon mas.
	
	// //if(isset($_GET['page'])){
	// $pageid = $_GET['page']; // edo perni tin kathe selida ?page=
	// } else {
	// 	$pageid = 'home'; // edo perni tin selida ?page=1
	// }
	if(!isset($path['call_parts'][0]) || $path['call_parts'][0] == '' ) {
		// $path['call_parts'][0] = 'home'; // edo perni tin kathe selida ?page=
		header('Location: home');
	} 
	
	# page 
	# to data_page einai funcrions pou to exoume sto data. 
	//$page = data_page($dbc, $pageid);
	$page = data_page($dbc, $path['call_parts'][0]);
?>