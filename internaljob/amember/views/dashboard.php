<?php
 	$userid = $_SESSION['id'];
	$sql = "SELECT * FROM messages WHERE marked = 'UNREAD' AND (user_to = '$userid' OR user_to = 0)";
    $result=mysqli_query($dbc, $sql);
    $rowUnread = mysqli_num_rows($result);
?>

<div class = "container"><!-- Start container -->

<h1>Dashboard</h1>
<br>
<div class="row"><!-- Start row -->
	<div class="col-md-1"></div>
	
	<div class="col-md-10" align="center"><!-- Start col-md-5 -->
	<a data-toggle="modal" data-target="#myModal" >
		<?php  if($_SESSION['avatar'] != "") {?>
		<img class="img-rounded avatar" src="../uploads_member/<?php echo $_SESSION['avatar']; ?>">
		<?php } else { ?>
		<img class="img-rounded avatar" src="../images/no_avatar.png">
		<?php } ?>
		<h3><?php 
			$AdminName = $_SESSION['last'].' '.$_SESSION['first']; 
			$upper = strtoupper($AdminName);
			echo "$upper";
			?>
		</h3>
	</a>

	</div><!-- Stop col-md-5 -->
	<div class="col-md-1"></div>

</div><!-- Stop row -->

<br/>
<?php include('Rows.php'); ?>
<br/><br/><br/>

<div id="show_time" align="center" > </div>

<script type="text/javascript" src="jquery-2.2.3.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			setInterval(function() {
				$('#show_time').load('ajax/run.php')
			}, 1000);
		});
	</script>

<?php include('dasRemember.php'); ?>

<br/>

<?php if($rowUnread != 0){ ?>
	<?php include('views/message/messages_unread.php'); ?>
<?php } ?>


<!-- Start Modal_member -->
<?php include('Modal_member.php'); ?>
<!-- Stop Modal_member -->


</div><!-- Stop -->