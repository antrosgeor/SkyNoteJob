<?php 
	$page = $_GET['id'];
		$q = "SELECT * FROM news WHERE id = '$page'";
		$r = mysqli_query($dbc, $q);
		$sow_news = mysqli_fetch_assoc($r); 

	$A_user = $sow_news['author'];
		$quser = "SELECT * FROM admin_user WHERE id = '$A_user'";
		$ruser = mysqli_query($dbc, $quser);
		$user_news = mysqli_fetch_assoc($ruser); 

	$forto = $sow_news['forto'];
		$qforto = "SELECT * FROM type_job WHERE id = '$forto'";
		$rforto = mysqli_query($dbc, $qforto);
		$forto_news = mysqli_fetch_assoc($rforto); 

?>

<div class = "container"><!-- Start container -->
<h1><strong><i>News</i></strong></h1>
<div class="row"><!-- Start row -->
 <div class="col-md-3"><!-- Start col-md-3 -->
	<div class="list-group"><!-- Start col-md-3 -->
		<?php 
		// edo exoume to SELECT gia na mas efanizi ta iparxonta idi dedomena mas.
			
			$for = $_SESSION['type_job'];
			$q = "SELECT * FROM news WHERE forto = '$for' ORDER BY title ASC";
			$r = mysqli_query($dbc, $q);

			while($list = mysqli_fetch_assoc($r)) { 
				// edo thelo na m efanisi mono tous xaraxtires apo 0-20.
				$blurb = substr(strip_tags($list['body']), 0, 200);
			?>
		<div class="list-group">
			<a class="list-group-item <?php selected($list['id'], $opened['id'], 'active') ?>" href="index.php?page=news&id=<?php echo $list['id']; ?>">
				<h4 class="list-group-item-heading"><i class="fa fa-calendar"></i>
				&nbsp;&nbsp; <?php echo date('dS D F Y ', strtotime($list['date'])); ?></h4>
				<P>&nbsp;<i><?php $title = strtoupper($list['title']);
				 			echo $title; ?>
				 		</i>
				 </P>
			</a>
		</div>
		<?php } ?>
	</div><!--Stop col-md-3-->
</div><!--Stop col-md-3-->
	
	<div class="col-md-9"><!-- Start col-md-3 -->
	
<?php if ($page == '') { ?>

	<div class="jumbotron">
	  <h1>News!</h1><br/>
	  <p align="center">Select News from the left sidebar</p>
	  <br/><br/>  
	<i>	The news on the left bar is based on your specialty and your tasks you have in the company
	</i>
	</div>

<?php } elseif ($page != '') {?> 

	<div class="jumbotron">
        <div class="row"><!-- Start md-9 -->
            <div class="col-md-8"><!-- Start md-8 -->
                From 		
                <?php if ($user_news['avatar'] != "") { ?>
                	<img data-toggle="modal" data-target="#newsModal"  class="img-circle avatar_nav" src="../uploads/<?php echo $user_news['avatar']; ?>">
                <?php } else {?>
                	<img data-toggle="modal" data-target="#newsModal"  class="img-circle avatar_nav" src="../images/no_avatar.png">
                <?php } ?>
                    <strong data-toggle="tooltip" data-placement="top" title="<?php echo $user_news['first'].' '.$user_news['last']; ?>">
                        <?php echo $user_news['first'].' '.$user_news['last']; ?>
                    </strong>
                    <span>(<?php echo $user_news['email']; ?>)</span> 
                <i class="fa fa-hand-o-right"> To </i>  
                <strong>
                <?php echo $forto_news['name_job'];?>

                </strong>
            </div><!-- Stop md-8 -->
            <div class="col-md-1"></div>
            <div class="col-md-3">
            	<p>
            		<strong data-toggle="tooltip" data-placement="top" title="<?php echo $sow_news['date']?>">
            			<i class="fa fa-calendar"> 
            				&nbsp;<?php echo date('dS D F Y ', strtotime($sow_news['date'])); ?>
            			</i>
            		</strong>
            	</p></div>
        </div><!-- Stop md-9 -->
        <br/>

		<h1><?php echo $sow_news['title']; ?></h1>
		<h1><?php echo $sow_news['header']; ?></h1>
		<br/>
		<p><i><?php echo $sow_news['body']; ?></i></p>
		<br/>

	<p>id pages: <?php echo $_GET['id']; ?></p>
		<p>Title : <?php echo $sow_news['title']; ?></p>
		<p>Date :    <?php echo $sow_news['date']; ?></p>
		<p>Author : <?php echo $sow_news['author']; ?></p>
		<p>Body :  <?php echo $sow_news['body']; ?></p>
		<p>Forto : <?php echo $sow_news['forto']; ?></p>
	<br/><br/><br/>
		<p>User :  <?php echo $sow_news['author']; ?></p>
		<p>Last : <?php echo $user_news['last']; ?></p>
		<p>First : <?php echo $user_news['first']; ?></p>
		<p>Email : <?php echo $user_news['email']; ?></p>
		<p>Avatar : <?php echo $user_news['avatar']; ?></p>
	  <br/><br/><br/>
	<p>forto : <?php echo $sow_news['forto']; ?></p>
		<p>Name Job :  <?php echo $forto_news['name_job']; ?></p>
		<p>Team : <?php echo $forto_news['team']; ?></p>
		<p>lever : <?php echo $forto_news['lever']; ?></p>
	
<?php }  ?>


	<br><br><br>
	</div><!-- Stop col-md-9-->
</div><!-- Stop row-->
</div><!-- Stop container -->

<?php include('Modal_member.php'); ?>