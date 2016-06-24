<?php #Remember
	$myid = $_SESSION['id'];
	//My Remembers
    $sql = "SELECT * FROM remember WHERE id_member = '$myid'";
    $result=mysqli_query($dbc, $sql);
    $rowMyRemember = mysqli_num_rows($result);

	//Others Remembers to have second user my id
    $sql = "SELECT * FROM remember WHERE id_second = '$myid' AND id_second != id_member";
    $result=mysqli_query($dbc, $sql);
    $rowOthersRemember = mysqli_num_rows($result);
?>
<div class="row">
<div class = "container"><!-- Start container -->
  <div class="col-md-3"></div>
  <div class="col-md-3"></div>
  <div class="col-md-3"></div>

  <div class="col-md-3" align="right"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#rememberPlus" ><i class="fa fa-plus"> Add New Remember</i></button></div>
</div>
</div>
<br/>

<div class="row"><!-- Start row -->
  <div class = "container"><!-- Start container -->
  <?php if ($rowMyRemember != 0) { ?>
	<h1>
		<span class="label label-primary">
			<span class="badge"><h5>
				<?php echo $rowMyRemember; ?>
			</h5></span>
			My Remembers
		</span>
	</h1>
	<br/>

    <?php
        $q = "SELECT * FROM remember WHERE id_member = '$myid' ORDER BY time ASC";
        $r = mysqli_query($dbc, $q);

        while($my_list = mysqli_fetch_assoc($r)) { 
          $blurb = substr(strip_tags($my_list['body']), 0, 100);
           	$second_user = $my_list['id_second'];
	        if ($second_user != "0" AND $second_user != $myid) {
	        	$se = "SELECT * FROM member WHERE id = '$second_user'";
	        	$ser = mysqli_query($dbc, $se);
	        	$second = mysqli_fetch_assoc($ser); 
	        }
    ?>

<div class="col-sm-6 col-md-4 col-lg-3">
 <div class="panel panel-<?php echo $my_list['color'] ?>">
  <div class="panel-heading">
    <h3 class="panel-title">
      <strong>
          <h3 align="center" title="Title"><?php $title = strtoupper($my_list['title']); echo $title; ?></h3>
      </strong>
    </h3>
      <p class="list-group-item-text">
      <div align="right">
      <strong>
      	<i title="Day has been written"><em>
      		<?php echo date('d-m-Y ', strtotime($my_list['date_write'])); ?>
      	</em></i>
      </strong>
      </div>
        <br/><br/>
        <?php echo $my_list['message']; ?><br/>
        
        <br/><br/>
        <strong><i>This Remember is : </i></strong> <?php echo $my_list['lever']; ?><br/>
    <?php if ($my_list['action'] != "") { ?>
        <strong><i title="Action for this Remember">Action : </i></strong><?php echo $my_list['action']; ?><br/>
    <?php } if ($my_list['date'] != "0000-00-00") { ?>
        <strong><i title="Date you have entered" class="fa fa-calendar"> <?php echo $my_list['date']; ?></i></strong>
    <?php } if ($my_list['time'] != "00:00:00") {  ?>
        <strong><i title="Time you have entered" class="fa fa-clock-o"> <?php echo $my_list['time']; ?></i></strong><br/>
    <?php } if (($my_list['id_second'] != "0") AND ($my_list['id_second'] != $my_list['id_member'])) {  ?>
        <i class="fa fa-user-plus" title="Partners who see this informing"> <?php echo $second['first'].' '.$second['last']; ?></i><br/>
    <?php } ?>
      </p>
        <a href="?page=remember" title="Delete this Remember" id="del_<?php echo $my_list['id']; ?>" class="btn btn-danger btn-delete-remember">
          <i class="fa fa-trash-o"></i>
        </a>&nbsp;&nbsp;
        <!-- afto tha to kano kai gia sms..... -->
        <!-- edo tha to stelni sto mail tou alou... tha kani elexo gia 
        	$my_list['id_second'] != "0"  -->
         <?php if (($my_list['id_second'] != "0") AND ($my_list['id_second'] != $my_list['id_member'])) { ?>
         <a href="?page=remember" 
         	title="Send to <?php echo $second['first'].' '.$second['last']; ?> Mail" 
         	id="send_<?php echo $my_list['id']; ?>" 
         	class="btn btn-info btn-remember">
          <i class="fa fa-paper-plane-o"></i>
        <!-- an den exei alo atomo na to stenli sto diko tou mail. -->
        </a>&nbsp;&nbsp;
        <?php } ?>
         <a href="?page=remember" 
         	title="Send to my Mail" 
         	id="Send_<?php echo $my_list['id']; ?>" 
         	class="btn btn-default btn-Myremember">
          <i class="fa fa-paper-plane"></i>
        </a>
  </div>
 </div>
</div>
  
  <?php } ?>

  </div><!-- Stop container -->
</div><!-- Stop row -->

<?php } ?>


