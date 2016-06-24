<h1>Contact Admin</h1>

<div class = "container"><!-- Start container -->
<div class="row"><!-- Start row -->
	
	<div class="col-md-2"><!-- Start col-md-2 -->
	</div><!-- Stop col-md-2 -->
	<div class="col-md-8"><!-- Start col-md-8 -->
	<?php if(isset($message)){echo $message; } ?><!-- edo tiponete to minima gia to save.-->
		
	<form action="index.php?page=contact_admin" method="post" role="form"><!-- Start form -->
		
		<div class = "form-group">
			<label class="list-group-item list-group-item-info"  for="date">Date:</label>
			<input class="form-control" type="text" name="date" id="date" placeholder="Date"  value="<?php 
				if (isset($opened['date'])) { echo $opened['date']; } 
				else { echo get_date(); }
			?>" autocomplete="off" disabled>
		</div>

		<div class="form-group">
			<label class="list-group-item list-group-item-info" for="to">Sent message to :</label>
			<select class="form-control" name="to" id="to">
				<option value = "0" >All Users</option>
					<?php 
						$q = "SELECT id FROM admin_user ORDER BY first ASC";
						$r = mysqli_query($dbc,$q);
						while ($user_list = mysqli_fetch_assoc($r)) { 
							$user_data = data_user($dbc, $user_list['id']);  
					?>
				<option value = "<?php echo $user_data['id'];?>">
					<?php echo $user_data['fullname']; ?>
				</option>
				<?php } ?>
			</select>
		</div>

		<div class="form-group">
			<label class="list-group-item list-group-item-info" for="status">Type message:</label>
			<select class="form-control" name="status" id="status">
				<option value="0">Kanoniko</option>
				<option value="1">Epigon</option>
				<option value="2">Simantiko</option>
				<option value="3">Enimerosi</option>
				<option value="4">Anafora</option>
				<option value="5">Proidopiisi</option>
				<option value="5">Asxeto</option>
			</select>
		</div>

		<div class="form-group">
			<label class="list-group-item list-group-item-info" for="title">Title:</label>
			<input class="form-control" type="text" name="title" id="title" value="<?php echo $opened['title']; ?>" placeholder="Page Title">
		</div>

		<div class="form-group">
			<label class="list-group-item list-group-item-info" for="body">Page Body:</label>
			<textarea class="form-control editor" type="text" name="body" id="body" rows="8" placeholder="Page Body"><?php echo $opened['body']; ?></textarea>
		</div>

		<div class="form-group">
			<file></file>
		</div>


		<button type="submit" class="btn btn-success">Save</button>
		<input type="hidden" name="submitted" value="1">
		<?php if(isset($opened['id'])) { ?>
			<input type="hidden" name="id" value="<?php echo $opened['id']; ?>">
		<?php } ?>
	</form><!-- Stop form-->
	</div><!-- Stop col-md-8 -->

	<div class="col-md-2"><!-- Start col-md-2 -->
	</div><!-- Stop col-md-2 -->
<br><br><br>
</div><!-- Stop row-->
</div><!-- Stop container -->