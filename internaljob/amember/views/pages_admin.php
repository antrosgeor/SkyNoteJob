<div class = "container"><!-- Start container -->
<h1><strong><i>Pages Manager</i></strong></h1>
<div class="row"><!-- Start row -->
 <div class="col-md-3"><!-- Start col-md-3 -->
	<div class="list-group"><!-- Start col-md-3 -->
		<a class="list-group-item list-group-item-success" href="?page=pages">
			<h4 class="list-group-item-heading"><i class="fa fa-plus"></i> New Page</h4>
		</a>
	
		<?php 
		// edo exoume to SELECT gia na mas efanizi ta iparxonta idi dedomena mas.
			$q = "SELECT * FROM pages ORDER BY title ASC";
			$r = mysqli_query($dbc, $q);

			while($list = mysqli_fetch_assoc($r)) { 
				// edo thelo na m efanisi mono tous xaraxtires apo 0-20.
				$blurb = substr(strip_tags($list['body']), 0, 20);
			?>
		
			<div id="page_<?php echo $list['id']; ?>" class="list-group-item <?php selected($list['id'], $opened['id'], 'active') ?>">
				<h4 class="list-group-item-heading"><?php echo $list['title']; ?>
				<span class="pull-right">
					<a href="#" id="del_<?php echo $list['id']; ?>" class="btn btn-danger btn-delete">
						<i class="fa fa-trash-o"></i>
					</a>
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
	
	<div class="col-md-9"><!-- Start col-md-3 -->
	<?php if(isset($message)){echo $message; } ?><!-- edo tiponete to minima gia to save.-->
		<!-- se periptosi pou exoume epilezi ena apo tin lista mas tote tha efanisi ta apotelesmata stin form. -->
		<?php 
	
		?>
		
	<form action="index.php?page=pages&id=<?php echo $opened['id']; ?>" method="post" role="form" onSubmit="return validate_form_pages();"><!-- Start form -->
		<div class="panel panel-primary">
			<label class="list-group-item list-group-item-info" for="title">Page Title:</label>
			<input class="form-control" type="text" name="title" id="title" value="<?php echo $opened['title']; ?>" placeholder="Page Title">
		</div>

		<div class="form-group">
			<label class="list-group-item list-group-item-info" for="user">Admin User:</label>
			<select class="form-control" name="user" id="user">
				<option value = "0" >No user</option>
					<?php 
						$q = "SELECT id FROM admin_user ORDER BY first ASC";
						$r = mysqli_query($dbc,$q);
						while ($user_list = mysqli_fetch_assoc($r)) { 
							$user_data = data_user($dbc, $user_list['id']);  
					?>
				<option value = "<?php echo $user_data['id'];?>"
					<?php 
						if (isset($_GET['id'])) {
							selected($user_data['id'],$opened['user'],'selected');
						} else {
							selected($user_data['id'],$opened['user'],'selected');
						}
					?>><?php echo $user_data['fullname']; ?>
				</option>
				<?php } ?>
			</select>

		</div>

		<div class = "form-group">
			<label class="list-group-item list-group-item-info"  for="forto">For Type Job:</label>
			<select class="form-control" name="forto" id="forto">
				<option value = "0" >TO ALL</option>
					<?php 
						$q = "SELECT id FROM type_job ORDER BY name_job ASC";
						$r = mysqli_query($dbc,$q);
		
						while ($type_list = mysqli_fetch_assoc($r)) { 

							$type_data = data_type($dbc, $type_list['id']);  
					?>

				<option value = "<?php echo $type_data['id'];?>"
					<?php 
						if (isset($_GET['id'])) {
							selected($type_data['id'],$opened['forto'],'selected');
						} else {
							selected($type_data['id'],$opened['name_job'],'selected');
						}
					?>><?php echo $type_data['fullname']; ?>
				</option>

				<?php } ?>
			</select>
		</div>

		<div class="form-group">
			<label class="list-group-item list-group-item-info" for="slug">Page slug:</label>
			<input class="form-control" type="text" name="slug" id="slug" value="<?php echo $opened['slug']; ?>" placeholder="Page Slug">
		</div>

		<div class="form-group">
			<label class="list-group-item list-group-item-info" for="label">Page Label:</label>
			<input class="form-control" type="text" name="label" id="label" value="<?php echo $opened['label']; ?>" placeholder="Page Label">
		</div>
		
		<div class="form-group">
			<label class="list-group-item list-group-item-info" for="header">Page Header:</label>
			<input class="form-control" type="text" name="header" id="header" value="<?php echo $opened['header']; ?>" placeholder="Page Header">
		</div>

		<div class="form-group">
			<label class="list-group-item list-group-item-info" for="body">Page Body:</label>
			<textarea class="form-control editor" type="text" name="body" id="body" rows="8" placeholder="Page Body"><?php echo $opened['body']; ?></textarea>
		</div>

		<div align="right" class="form-group">
			<?php if(isset($opened['id'])) { ?>
				<button type="submit" class="btn btn-primary">Update</button>
			<?php } else { ?>
				<button type="submit" class="btn btn-success">Save</button>
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