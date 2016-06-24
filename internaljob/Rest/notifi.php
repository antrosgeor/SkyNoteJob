<?php 


require "init.php";
ini_set('date.timezone', 'Europe/Athens');
date_default_timezone_set('Europe/Athens');
//$Add_To = $_POST["Add_To"];
$see = 0;
$nowdate = date("Y-m-d");
$nowtime = date("H:i:s");

echo $nowtime;

echo '<br/>';
echo "Today is " . date("Y/m/d") . "<br>";
echo "Today is " . date("Y.m.d") . "<br>";
echo "Today is " . date("Y-m-d") . "<br>";
echo "Today is " . date("l");
?>
&copy; 2010-<?php echo date("Y");?>

<?php

echo "The time is " . date("h:i:s");
echo '<br/>';



echo "The time is " . date("h:i:sa");
echo '<br/>';
echo '<br/>';

$date = new DateTime();
$tz = $date->getTimezone();
echo $tz->getName();
echo '<br/>';
echo '<br/>';
echo '<br/>';


$d=mktime(11, 14, 54, 8, 12, 2014);
echo "Created date is " . date("Y-m-d h:i:sa", $d);


$d=strtotime("10:30pm April 15 2014");
echo "Created date is " . date("Y-m-d h:i:sa", $d);




$d=strtotime("tomorrow");
echo date("Y-m-d h:i:sa", $d) . "<br>";

$d=strtotime("next Saturday");
echo date("Y-m-d h:i:sa", $d) . "<br>";

$d=strtotime("+3 Months");
echo date("Y-m-d h:i:sa", $d) . "<br>";


$startdate = strtotime("Saturday");
$enddate = strtotime("+6 weeks", $startdate);

while ($startdate < $enddate) {
  echo date("M d", $startdate) . "<br>";
  $startdate = strtotime("+1 week", $startdate);
}


$d1=strtotime("July 04");
$d2=ceil(($d1-time())/60/60/24);
echo "There are " . $d2 ." days until 4th of July.";

?>