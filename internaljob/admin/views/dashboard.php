<div class = "container"><!-- Start container -->

<h1><?php echo $_SESSION['Dashboard_Name']; ?></h1>
<br>
<div class="row"><!-- Start row -->
	<div class="col-md-1"></div>
	
	<div class="col-md-10" align="center"><!-- Start col-md-5 -->
	<a data-toggle="modal" data-target="#myModal" >
		<img class="img-rounded avatar" src="../uploads/<?php echo $_SESSION['avatar']; ?>">
		<h3><?php $AdminName = $_SESSION['last'].' '.$_SESSION['first']; 
				  $upper = strtoupper($AdminName);
				  echo "$upper";
				  ?>
		</h3>
	</a>

<!-- Start modal from Admin -->
<?php include('Modal_Admin.php'); ?>
<!-- Start modal from Admin -->

	</div><!-- Stop col-md-5 -->

	<div class="col-md-1"></div>
</div><!-- Stop row -->

<?php #Messages
  // gia na mporesi na to diavasi.
  $userid = $_SESSION['id'];
?>

  <?php
    $sql = "SELECT * FROM messages WHERE marked = 'UNREAD' AND (admin_to = '$userid' OR admin_to = 0)";
    $result=mysqli_query($dbc, $sql);
    $row = mysqli_num_rows($result);
  ?>
<?php if ($row >= 1) { ?>
	  <br>
	<div class="row"><!-- Start div row -->
		
		<div class="col-md-1"></div>

	<div class="col-md-10"><!-- Start div md-10 -->
	
	<a class="list-group-item list-group-item-success"  href="?page=message/messages">  
	  <?php
	    $sql = "SELECT * FROM messages WHERE marked = 'UNREAD' AND (admin_to = '$userid' OR admin_to = 0)";
	    $result=mysqli_query($dbc, $sql);
	    $row = mysqli_num_rows($result);
	  ?>
	  <strong>
	  	<i>
	  		<?php echo $_SESSION['Value_Unread_Messages']; ?>
	  	</i>
	  </strong><span class="badge"> <?php echo "$row" ?> </span>
	</a>

<table class="table table-inbox table-hover">
  <tbody>
  <?php 
    $q = "SELECT * FROM messages WHERE marked = 'unread' AND (admin_to = '$userid' OR admin_to = 0)";
    $r = mysqli_query($dbc,$q);
    while($list = mysqli_fetch_assoc($r)) { 
  ?> 
  <tr id ="row_<?php echo $list['id']; ?>" style="cursor: pointer" class="<?php echo $list['marked']; ?>">
      <td>
          <input type="checkbox" class="mail-checkbox" value="<?php echo $list['id']; ?>">
      </td>
      <td class='clickable-row' data-href='?page=view_message&id=<?php echo $list['id']; ?>'>
        <?php echo $list['title'] ?>
      </td>
      <td class='clickable-row' data-href='?page=view_message&id=<?php echo $list['id']; ?>'><?php echo substr($list['message'], 0,100); ?>...</td>
      <td class="clickable-row text-right" style="font-weight: normal;" data-href='?page=view_message&id=<?php echo $list['id']; ?>'><?php echo $list['date']; ?></td>
  </tr>
  <?php } ?>
      
   </tbody>
</table>

	<br><br><br>
	</div><!-- Stop div md-10 -->

	<div class="col-md-1"></div>

	</div><!-- Stop div row -->
<?php } ?>


<div class="row"><!-- Start row -->
	
	<div class="col-md-1"><!-- Start col-md-1 -->
	</div>

 <div class="col-md-4"><!-- Start col-md-3 -->
 <h1><?php echo $_SESSION['Value_Pages_Wrote']; ?></h1>
	<div class="list-group"><!-- Start col-md-3 -->
		<a class="list-group-item list-group-item-success" href="?page=pages">
			<h4 class="list-group-item-heading">
				<i class="fa fa-plus">
					<?php echo $_SESSION['Value_Write_New_Page']; ?>
				</i> 
			</h4>
		</a>
	
		<?php 
		// edo exoume to SELECT gia na mas efanizi ta iparxonta idi dedomena mas.
			$q = "SELECT * FROM pages WHERE user = '$userid' ORDER BY title ASC";
			$r = mysqli_query($dbc, $q);

			while($list = mysqli_fetch_assoc($r)) { 
				// edo thelo na m efanisi mono tous xaraxtires apo 0-20.
				$blurb = substr(strip_tags($list['body']), 0, 20);
			?>
		
			<div id="page_<?php echo $list['id']; ?>" class="list-group-item <?php selected($list['id'], $opened['id'], 'active') ?>">
				<h4 class="list-group-item-heading"><?php echo $list['title']; ?>
				<span class="pull-right">
					<!-- show button -->
					<a href="index.php?page=pages&id=<?php echo $list['id']; ?>" class="btn btn-default">
						<i class="fa fa-chevron-right"></i>
					</a>
				</span>
				</h4>
				<p class="list-group-item-text"><?php echo $blurb; ?></p>
			</div>
			
		<?php } ?>
	</div><!--Stop col-md-3-->
</div><!--Stop col-md-3-->

	<div class="col-md-1"></div>

<div class="col-md-5"><!-- Start col-md-5 -->
<h1><?php echo $_SESSION['Value_News_Wrote']; ?></h1>
	<div class="list-group"><!-- Start list-group -->
		<a class="list-group-item list-group-item-success" href="?page=news">
			<h4 class="list-group-item-heading">
				<i class="fa fa-plus">
					<?php echo $_SESSION['Value_Write_New_Post']; ?>
				</i>
			</h4>
		</a>

		<?php 
			$q = "SELECT * FROM news WHERE author = '$userid' ORDER BY date  DESC ";
			$r = mysqli_query($dbc,$q);
			while($list = mysqli_fetch_assoc($r)){ 
			//$blurb = substr($list['body'], 0,20);
		?>
	
		<div id="news_<?php echo $list['id']; ?>" style=" overflow: auto;" class="list-group-item <?php selected($list['id'],$opened['id'],'active') ?>">
			<h4 class="list-group-item-heading"><?php echo $list['title']; ?>
			<span class= "pull-right">
			<!-- show button -->
				<a href="index.php?page=news&id=<?php echo $list['id']; ?>" class="btn btn-default">
					<i class="fa fa-chevron-right"> </i>
				</a>
			</span>
			</h4>
			<!--<p class="list-group-item-text"><?php //echo $blurb; ?></p> -->
			<p class="blog-post-meta"><?php echo $list['date']; ?> <strong>BY</strong>
			<a href="#"><?php $data = data_user($dbc, $list['author']); echo $data['fullname_reverse']; ?>
			</a> | <strong>FOR</strong> <a href="#"><?php echo $list['forto']; ?></a>
			</p>
			<p><?php echo substr($list['body'], 0,100); ?></p>
		</div><!-- Stop of list-group-item -->
		<?php } ?>
	</div><!-- end of list-group -->
</div><!-- end of col-md-3 -->

	<div class="col-md-1"></div>
</div><!--Stop row -->
</div><!-- Stop -->