<?php #for lever

	$zero = "Kanoniko";
	$one = "Epigon";
	$two = "Simantiko";
	$three = "Enimerosi";
	$four  = "Anafora";
	$five = "Proidopiisi";
	$six = "Asxeto";

 ?>

<div class = "container"><!-- Start container -->
<div class="row"><!-- Start row -->
	<h1><?php echo $_SESSION['Contact']; ?></h1>

	<div class="col-md-2"><!-- Start col-md-2 -->
	</div><!-- Stop col-md-2 -->
	
	<div class="col-md-8"><!-- Start col-md-8 -->
		<?php if(isset($message)){echo $message; } ?><!-- edo tiponete to minima gia to save.-->
		
		<form action="index.php?page=contact" enctype='multipart/form-data' method="post" role="form" onSubmit="return validate_form_contact();"><!-- Start form -->
		
		<div class="row"><!-- Start row -->
			<div class="col-md-4"><!-- Start col-md-8 -->
				<div class="form-group">
				<label class="list-group-item list-group-item-info" for="type_to"><?php echo $_SESSION['Value_Send_message_to_Type']; ?> : </label>
					<select class="form-control" name="type_to" id="type_to">
						<option value = "-1" ><?php echo $_SESSION['Value_No_to_Type_Job']; ?></option>
						<option value = "0" ><?php echo $_SESSION['Value_For_All_Type_Job']; ?></option>
							<?php 
								$q = "SELECT id FROM type_job ORDER BY name_job ASC";
								$r = mysqli_query($dbc,$q);
				
								while ($type_list = mysqli_fetch_assoc($r)) { 

									$type_data = data_type($dbc, $type_list['id']);  
							?>

						<option value = "<?php echo $type_data['id'];?>">
							<?php echo $type_data['fullname']; ?>
						</option>

						<?php } ?>
					</select>
				</div>
			</div>

	<div class="col-md-4">
		<div class="form-group">
			<label class="list-group-item list-group-item-info" for="member_to"><?php echo $_SESSION['Value_Sent_message_to_Member']; ?> : </label>
			<select class="form-control" name="member_to" id="member_to">
				<option value = "-1" ><?php echo $_SESSION['Value_No_to_Member']; ?></option>
				<option value = "0" ><?php echo $_SESSION['Value_All_Members']; ?></option>
					<?php 
						$q = "SELECT id FROM member ORDER BY first ASC";
						$r = mysqli_query($dbc,$q);
						while ($user_list = mysqli_fetch_assoc($r)) { 
							$user_data = data_member($dbc, $user_list['id']);  
					?>
				<option value = "<?php echo $user_data['id'];?>">
					<?php echo $user_data['fullname']; ?>
				</option>
				<?php } ?>
			</select>
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label class="list-group-item list-group-item-info" for="admin_to"><?php echo $_SESSION['Value_Sent_message_to_Admin']; ?> : </label>
			<select class="form-control" name="admin_to" id="admin_to">
				<option value = "-1" ><?php echo $_SESSION['Value_No_to_Users']; ?></option>
				<option value = "0" ><?php echo $_SESSION['Value_All_Users']; ?></option>
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
	</div>
</div>

		<div class = "form-group">
			<label class="list-group-item list-group-item-info"  for="date"><?php echo $_SESSION['Value_Date']; ?> : </label>
			<input class="form-control" type="text" name="date" id="date" placeholder="Date"  value="<?php 
				if (isset($opened['date'])) { echo $opened['date']; } 
				else { echo get_date(); }
			?>" autocomplete="off" disabled>
		</div>

		<div class="form-group">
			<label class="list-group-item list-group-item-info" for="status"><?php echo $_SESSION['Value_Type_message']; ?> : </label>
			<select class="form-control" name="status" id="status">
				<option value="0"><?php echo $zero; ?></option>
				<option value="1"><?php echo $one; ?></option>
				<option value="2"><?php echo $two; ?></option>
				<option value="3"><?php echo $three; ?></option>
				<option value="4"><?php echo $four; ?></option>
				<option value="5"><?php echo $five; ?></option>
				<option value="6"><?php echo $six; ?></option>
			</select>
		</div>

		<div class="form-group">
			<label class="list-group-item list-group-item-info" for="title"><?php echo $_SESSION['Value_Title']; ?> : </label>
			<input class="form-control" type="text" name="title" id="title" value="<?php echo $opened['title']; ?>" placeholder="Page Title">
		</div>

		<div class="form-group">
			<label class="list-group-item list-group-item-info" for="body"><?php echo $_SESSION['Value_Message_Body']; ?> : </label>
			<textarea class="form-control editor" type="text" name="body" id="body" rows="8" placeholder="Page Body"><?php echo $opened['body']; ?></textarea>
		</div>

		<div class="form-group">
   			<label class="list-group-item" for="upload"><?php echo $_SESSION['Value_File_input']; ?></label>
    		<input class="btn btn-warning" type="file" id="upload" name="upload">
    		<p class="help-block"><?php echo $_SESSION['Value_File_text']; ?></p>
  		</div>
		
		<br>

		<div align="right" class="form-group">
			<button type="submit" class="btn btn-success"><?php echo $_SESSION['Value_Send_Message']; ?></button>
			<input type="hidden" name="submitted" value="1">
			<?php if(isset($opened['id'])) { ?>
				<input type="hidden" name="id" value="<?php echo $opened['id']; ?>">
			<?php } ?>
		</div>
	</form><!-- Stop form-->
	</div><!-- Stop col-md-8 -->

	<div class="col-md-2"></div>

<br><br><br>

</div><!-- Stop row-->
</div><!-- Stop container -->