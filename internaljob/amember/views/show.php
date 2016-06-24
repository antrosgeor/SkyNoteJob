<?php #Messages
	// gia na mporesi na to diavasi.
	$user = 1;

?>
<?php 
#show
include('../config/connection.php'); 

	ini_set('date.timezone', 'Europe/Athens');
	date_default_timezone_set('Europe/Athens');
	$nowdate = date("Y-m-d");
	$nowtime = date("H:i:s");
	$timeIn10Minutes = date("H:i:s",strtotime(date("H:i:s")." +10 minutes"));
	$timeOut10Minutes = date("H:i:s",strtotime(date("H:i:s")." -10 minutes"));

      $q = "SELECT n.id, n.date_write, n.title, n.message, n.date, n.time, n.lever, n.color, n.action, n.id_member, n.id_second, n.comment, CONCAT(m.first,', ', m.last) AS member_write, CONCAT(h.first,', ', h.last) AS members_add, CONCAT(h.avatar) AS member_add_avatar, CONCAT(m.avatar) AS member_write_avatar
        FROM remember n            
        INNER JOIN member m ON n.id_member = m.id 
        INNER JOIN member h ON n.id_second = h.id 
        WHERE (id_member = '$user' OR id_second = '$user') AND (date = '$nowdate') AND (time >= '$timeOut10Minutes' AND time <= '$timeIn10Minutes')";

      $r = mysqli_query($dbc, $q);

      $Row = mysqli_num_rows($r);
     
	  if($Row == 0){
      	$rowRemember_title = "You dont have Rememeber for Today";
      }	elseif ($Row != 0) {
      	     	  	$status = 1;
      	      	$rowRemember_title = $Row." Rememeber for Today";
 	 	$r = mysqli_query($dbc, $q);
 	 	while($today_remember_list = mysqli_fetch_assoc($r)){ 
      	$today_remember_id = $today_remember_list['id'];
      	$today_remember_date_write = $today_remember_list['date_write'];
      	$today_remember_title = $today_remember_list['title'];
      	$today_remember_message = $today_remember_list['message'];
      	$today_remember_date = $today_remember_list['date'];
      	$today_remember_time = $today_remember_list['time'];
      	$today_remember_lever = $today_remember_list['lever'];
      	$today_remember_color = $today_remember_list['color'];
      	$today_remember_action = $today_remember_list['action'];
      	$today_remember_id_member = $today_remember_list['id_member'];
      	$today_remember_id_second = $today_remember_list['id_second'];
      	$today_remember_commment = $today_remember_list['comment'];
      	$today_remember_member_write = $today_remember_list['member_write'];
      	$today_remember_members_add = $today_remember_list['members_add'];
        $today_remember_members_add_avatar = $today_remember_list['member_add_avatar'];
        $today_remember_members_write_avatar = $today_remember_list['member_write_avatar'];

    }
 }
?>



<script>
	$( document ).ready(function() {
	$statuss = <?php echo $status; ?>;
	if ($statuss ==1) {
	     $("#button1").click();
	 }
	});

</script>
<div>
<button  style="display:none;" id="button1" type="button" class="btn btn-primary" data-toggle="modal" data-target="#remember_now">Show Remember</button>
</div>
<?php// include('Modal_member.php'); ?>


<!-- Remember now -->
<div class="modal fade" id="remember_now" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 align="center" class="modal-title" id="myModalLabel"><i class="fa fa-flag"> Remember Now !</i></h3>
      </div>
      <div class="modal-body">
      <h4 align="center"> <strong> <?php echo $today_remember_title; ?></strong></h4>
      <br/>
      <div align="center">
		    <?php  if($today_remember_members_write_avatar != "") { ?>
					<img class="img-rounded avatar" src="../uploads_member/<?php echo $_SESSION['avatar']; ?>">
				<?php } else { ?>
					<img class="img-rounded avatar" src="../images/no_avatar.png">
				<?php } ?>
			 <?php if(($today_remember_id_second != $today_remember_id_member) AND ($today_remember_id_second != 0)){ ?>
			        <?php  if($today_remember_members_add_avatar != "") { ?>
						<img class="img-rounded avatar" src="../uploads_member/<?php echo $_SESSION['avatar']; ?>">
					<?php } else { ?>
						<img class="img-rounded avatar" src="../images/no_avatar.png">
					<?php } ?>
			<?php } ?>
    </div>
    <br/>
    <br/>
      <p align="right"> <i class="fa fa-calendar" aria-hidden="true"> &nbsp;&nbsp;&nbsp; Date to write : <?php echo $today_remember_date_write; ?> </i></p>
       </p>
      <br/><br/>
     
     <strong><p>&nbsp;&nbsp;<?php echo $today_remember_message; ?></p></strong>
     <br/><br/>
     <p align="center">
    <i class="fa fa-calendar" aria-hidden="true">&nbsp;&nbsp;&nbsp; Date : <?php echo $today_remember_date; ?></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    <i class="fa fa-clock-o" aria-hidden="true">&nbsp;&nbsp;&nbsp; Time : <?php echo $today_remember_time; ?> </i>
    </p>
     <br/>
    <p align="center">
    <i class="fa fa-thumb-tack" aria-hidden="true"> &nbsp;&nbsp;&nbsp; Lever : <?php echo $today_remember_lever; ?> </i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <i class="fa fa-check-square-o" aria-hidden="true" > &nbsp;&nbsp;&nbsp; Action : <?php echo $today_remember_action; ?> </i>
    </p> 
    <br/>
    <?php if(($today_remember_id_second != $today_remember_id_member) AND ($today_remember_id_second != 0)){ ?>
    <i class="fa fa-user-plus" aria-hidden="true"> &nbsp;&nbsp;&nbsp;<strong> Others member : </strong><?php echo $today_remember_members_add; ?> </i>
    <?php } ?>

        </div>
      <div class="modal-footer">
      <p align="center"><strong> Comment :</strong> <?php echo $today_remember_commment; ?></p> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
