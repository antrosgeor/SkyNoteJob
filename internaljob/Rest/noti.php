<?php #noti

# conect with DB
require "init.php";
# get timezone
ini_set('date.timezone', 'Europe/Athens');
date_default_timezone_set('Europe/Athens');
// $Add_To = $_POST["Add_To"];
# get date
$nowdate = date("Y-m-d");
# get time
$nowtime = date("H:i:s");

echo "Today is " . date("l");
echo "<br/>";
echo "Time is " . $nowtime;
echo "<br/>";
echo "Date is " . $nowdate;
# get and show the timezone
$date = new DateTime();
$tz = $date->getTimezone();
echo $tz->getName();
echo '<br/>';
echo '<br/>';
echo '<br/>';

$user = 1;
$see = 0;
//id,date_write,title,message,date,time,lever,color,action,id_member,id_second,comment

	   //$q = "SELECT * FROM remember WHERE id_member = '$user' ORDER BY time ASC";
       
      $q = "SELECT n.id, n.date_write, n.title, n.message, n.date, n.time, n.lever, n.color, n.action, n.id_member, n.id_second, n.comment, CONCAT(m.first,', ', m.last) AS member_write, CONCAT(h.first,', ', h.last) AS members_add
        FROM remember n            
        INNER JOIN member m ON n.id_member = m.id 
        INNER JOIN member h ON n.id_second = h.id 
        WHERE (id_member = '$user' OR id_second = '$user') AND (date = '$nowdate')";

      $r = mysqli_query($con, $q);
      $rowRemember = mysqli_num_rows($r);
      $test=0;
      echo "Row remember ".$rowRemember ." <br/>";

      if ($rowRemember != 0) {
        while($my_list = mysqli_fetch_assoc($r)) { 
          $second_user = $my_list['id_second'];
          $test = $test + 1;
          echo "show test ".$test ." <br/>";
          echo "Id : ";
          echo $my_list['id'];
          echo "<br/> Date_write : ";
          echo $my_list['date_write'];
          echo "<br/> Title : ";
          echo $my_list['title'];
          echo "<br/> Message : ";
          echo $my_list['message'];
          echo "<br/> Date : ";
          echo $my_list['date'];
          echo "<br/> Time : ";
          echo $my_list['time'];
          echo "<br/> Lever : ";
          echo $my_list['lever'];
          echo "<br/> Color : ";
          echo $my_list['color'];
          echo "<br/> Action : ";
          echo $my_list['action'];
          echo "<br/>Id Member : ";
          echo $my_list['id_member'];
          echo "<br/> Id Second : ";
          echo $my_list['id_second'];
          echo "<br/>Comment : ";
          echo $my_list['comment'];
          echo "<br/>Member Write : ";
          echo $my_list['member_write'];
          echo "<br/>Member Add : ";
          echo $my_list['members_add'];
          echo " <br/><br/><br/><br/><br/><br/><br/>";
          // if ($second_user != "0" AND $second_user != $user) {
	        // 	$se = "SELECT * FROM member WHERE id = '$second_user'";
	        // 	$ser = mysqli_query($dbc, $se);
	        // 	$second = mysqli_fetch_assoc($ser); 
	        // }
		  }
    }else if ($rowRemember == 0) {
      echo "you dont have Remember for Today " . date("l") ." ". $nowdate;
    }




?>