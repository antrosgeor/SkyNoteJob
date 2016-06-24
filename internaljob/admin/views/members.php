<?php #members ?>
<?php if(isset($opened['id'])) { ?>

<script>
	$(document).ready(function(){
		Dropzone.autoDiscover = false;

		var myDropzone = new Dropzone("#avatar-dropzone");
		myDropzone.on("success", function(file){

			$("#avatar").load("ajax/avatar_member.php?id=<?php echo $opened['id']; ?>");

		});
	});
</script>

<?php } ?>
<div class = "container"><!-- Start container -->
<h1><?php echo $_SESSION['Value_Members_Manager']; ?></h1>

<div class="row"><!-- Start row -->
 <div class="col-md-3"><!-- Start col-md-3 -->
	<div class="list-group"><!-- Start col-md-3 -->
		<a class="list-group-item list-group-item-success" href="?page=members">
			<h4 class="list-group-item-heading "><i class="fa fa-plus">
			<?php echo $_SESSION['Value_New_Member']; ?></i></h4>
		</a>
	
		<?php 
		// edo exoume to SELECT gia na mas efanizi ta iparxonta idi dedomena mas.
			$q = "SELECT * FROM member ORDER BY first ASC";
			$r = mysqli_query($dbc, $q);

			while($list = mysqli_fetch_assoc($r)) { 
				$list = data_member($dbc, $list['id']);
			?>
			<a class="list-group-item <?php selected($list['id'], $opened['id'], 'active') ?>" href="index.php?page=members&id=<?php echo $list['id']; ?>">
				<div class="row">
					<div class="col-md-3">
						<?php if($list['avatar'] != '') { ?> 
							<img class="img-circle avatar_nav" src="../uploads_member/<?php echo $list['avatar']; ?>">
						<?php } else { ?>
						<img class="img-circle avatar_nav" src="../images/no_avatar.png" title="this avatar is from web">
						<?php } ?>
					</div>
					<div class="col-md-9">
						<h4 class="list-group-item-heading"><?php echo $list['fullname']; ?></h4>
						<h4 class="list-group-item-heading"><?php echo $list['email']; ?></h4>
						<!-- <p class="list-group-item-text"><?php echo $blurb; ?></p> -->
					</div>
				</div>	
			</a>
			
		<?php } ?>
	</div><!--Stop col-md-3-->
