<?php if(isset($opened['id'])) { ?>

<script>
	$(document).ready(function(){
		Dropzone.autoDiscover = false;

		var myDropzone = new Dropzone("#avatar-dropzone");
		myDropzone.on("success", function(file){

			$("#avatar").load("ajax/avatar.php?id=<?php echo $opened['id']; ?>");

		});
	});
</script>

<?php } ?>
<div class = "container"><!-- Start container -->
<h1><?php echo $_SESSION['Value_Admin_User_Manager']; ?></h1>

<div class="row"><!-- Start row -->
 <div class="col-md-3"><!-- Start col-md-3 -->
	<div class="list-group"><!-- Start col-md-3 -->
		<a class="list-group-item list-group-item-success" href="?page=users">
			<h4 class="list-group-item-heading "><i class="fa fa-plus">
				<?php echo $_SESSION['Value_New_User']; ?>
			</i></h4>
		</a>
		<?php 
		// edo exoume to SELECT gia na mas efanizi ta iparxonta idi dedomena mas.
			$q = "SELECT * FROM admin_user ORDER BY first ASC";
			$r = mysqli_query($dbc, $q);

			while($list = mysqli_fetch_assoc($r)) { 
				$list = data_user($dbc, $list['id']);
			?>
		
			<a class="list-group-item <?php selected($list['id'], $opened['id'], 'active') ?>" href="index.php?page=users&id=<?php echo $list['id']; ?>">
				<div class="row">
					<div class="col-md-3">
						<?php if($list['avatar'] != '') { ?> 
						<img class="img-circle avatar_nav" src="../uploads/<?php echo $list['avatar']; ?>">
						<?php } else { ?>
						<img class="img-circle avatar_nav" src="../images/no_avatar.png">
						<?php } ?>
					</div>

					<div class="col-md-9">
						<h4 class="list-group-item-heading"><?php echo $list['fullname']; ?></h4>
					</div>
				</div>
				<!-- <p class="list-group-item-text"><?php echo $blurb; ?></p> -->
			</a>
			
		<?php } ?>
	</div><!--Stop col-md-3-->
</div><!--Stop col-md-3-->
	
	<div class="col-md-9"><!-- Start col-md-3 -->
	<?php if(isset($message)){echo $message; } ?><!-- edo tiponete to minima gia to save.-->
		<!-- se periptosi pou exoume epilezi ena apo tin lista mas tote tha efanisi ta apotelesmata stin form. -->
		
	<form action="index.php?page=users&id=<?php echo $opened['id']; ?>" method="post" role="form" onSubmit="return validate_form_users();"><!-- Start form -->
		
	<?php if($opened['avatar'] != '') { ?>
		<div id="avatar">
		<div class="avatar-container" style="background-image: url('../uploads/<?php echo $opened['avatar']; ?>')"></div>
		<br>
		</div>
	<?php } ?>
		<div class="form-group">
			<label class="list-group-item list-group-item-info" for="first">
				<?php echo $_SESSION['Value_First_Name']; ?> : </label>
			<input class="form-control" type="text" name="first" id="first" value="<?php echo $opened['first']; ?>" placeholder="First Name" autocomplete="off">
		</div>

		<div class="form-group">
			<label class="list-group-item list-group-item-info" for="last">
				<?php echo $_SESSION['Value_Last_Name']; ?> : </label>
			<input class="form-control" type="text" name="last" id="last" value="<?php echo $opened['last']; ?>" placeholder="Last Name" autocomplete="off">
		</div>

		<div class="form-group">
			<label class="list-group-item list-group-item-info" for="email">
				<?php echo $_SESSION['Value_Email_Address']; ?> : </label>
			<input class="form-control" type="email" name="email" id="email" value="<?php echo $opened['email']; ?>" placeholder="Email Address" autocomplete="off">
		</div>
		
		<div class="form-group">
			<label class="list-group-item list-group-item-info" for="status">
				<?php echo $_SESSION['Value_Status']; ?> : </label>
			<select class="form-control" name="status" id="status">
				<option value="0" <?php if(isset($_GET['id'])){ selected('0', $opened['status'], 'selected'); } ?>><?php echo $_SESSION['Value_Inactive']; ?></option>
				<option value="1" <?php if(isset($_GET['id'])){ selected('1', $opened['status'], 'selected'); } ?>><?php echo $_SESSION['Value_Active']; ?></option>
			</select>
		</div>

		<div class="form-group">
			<label class="list-group-item list-group-item-info" for="password">
				<?php echo $_SESSION['Value_Password']; ?> : </label>
			<input class="form-control" type="password" name="password" id="password" value="" placeholder="Password" autocomplete="off">
		</div>

		<div class="form-group">
			<label class="list-group-item list-group-item-info" for="passwordv">
				<?php echo $_SESSION['Value_Verify_Password']; ?> : </label>
			<input class="form-control" type="password" name="passwordv" id="passwordv" value="" placeholder="Verify Password Again" autocomplete="off">
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
		<?php if(isset($opened['id'])) { ?>

	<form action="uploads.php?id=<?php echo $opened['id']; ?>" class="dropzone" id="avatar-dropzone"><!-- Start form avatar-->
		<input type="file" name="file">
	</form><!-- Stop form avatar-->
		<?php } ?>
<br><br><br>
	</div><!-- Stop col-md-9-->
</div><!-- Stop row-->
</div><!-- Stop container -->