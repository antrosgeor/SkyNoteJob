<div class = "container"><!-- Start container -->
<h1><i><?php echo $_SESSION['Value_News_Manager']; ?></i></h1>  
<div class="row"><!-- Start row -->
<div class="col-md-5"><!-- Start col-md-5 -->
	<div class="list-group"><!-- Start list-group -->
		<a class="list-group-item list-group-item-success" href="?page=news">
			<h4 class="list-group-item-heading"><i class="fa fa-plus"><?php echo $_SESSION['Value_New_Post']; ?></i></h4>
		</a>
		<?php 
			$q = "SELECT * FROM news ORDER BY date DESC";
			$r = mysqli_query($dbc,$q);
			while($list = mysqli_fetch_assoc($r)){ 
			//$blurb = substr($list['body'], 0,20);
		?>
		<div id="news_<?php echo $list['id']; ?>" style=" overflow: auto;" class="list-group-item <?php selected($list['id'],$opened['id'],'active') ?>">
			<h4 class="list-group-item-heading"><?php echo $list['title']; ?>
			<span class= "pull-right">
			<!-- delete button -->
				<a href="#" id="del_<?php echo $list['id']; ?>" class="btn btn-danger btn-delete-news">
					<i class="fa fa-trash-o"></i>
				</a>
			<!-- show button -->
				<a href="index.php?page=news&id=<?php echo $list['id']; ?>" class="btn btn-default">
					<i class="fa fa-chevron-right"></i>
				</a>
			</span>
			</h4>
			<!--<p class="list-group-item-text"><?php //echo $blurb; ?></p> -->
			<p class="blog-post-meta"><?php echo date('d-m-Y', strtotime($list['date'])); ?> <strong>BY</strong>
			<a href="#"><?php $data = data_user($dbc, $list['author']); echo $data['fullname_reverse']; ?>
			</a> | <strong>FOR</strong> <a href="#">
				<?php 
					$name_type = data_type($dbc, $list['forto']); 
					echo $name_type['name_job']; 
				?>
			</a>
			</p>
			<p><?php echo substr($list['body'], 0,50); ?></p>
		</div><!-- Stop of list-group-item -->

		<?php } ?>

	</div><!-- end of list-group -->
</div><!-- end of col-md-3 -->

<div class="col-md-7"> 
<?php if (isset($message)) {echo $message;} ?>

	<form action="index.php?page=news&id=<?php echo $opened['id']; ?>" method="post" role = "form" onSubmit="return validate_form_news();">

		<div class="form-group">
			<label class="list-group-item list-group-item-info" for="title">
				<?php echo $_SESSION['Value_Title']; ?> : </label>
			<input class="form-control" type="text" name="title" id="title" placeholder="title" value="<?php echo $opened['title']; ?>">
		</div>

		<div class = "form-group">
			<label class="list-group-item list-group-item-info" for="date">
				<?php echo $_SESSION['Value_Date']; ?> : </label>
			<input class="form-control" type="text" name="date" id="date" placeholder="Date"  value="<?php 
				if (isset($opened['date'])) { echo $opened['date']; } 
				else { echo get_date(); }
			?>" autocomplete="off" disabled>
		</div>

		<div class = "form-group">
			<label class="list-group-item list-group-item-info"  for="author">
				<?php echo $_SESSION['Value_Author']; ?> : </label>
			<select class="form-control" name="user" id="user">
				<option value = "0" ><?php echo $_SESSION['Value_No_user']; ?></option>
					<?php 
						$q = "SELECT id FROM admin_user ORDER BY first ASC";
						$r = mysqli_query($dbc,$q);
		
						while ($user_list = mysqli_fetch_assoc($r)) { 

							$user_data = data_user($dbc,$user_list['id']);  
					?>

				<option value = "<?php echo $user_data['id'];?>"
					<?php 
						if (isset($_GET['id'])) {
							selected($user_data['id'],$opened['author'],'selected');
						} else {
							selected($user_data['id'],$opened['author'],'selected');
						}
					?>><?php echo $user_data['fullname']; ?>
				</option>


				<?php } ?>
			</select>
		</div>

			<div class = "form-group">
			<label class="list-group-item list-group-item-info"  for="forto">
				<?php echo $_SESSION['Value_For_Type_Job']; ?> : </label>
			<select class="form-control" name="forto" id="forto">
				<option value = "0" ><?php echo $_SESSION['Value_TO_ALL']; ?></option>
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

		<div class = "form-group">
			<label class="list-group-item list-group-item-info"  for="body">
				<?php echo $_SESSION['Value_Body']; ?> : </label>
			<textarea class="form-control editor" name="body" id="body" rows="8" placeholder="body"> <?php echo $opened['body']; ?> </textarea>
		</div>
		<div align="right" class="form-group">
			<?php if(isset($opened['id'])) { ?>
				<button type="submit" class="btn btn-primary">
					<?php echo $_SESSION['Value_Update']; ?></button>
			<?php } else { ?>
				<button type="submit" class="btn btn-success">
					<?php echo $_SESSION['Value_Save']; ?></button>
			<?php } ?>
			<input type="hidden" name="submited" value="1">
			<?php if(isset($opened['id'])) { ?>
				<input type="hidden" name="id" value="<?php echo $opened['id']; ?>">
			<?php } ?>
		</div>
	
	</form><!-- end of form -->
	<br><br><br>
</div><!-- end of col-md-9 -->
</div><!-- end of row -->
</div><!-- Stop container -->
