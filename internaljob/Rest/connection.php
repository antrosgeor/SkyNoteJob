<?php 

$host = "";
$user = "";
$password = "";
$dbname = "";

#Database Connection
$dbc = mysqli_connect($host, $user, $password, $dbname)
OR die('Error connecting to database: '.mysqli_connect_error());


// $dbc = pg_connect("host=ec2-54-243-199-79.compute-1.amazonaws.com
//  port=5432 dbname=de9nnd7aasdch4 user=yjrrzqwuspubpy password=DVCANVZGLUs0cGZrTgR17CjXoi options='--client_encoding=UTF8'");

	
   // $host        = "host=ec2-54-243-199-79.compute-1.amazonaws.com";
   // $port        = "port=5432";
   // $dbname      = "dbname=de9nnd7aasdch4";
   // $credentials = "user=yjrrzqwuspubpy password=DVCANVZGLUs0cGZrTgR17CjXoi";

   // $dbc = pg_connect( "$host $port $dbname $credentials" );
  
?>