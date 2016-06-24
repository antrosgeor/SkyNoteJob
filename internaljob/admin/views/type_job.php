<div class = "container"><!-- Start container -->
<h1><?php echo $_SESSION['Value_Type_Job_Manager']; ?></h1>
<div class="row"><!-- Start row -->
 <div class="col-md-3"><!-- Start col-md-3 -->
	<div class="list-group"><!-- Start col-md-3 -->
		
		<a class="list-group-item list-group-item-success" href="?page=type_job">
			<h4 class="list-group-item-heading"><i class="fa fa-plus"></i> <?php echo $_SESSION['Value_New_Type_Job']; ?></h4>
		</a>
	
		<?php 
		// edo exoume to SELECT gia na mas efanizi ta iparxonta idi dedomena mas.
			$q = "SELECT * FROM type_job ORDER BY id ASC";
			$r = mysqli_query($dbc, $q);

			while($list = mysqli_fetch_assoc($r)) { 
				// edo thelo na m efanisi mono tous xaraxtires apo 0-20.
				$blurb = substr(strip_tags($list['team']), 0, 20);
			?>

			<div id="type_job_<?php echo $list['id']; ?>" class="list-group-item <?php selected($list['id'], $opened['id'], 'active') ?>">
				<h4 class="list-group-item-heading"><?php echo $list['name_job']; ?>
				<span class="pull-right">
					<a href="#" id="del_<?php echo $list['id']; ?>" class="btn btn-danger btn-delete-type-job">
						<i class="fa fa-trash-o"></i>
					</a>
					<a href="index.php?page=type_job&id=<?php echo $list['id']; ?>" class="btn btn-default">
						<i class="fa fa-chevron-right"></i>
					</a>
				</span>
				</h4>
				<p class="list-group-item-text"><?php echo $blurb; ?></p>
			</div>
			
		<?php } ?>
	</div><!--Stop col-md-3-->
</div><!--Stop col-md-3-->
	
	<div class="col-md-8"><!-- Start col-md-3 -->
	<?php if(isset($message)){echo $message; } ?><!-- edo tiponete to minima gia to save.-->
		<!-- se periptosi pou exoume epilezi ena apo tin lista mas tote tha efanisi ta apotelesmata stin form. -->
		
	<form action="index.php?page=type_job&id=<?php echo $opened['id']; ?>" method="post" role="form" onSubmit="return validate_form_type_job();"><!-- Start form -->
		<div class="form-group">
			<label class="list-group-item list-group-item-info" for="name_job">
				<?php echo $_SESSION['Value_Job_Name'] ; ?> : </label>
			<input class="form-control" type="text" name="name_job" id="name_job" value="<?php echo $opened['name_job']; ?>" placeholder="Job Name">
		</div>

		<div class="form-group">
			<label class="list-group-item list-group-item-info" for="team">
				<?php echo $_SESSION['Value_Team_Job']; ?> : </label>
			<input class="form-control" type="text" name="team" id="team" value="<?php echo $opened['team']; ?>" placeholder="Team Job">
		</div>

		<div class="form-group">
			<label class="list-group-item list-group-item-info" for="lever">
				<?php echo $_SESSION['Value_lever_Job']; ?> : </label>
			<input class="form-control" type="text" name="lever" id="lever" value="<?php echo $opened['lever']; ?>" placeholder="job Lever">
		</div>
		
		<div align="right" class="form-group">
			<?php if(isset($opened['id'])) { ?>
				<button type="submit" class="btn btn-primary">
					<?php echo $_SESSION['Value_Update']; ?>
				</button>
			<?php } else { ?>
				<button type="submit" class="btn btn-success">
					<?php echo $_SESSION['Value_Save']; ?>
				</button>
			<?php } ?>
			<input type="hidden" name="submitted" value="1">
			<?php if(isset($opened['id'])) { ?>
				<input type="hidden" name="id" value="<?php echo $opened['id']; ?>">
			<?php } ?>
		</div>
	</form><!-- Stop form-->

	<br><br><br>
	
	</div><!-- Stop col-md-9-->
</div><!-- Stop row-->
</div><!-- Stop container -->