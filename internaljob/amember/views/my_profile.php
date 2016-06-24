<?php #my_profile.php ?>
<h1>My Profile</h1>
<div class = "container"><!-- Start container -->

<br><br>
<h3>Avatar Image</h3>
<img class="img-thumbnail avatar_profile" src="../uploads_member/<?php echo $_SESSION['avatar']; ?>">
<br>

<div class="row"><!-- Start row -->
	
	<div class="col-md-2"><!-- Start col-md-1 -->
		<div class="form-group">
			<label class="sr" for="id">ID :</label>
			<input class="form-control" type="text" name="id" id="id" value="<?php echo $_SESSION['id']; ?>" placeholder="First Name" autocomplete="off" disabled>
		</div>
	</div>
	
	<div class="col-md-4"><!-- Start col-md-2 -->
		<div class="form-group">
			<label class="sr" for="label">First Name :</label>
			<input class="form-control" type="text" name="label" id="label" value="<?php echo $_SESSION['first']; ?>" placeholder="Last Name" autocomplete="off" disabled>
		</div>
	</div>

	<div class="col-md-4"><!-- Start col-md-2 -->
		<div class="form-group">
			<label class="sr" for="value">Last Name :</label>
			<input class="form-control" type="text" name="value" id="value" value="<?php echo $_SESSION['last']; ?>" placeholder="Email Address" autocomplete="off" disabled>
		</div>
	</div>
	
</div><!-- Stop row-->
<div class="row"><!-- Start row -->
	
	<div class="col-md-2"><!-- Start col-md-1 -->
		<div class="form-group">
			<label class="sr" for="value">Status :</label>
			<input class="form-control" type="text" name="value" id="value" value="<?php echo $_SESSION['status']; ?>" placeholder="Email Address" autocomplete="off" disabled>
		</div>
	</div>

	<div class="col-md-4"><!-- Start col-md-2 -->
		<div class="form-group">
			<label class="sr" for="value">Email :</label>
			<input class="form-control" type="text" name="value" id="value" value="<?php echo $_SESSION['username']; ?>" placeholder="Email Address" autocomplete="off" disabled>
		</div>
	</div>
	
	<div class="col-md-4"><!-- Start col-md-2 -->
		<div class="form-group">
			<label class="sr" for="value">Avatar Name :</label>
			<input class="form-control" type="text" name="value" id="value" value="<?php echo $_SESSION['avatar']; ?>" placeholder="Email Address" autocomplete="off" disabled>
		</div>
	</div>
	
</div><!-- Stop row-->

<div class="row"><!-- Start row-->
	<div class="col-md-2"><!-- Start col-md-2 -->
		<div class="form-group">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#changes_my">Go to changes</button>		
		</div>
	</div>
</div><!-- Stop row-->

<br><br><br>

</div><!-- Stop container -->
<!-- Start Modal_member -->
<?php include('Modal_member.php'); ?>
<!-- Stop Modal_member -->