</div><!--Stop col-md-3-->
	
	<div class="col-md-9"><!-- Start col-md-3 -->
	<?php if(isset($message)){echo $message; } ?><!-- edo tiponete to minima gia to save.-->
		<!-- se periptosi pou exoume epilezi ena apo tin lista mas tote tha efanisi ta apotelesmata stin form. -->
		
	<form action="index.php?page=members&id=<?php echo $opened['id']; ?>" method="post" role="form" onSubmit="return validate_form_member();"><!-- Start form -->
		
	<?php if($opened['avatar'] != '') { ?>
		<h3><strong><?php echo $_SESSION['Value_Image_Profil']; ?></strong></h3>
		<div id="avatar" class="img-circle">
		<div class="avatar-container img-circle" style="background-image: url('../uploads_member/<?php echo $opened['avatar']; ?>')"></div>
			<!-- <img class="img-circle avatar" src="../uploads_member/<?php echo $opened['avatar']; ?>"> -->
		<br>
		</div>
	<?php } ?>

	<h3><strong>Activate Login</strong></h3>
		<div class="form-group">
			<label class="list-group-item list-group-item-info" for="email">* <?php echo $_SESSION['Value_Email_Address']; ?> : </label>
			<input class="form-control" type="text" name="email" id="email" value="<?php echo $opened['email']; ?>" placeholder="Email Address" autocomplete="off">
		</div>
		
		<div class="form-group">
			<label class="list-group-item list-group-item-info" for="password">* 
				<?php echo $_SESSION['Value_Password']; ?> : </label>
			<input class="form-control" type="password" name="password" id="password" value="" placeholder="Password" autocomplete="off">
		</div>

		<div class="form-group">
			<label class="list-group-item list-group-item-info" for="passwordv">* <?php echo $_SESSION['Value_Verify_Password']; ?> : </label>
			<input class="form-control" type="password" name="passwordv" id="passwordv" value="" placeholder="Verify Password Again" autocomplete="off">
		</div>
		
		<div class = "form-group">
			<label class="list-group-item list-group-item-info"  for="type_job">* <?php echo $_SESSION['Type_Job']; ?> : </label>
			<select class="form-control" name="type_job" id="type_job">
				<option value ="0">No Jobs</option>
					<?php 
						$q = "SELECT id FROM type_job ORDER BY name_job ASC";
						$r = mysqli_query($dbc,$q);
		
						while ($type_list = mysqli_fetch_assoc($r)) { 

							$type_data = data_type($dbc, $type_list['id']);  
					?>

				<option value = "<?php echo $type_data['id'];?>"
					<?php 
						if (isset($_GET['id'])) {
							selected($type_data['id'],$opened['type_job'],'selected');
						} else {
							selected($type_data['id'],$opened['name_job'],'selected');
						}
					?>><?php echo $type_data['fullname']; ?>
				</option>

				<?php } ?>
			</select>
		</div>

		<div class="form-group">
			<label class="list-group-item list-group-item-info" for="status">* <?php echo $_SESSION['Value_Status']; ?> : </label>
			<select class="form-control" name="status" id="status">
				<option value="0" <?php if(isset($_GET['id'])){ selected('0', $opened['status'], 'selected'); } ?>><?php echo $_SESSION['Value_Inactive']; ?></option>
				<option value="1" <?php if(isset($_GET['id'])){ selected('1', $opened['status'], 'selected'); } ?>><?php echo $_SESSION['Value_Active']; ?></option>
			</select>
		</div>
	
	<br><br>

	<h3><strong><?php echo $_SESSION['Value_Personal_Data']; ?></strong></h3>
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
			<label class="list-group-item list-group-item-info" for="address">
				<?php echo $_SESSION['Value_Home_Address']; ?> : </label>
			<input class="form-control" type="text" name="address" id="address" value="<?php echo $opened['address']; ?>" placeholder="Home Address" autocomplete="off">
		</div>

		<div class="form-group">
			<label class="list-group-item list-group-item-info" for="wphone">
				<?php echo $_SESSION['Value_Word_Phone']; ?> : </label>
			<input class="form-control" type="text" name="wphone" id="wphone" value="<?php echo $opened['wphone']; ?>" placeholder="Word Phone" autocomplete="off">
		</div>

		<div class="form-group">
			<label class="list-group-item list-group-item-info" for="mphone">
				<?php echo $_SESSION['Value_Mobile_Phone']; ?> : </label>
			<input class="form-control" type="text" name="mphone" id="mphone" value="<?php echo $opened['mphone']; ?>" placeholder="Mobile Phone" autocomplete="off">
		</div>

	<div align="right" class="form-group">
		<?php if(isset($opened['id'])) { ?>
			<button type="submit" class="btn btn-primary">
				<?php echo $_SESSION['Value_Update']; ?></button>
		<?php } else { ?>
			<button type="submit" class="btn btn-success">
				<?php echo $_SESSION['Value_Save']; ?></button>
		<?php } ?>
		<input type="hidden" name="submitted" value="1">
		<?php if(isset($opened['id'])) { ?>
			<input type="hidden" name="id" value="<?php echo $opened['id']; ?>">
		<?php } ?>
		<br><br>
	</div>
	</form><!-- Stop form-->
	
	<!-- images code.. -->
	<?php if(isset($opened['id'])) { ?>
		<?php if($opened['avatar'] != '') { ?>
			<label class="list-group-item list-group-item-info" for="image"><h4><strong><?php echo $_SESSION['Value_Update_Profile_Picture']; ?></strong></h4><br>
			<?php echo $_SESSION['Value_Update_Profile_Picture_Text']; ?></p></label>
		<?php } else { ?>
			<label class="list-group-item list-group-item-info" for="image"><h4><strong><?php echo $_SESSION['Value_Add_Profile_Picture']; ?></strong></h4></label>
		<?php } ?>

		<form action="uploads_member.php?id=<?php echo $opened['id']; ?>" class="dropzone" id="avatar-dropzone"><!-- Start form avatar-->
			<input type="file" name="file">
		</form><!-- Stop form avatar-->
	<?php } ?>
	
	<br><br><br>
	
	</div><!-- Stop col-md-9-->
</div><!-- Stop row-->
</div><!-- Stop container -->