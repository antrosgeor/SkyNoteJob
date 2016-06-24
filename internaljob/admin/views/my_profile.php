<?php #my_profile.php ?>
<h1>My Profile</h1>
<div class = "container"><!-- Start container -->

<br><br>
<h3><?php echo $_SESSION['Value_Avatar_Image']; ?></h3>
<img class="img-thumbnail avatar_profile" src="../uploads/<?php echo $_SESSION['avatar']; ?>">
<br>

<div class="row"><!-- Start row -->
	
	<div class="col-md-2"><!-- Start col-md-1 -->
		<div class="form-group">
			<label class="sr" for="id"><?php echo $_SESSION['Value_ID']; ?> : </label>
			<input class="form-control" type="text" name="id" id="id" value="<?php echo $_SESSION['id']; ?>" placeholder="First Name" autocomplete="off" disabled>
		</div>
	</div>
	

	<div class="col-md-4"><!-- Start col-md-2 -->
		<div class="form-group">
			<label class="sr" for="label"><?php echo $_SESSION['Value_First_Name']; ?> : </label>
			<input class="form-control" type="text" name="label" id="label" value="<?php echo $_SESSION['first']; ?>" placeholder="Last Name" autocomplete="off" disabled>
		</div>
	</div>

	<div class="col-md-4"><!-- Start col-md-2 -->
		<div class="form-group">
			<label class="sr" for="value"><?php echo $_SESSION['Value_Last_Name']; ?> : </label>
			<input class="form-control" type="text" name="value" id="value" value="<?php echo $_SESSION['last']; ?>" placeholder="Email Address" autocomplete="off" disabled>
		</div>
	</div>
	
</div><!-- Stop row-->
<div class="row"><!-- Start row -->
	
	<div class="col-md-2"><!-- Start col-md-1 -->
		<div class="form-group">
			<label class="sr" for="value"><?php echo $_SESSION['Value_Status']; ?> : </label>
			<input class="form-control" type="text" name="value" id="value" value="<?php echo $_SESSION['status']; ?>" placeholder="Email Address" autocomplete="off" disabled>
		</div>
	</div>

	<div class="col-md-4"><!-- Start col-md-2 -->
		<div class="form-group">
			<label class="sr" for="value"><?php echo $_SESSION['Value_Email']; ?> : </label>
			<input class="form-control" type="text" name="value" id="value" value="<?php echo $_SESSION['username']; ?>" placeholder="Email Address" autocomplete="off" disabled>
		</div>
	</div>
	
	<div class="col-md-4"><!-- Start col-md-2 -->
		<div class="form-group">
			<label class="sr" for="value"><?php echo $_SESSION['Value_Avatar_Name']; ?> : </label>
			<input class="form-control" type="text" name="value" id="value" value="<?php echo $_SESSION['avatar']; ?>" placeholder="Email Address" autocomplete="off" disabled>
		</div>
	</div>
	
</div><!-- Stop row-->

<div class="row"><!-- Start row-->
	<div class="col-md-2"><!-- Start col-md-2 -->
		<div class="form-group">
			<a href="?page=users&id=<?php echo $_SESSION['id']; ?>"><button type="button" class="btn btn-primary"><?php echo $_SESSION['Value_Changes']; ?></button></a>			
		</div>
	</div>
</div><!-- Stop row-->

<br><br><br>

</div><!-- Stop container -->

