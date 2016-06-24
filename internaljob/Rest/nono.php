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
       
    
  $r = mysqli_query($con,$q);

      if ($r) {
        //$data = mysqli_fetch_all($r);

        $data = [];
        while ($row = mysqli_fetch_assoc($r)) {
            $data[] = $row;
        }

      }
      else{
        $data =NULL;
      }
      
      return $data;
        
    }else if ($rowRemember == 0) {
      echo "you dont have Remember for Today " . date("l") ." ". $nowdate;
    }




?>