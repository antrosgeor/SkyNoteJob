<div class = "container"><!-- Start container -->
<h1><strong><i>Pages </i></strong></h1>
<div class="row"><!-- Start row -->
 <div class="col-md-3"><!-- Start col-md-3 -->
	<div class="list-group"><!-- Start col-md-3 -->
		<?php 
		// edo exoume to SELECT gia na mas efanizi ta iparxonta idi dedomena mas.
			$q = "SELECT * FROM pages ORDER BY title ASC";
			$r = mysqli_query($dbc, $q);

			while($list = mysqli_fetch_assoc($r)) { 
				// edo thelo na m efanisi mono tous xaraxtires apo 0-20.
				$blurb = substr(strip_tags($list['body']), 0, 20);
			?>
			<div id="type_job_<?php echo $list['id']; ?>" class="list-group-item <?php selected($list['id'], $_GET['id'], 'active') ?>">
				<h4 class="list-group-item-heading"><?php echo $list['title']; ?>
				<span class="pull-right">
					<a href="index.php?page=pages_member&id=<?php echo $list['id']; ?>" class="btn btn-default">
						<i class="fa fa-chevron-right"></i>
					</a>
				</span>
				</h4>
				<p class="list-group-item-text"><?php echo $blurb; ?></p>
			</div>


		<?php } ?>
	</div><!--Stop col-md-3-->
</div><!--Stop col-md-3-->
	
	<div class="col-md-9"><!-- Start col-md-3 -->
	<?php 
	$page = $_GET['id'];
		$q = "SELECT * FROM pages WHERE id = '$page'";
		$r = mysqli_query($dbc, $q);
		$sow_pages = mysqli_fetch_assoc($r); 
	
	$A_user = $sow_pages['user'];
		$quser = "SELECT * FROM admin_user WHERE id = '$A_user'";
		$ruser = mysqli_query($dbc, $quser);
		$user_pages = mysqli_fetch_assoc($ruser); 

	$forto = $sow_pages['forto'];
		$qforto = "SELECT * FROM type_job WHERE id = '$forto'";
		$rforto = mysqli_query($dbc, $qforto);
		$forto_pages = mysqli_fetch_assoc($rforto); 

	?>
	<?php if ($page == '') { ?>
<p>Select pages </p>
	<?php } elseif ($page != '') {?> 

	<p>id pages: <?php echo $_GET['id']; ?></p>
		<p>Title : <?php echo $sow_pages['title']; ?></p>
		<p>Id :    <?php echo $sow_pages['id']; ?></p>
		<p>Header : <?php echo $sow_pages['header']; ?></p>
		<p>Body :  <?php echo $sow_pages['body']; ?></p>
		<p>Label : <?php echo $sow_pages['label']; ?></p>
		<p>Slug :  <?php echo $sow_pages['slug']; ?></p>
		<p>Type :  <?php echo $sow_pages['type']; ?></p>
	  <br/><br/><br/>
		<p>User :  <?php echo $sow_pages['user']; ?></p>
		<p>Last : <?php echo $user_pages['last']; ?></p>
		<p>First : <?php echo $user_pages['first']; ?></p>
		<p>Email : <?php echo $user_pages['email']; ?></p>
		<p>Avatar : <?php echo $user_pages['avatar']; ?></p>
	  <br/><br/><br/>
	<p>forto : <?php echo $sow_pages['forto']; ?></p>
		<p>name_job :  <?php echo $forto_pages['name_job']; ?></p>
		<p>team : <?php echo $forto_pages['team']; ?></p>
		<p>lever : <?php echo $forto_pages['lever']; ?></p>
	
<?php }  ?>


	<br><br><br>
	</div><!-- Stop col-md-9-->
</div><!-- Stop row-->
</div><!-- Stop container -->