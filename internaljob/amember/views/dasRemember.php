<?php 
	$ids = $_SESSION['id'];
	$nowdate = date("Y-m-d");
	$nowtime = date("H:i:s");
	$q="SELECT * FROM remember WHERE (id_member = $ids OR id_second = $ids) AND date = '$nowdate' AND time > '$nowtime' ORDER BY time ASC";
	$r=mysqli_query($dbc, $q);
	$rowRe = mysqli_num_rows($r);
	if ($rowRe != 0) { ?>
		<h1>You have <?php echo $rowRe; ?> Remember for today</h1>
	<?php
		while($testRe = mysqli_fetch_assoc($r)) { ?>
<div class="col-sm-6 col-md-4 col-lg-3">
 <div class="panel panel-<?php echo $testRe['color'] ?>">
  <div class="panel-heading">
    <h3 class="panel-title">
      <strong>
          <h3 align="center" title="Title"><a href="?page=remember"> <?php $title = strtoupper($testRe['title']); echo $title; ?> </a></h3>
      </strong>
    </h3>
      <p class="list-group-item-text">
        <br/>
    <?php  if ($testRe['date'] != "0000-00-00") { ?>
        <strong><i title="Date you have entered" class="fa fa-calendar"> <?php echo $testRe['date']; ?></i> &nbsp;&nbsp;</strong>
    <?php } if ($testRe['time'] != "00:00:00") {  ?>
        <strong><i title="Time you have entered" class="fa fa-clock-o"> <?php echo $testRe['time']; ?></i></strong><br/>
    <?php } ?>
      </p>
  </div>
 </div>
</div>
		 <?php   
		}
	} 
?>