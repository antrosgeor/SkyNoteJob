<?php  #Database Connection..
	
	// // $dbc = mysqli_connect('localhost', 'username', 'password', 'databasename');
	// $dbc = mysqli_connect('localhost', 'root', '', 'ageor') 
	// 		OR die('Error: '.mysqli_connect_error());
	
   // $host        = "host=ec2-54-243-199-79.compute-1.amazonaws.com";
   // $port        = "port=5432";
   // $dbname      = "dbname=de9nnd7aasdch4";
   // $credentials = "user=yjrrzqwuspubpy password=DVCANVZGLUs0cGZrTgR17CjXoi";

   // $dbc = pg_connect( "$host $port $dbname $credentials" );
   // if(!$dbc){
   //    echo "Error : Unable to open database\n";
   // } else {
   //    echo "Opened database successfully\n";
   // }

   $host = "";
   $user = "";
   $password = "";
   $dbname = "";

   #Database Connection
   $dbc = mysqli_connect($host, $user, $password, $dbname)
   OR die('Error connecting to database: '.mysqli_connect_error());

?>