<div class="row"><!-- Start row -->
  <div class = "container"><!-- Start container -->
 <!-- Others Remember. -->
 <?php if ($rowOthersRemember != 0) { ?>
 	<h1>
		<span class="label label-primary">
			<span class="badge"><h5>
				<?php echo $rowOthersRemember; ?>
			</h5></span>
			Others Remembers 
		</span>
	</h1>
	<br/>
    <?php
        $q = "SELECT * FROM remember WHERE id_second = '$myid' AND id_second != id_member ORDER BY title ASC";
        $r = mysqli_query($dbc, $q);

        while($my_list = mysqli_fetch_assoc($r)) { 
          $blurb = substr(strip_tags($my_list['body']), 0, 100);
           	$write_user = $my_list['id_member'];
	        if (($write_user != "0") AND ($my_list['id_second'] != $my_list['id_member'])) {
	        	$se = "SELECT * FROM member WHERE id = '$write_user'";
	        	$ser = mysqli_query($dbc, $se);
	        	$second = mysqli_fetch_assoc($ser); 
	        }
    ?>
<div class="col-sm-6 col-md-4 col-lg-3">
 <div class="panel panel-<?php echo $my_list['color'] ?>">
  <div class="panel-heading">
    <h3 class="panel-title">

	<?php 
	if (($my_list['id_second'] != "0") AND ($my_list['id_second'] != $my_list['id_member'])) { 
	 ?> From
        <i class="fa fa-user" title="Partners who ADD you in this informing"> <?php echo $second['first'].' '.$second['last']; ?></i><br/>
    <?php } ?>

      <strong>
          <h3 align="center" title="Title"><?php $title = strtoupper($my_list['title']); echo $title; ?></h3>
      </strong>
    </h3>
      <p class="list-group-item-text">
      <div align="right">
      <strong>
      	<i title="Day has been written"><em>
      		<?php echo date('d-m-Y ', strtotime($my_list['date_write'])); ?>
      	</em></i>
      </strong>
      </div>
        <br/><br/>
        <?php echo $my_list['message']; ?><br/>
        
        <br/><br/>
        <strong><i>This Remember is : </i></strong> <?php echo $my_list['lever']; ?><br/>
    <?php if ($my_list['action'] != "") { ?>
        <strong><i title="Action for this Remember">Action : </i></strong><?php echo $my_list['action']; ?><br/>
    <?php } if ($my_list['date'] != "0000-00-00") { ?>
        <strong><i title="Date you have entered" class="fa fa-calendar"> <?php echo $my_list['date']; ?></i></strong>
    <?php } if ($my_list['time'] != "00:00:00") {  ?>
        <strong><i title="Time you have entered" class="fa fa-clock-o"> <?php echo $my_list['time']; ?></i></strong><br/>
    <?php } ?>
      </p>
        <a href="?page=remember" title="Remove this Remember" id="del_<?php echo $my_list['id']; ?>" class="btn btn-danger btn-delete-otherremember">
          <i class="fa fa-times"></i>
        </a>
  </div>
 </div>
</div>


<?php } ?>
</div>
</div>
<?php } ?>

<!-- Start Modal_member -->
<?php include('Modal_member.php'); ?>
<!-- Stop Modal_member -->

