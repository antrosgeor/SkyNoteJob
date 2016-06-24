<?php #notes

?>
<div class="row">
<div class = "container"><!-- Start container -->
  <div class="col-md-3"></div>
  <div class="col-md-3"></div>
  <div class="col-md-3"></div>

  <div class="col-md-3" align="right"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#NotesPlus" ><i class="fa fa-plus"> Add New Note</i></button></div>
</div>
</div>
<br/>

<div class="row"><!-- Start row -->
  <div class = "container"><!-- Start container -->
    <?php
        $myid = $_SESSION['id'];
        $q = "SELECT * FROM notes WHERE id_member = '$myid' ORDER BY title ASC";
        $r = mysqli_query($dbc, $q);

        while($list = mysqli_fetch_assoc($r)) { 
          $blurb = substr(strip_tags($list['body']), 0, 100);
    ?>
<div class="col-sm-6 col-md-4 col-lg-3">
 <div class="panel panel-<?php echo $list['color'] ?>">
  <div class="panel-heading">
    <h3 class="panel-title">
      <strong>
        <center>
          <?php $title = strtoupper($list['title']); echo $title; ?>
        </center>
      </strong>
    </h3>
      <p class="list-group-item-text">
        <strong><i>Title :</i></strong> <?php echo $list['title']; ?><br/><br/>
        <?php echo $list['body']; ?><br/>
        
        <br/><br/>
        <strong><i>This note is : </i></strong> <?php echo $list['lever']; ?><br/>
        <strong><i>Written on : </i></strong> <?php echo date('d-m-Y ', strtotime($list['date'])); ?><br/>
      </p>
        <a href="?page=notes" id="del_<?php echo $list['id']; ?>" class="btn btn-danger btn-delete-note">
          <i class="fa fa-trash-o"></i>
        </a>
  </div>
 </div>
</div>
  
  <?php } ?>

  </div><!-- Stop container -->
</div><!-- Stop row -->


<!-- Start Modal_member -->
<?php include('Modal_member.php'); ?>
<!-- Stop Modal_member -->