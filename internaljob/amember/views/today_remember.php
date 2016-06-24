<?php ##today_remember.php ?>

<?php include('php/RowRemember.php'); ?>				
<div class="row">

</div>


<div class="row"><!-- Start row -->
  <div class = "container"><!-- Start container -->
  <?php if ($Row != 0) { ?>
  <div class="col-md-9"></div>
  <div class="col-md-3" align="right"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#rememberPlus" ><i class="fa fa-plus"> Add New Remember</i></button></div>
	<br/>
  <h1>
	 <span class="label label-primary">
	  <span class="badge"><h5>
	   <?php echo $Row; ?>
		</h5>
	   </span> Today Remembers
	 </span>
	</h1>
	<br/>

    <?php
        $r = mysqli_query($dbc, $q);
        while($today_remember_list = mysqli_fetch_assoc($r)) { 
          $blurb = substr(strip_tags($today_remember_list['body']), 0, 100);
           	$title = strtoupper($today_remember_list['title']);
    ?>

<div class="col-sm-6 col-md-4 col-lg-3">
 <div class="panel panel-<?php echo $today_remember_list['color'] ?>">
  <div class="panel-heading">
    <h3 class="panel-title">
      <strong>
          <h3 align="center" title="Title"><?php echo $title; ?></h3>
      </strong>
    </h3>
      <p class="list-group-item-text">
      <div align="right">
      <strong>
      	<i title="Day has been written"><em>
      		<?php echo date('d-m-Y ', strtotime($today_remember_list['date_write'])); ?>
      	</em></i>
      </strong>
      </div>
        <br/><br/>
        <?php echo $today_remember_list['message']; ?><br/>
        
        <br/><br/>
        <strong><i>This Remember is : </i></strong> <?php echo $today_remember_list['lever']; ?><br/>
    <?php if ($today_remember_list['action'] != "") { ?>
        <strong><i title="Action for this Remember">Action : </i></strong><?php echo $today_remember_list['action']; ?><br/>
    <?php } if ($today_remember_list['date'] != "0000-00-00") { ?>
        <strong><i title="Date you have entered" class="fa fa-calendar"> <?php echo $today_remember_list['date']; ?></i></strong>
    <?php } if ($today_remember_list['time'] != "00:00:00") {  ?>
        <strong><i title="Time you have entered" class="fa fa-clock-o"> <?php echo $today_remember_list['time']; ?></i></strong><br/>
    <?php } if (($today_remember_list['id_second'] != "0") AND ($today_remember_list['id_second'] != $today_remember_list['id_member'])) {  ?>
        <i class="fa fa-user-plus" title="Partners who see this informing"> <?php echo $today_remember_list['members_add']; ?></i><br/>
    <?php } ?>
      </p>
        <a href="?page=remember" title="Delete this Remember" id="del_<?php echo $today_remember_list['id']; ?>" class="btn btn-danger btn-delete-remember">
          <i class="fa fa-trash-o"></i>
        </a>&nbsp;&nbsp;
         <?php if (($today_remember_list['id_second'] != "0") AND ($today_remember_list['id_second'] != $today_remember_list['id_member'])) { ?>
         <a href="?page=remember" 
         	title="Send to <?php echo $today_remember_list['members_add'];; ?> Mail" 
         	id="send_<?php echo $today_remember_list['id']; ?>" 
         	class="btn btn-info btn-remember">
          <i class="fa fa-paper-plane-o"></i>
        <!-- an den exei alo atomo na to stenli sto diko tou mail. -->
        </a>&nbsp;&nbsp;
        <?php } ?>
         <a href="?page=remember" 
         	title="Send to my Mail" 
         	id="Send_<?php echo $today_remember_list['id']; ?>" 
         	class="btn btn-default btn-Myremember">
          <i class="fa fa-paper-plane"></i>
        </a>
  </div>
 </div>
</div>
  
  <?php } ?>

  </div><!-- Stop container -->
</div><!-- Stop row -->

<?php }elseif($Row == 0){ ?>

<div class="jumbotron">
  <br/>
  <h1 align="center" ><i class="fa fa-flag" aria-hidden="true"> Remember for Today! </i></h1>
  <br/>
  <p align="center" class="bg-danger"><br/> <i>You don't have Remember for Today </i><br/><br/></p>
  <br/>
  <br/>
  <div class="col-md-4"></div>
  <div class="col-md-3" align="right"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#rememberPlus" ><i class="fa fa-plus"> Add New Remember</i></button></div>
<div class="col-md-4"></div>
  <br/>

</div>

   <?php } ?>

<!-- Start Modal_member -->
<?php include('Modal_member.php'); ?>
<!-- Stop Modal_member -->

