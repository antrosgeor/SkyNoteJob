<?php
	ini_set('date.timezone', 'Europe/Athens');
	date_default_timezone_set('Europe/Athens');
	$nowdate = date("Y-m-d");
	$nowtime = date("H:i:s");
	$user = $_SESSION['id'];

      $q = "SELECT n.id, n.date_write, n.title, n.message, n.date, n.time, n.lever, n.color, n.action, n.id_member, n.id_second, n.comment, CONCAT(m.first,', ', m.last) AS member_write, CONCAT(h.first,', ', h.last) AS members_add
        FROM remember n            
        INNER JOIN member m ON n.id_member = m.id 
        INNER JOIN member h ON n.id_second = h.id 
        WHERE (id_member = '$user' OR id_second = '$user') AND (date = '$nowdate')";

      $r = mysqli_query($dbc, $q);

      $Row = mysqli_num_rows($r);
      if($Row == 0){
      	$rowRemember_title = "You dont have Rememeber for Today";
      }	elseif ($Row != 0) {
      	  $rowRemember_title = $Row." Rememeber for Today";
 	 	      $r = mysqli_query($dbc, $q);
 	 	      while($today_remember_list = mysqli_fetch_assoc($r)){ 
      	     $today_remember_title = $today_remember_list['title'];
      	     $today_remember_time = $today_remember_list['time'];
          }
     }

?>