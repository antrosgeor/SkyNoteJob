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

<div class = "container"><!-- Start container -->
<h1><strong><i>Pages</i></strong></h1>
<div class="row"><!-- Start row -->
 <div class="col-md-3"><!-- Start col-md-3 -->
	<div class="list-group"><!-- Start col-md-3 -->
		<?php 
		// edo exoume to SELECT gia na mas efanizi ta iparxonta idi dedomena mas.
			
			$for = $_SESSION['type_job'];
			$q = "SELECT * FROM pages WHERE forto = '$for' ORDER BY title ASC";
			$r = mysqli_query($dbc, $q);

			while($list = mysqli_fetch_assoc($r)) { 
				// edo thelo na m efanisi mono tous xaraxtires apo 0-20.
				$blurb = substr(strip_tags($list['body']), 0, 100);
			?>
		<div class="list-group">
			<a class="list-group-item <?php selected($list['id'], $opened['id'], 'active') ?>" href="index.php?page=pages&id=<?php echo $list['id']; ?>">
				<h4 class="list-group-item-heading"><?php $title = strtoupper($list['title']); echo $title; ?></h4>
				<center><p class="list-group-item-text"> &nbsp; <?php echo $blurb; ?></p>
			</a>
		</div>
		<?php } ?>
	</div><!--Stop col-md-3-->
</div><!--Stop col-md-3-->
	
	<div class="col-md-9"><!-- Start col-md-3 -->
	
<?php if ($page == '') { ?>

	<div class="jumbotron">
	  <h1>Page!</h1><br/>
	  <p align="center">Select page from the left sidebar</p>
	  <br/><br/>  
	<i>	The pages on the left bar is based on your specialty and your tasks you have in the company
	</i>
	</div>

<?php } elseif ($page != '') {?> 

	<div class="jumbotron">
        <div class="row"><!-- Start md-9 -->
            <div class="col-md-8"><!-- Start md-8 -->
                From
				<?php if ($user_pages['avatar'] != "") { ?>
                	<img data-toggle="modal" data-target="#pagesModal"  class="img-circle avatar_nav" src="../uploads/<?php echo $user_pages['avatar']; ?>">
                <?php } else {?>
                <img data-toggle="modal" data-target="#pagesModal"  class="img-circle avatar_nav" src="../images/no_avatar.png">
                <?php } ?>

                    <strong data-toggle="tooltip" data-placement="top" title="<?php echo $user_pages['first'].' '.$user_pages['last']; ?>">
                        <?php echo $user_pages['first'].' '.$user_pages['last']; ?>
                    </strong>
                    <span>(<?php echo $user_pages['email']; ?>)</span> 
                <i class="fa fa-hand-o-right"> To </i>  
                <strong>
                <?php echo $forto_pages['name_job'];?>


                </strong>
            </div><!-- Stop md-8 -->
        </div><!-- Stop md-9 -->
        <br/>

		<h1><?php echo $sow_pages['title']; ?></h1>
		<h1><?php echo $sow_pages['header']; ?></h1>
		<br/>
		<p><i><?php echo $sow_pages['body']; ?></i></p>

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



<?php include('Modal_member.php'); ?>