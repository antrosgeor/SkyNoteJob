<h1>Settings</h1>

<div class="row"><!-- Start row -->
 <div class="col-md-10"><!-- Start col-md-3 -->

 <?php if(isset($message)){echo $message; } ?><!-- edo tiponete to minima gia to save.-->
		<!-- se periptosi pou exoume epilezi ena apo tin lista mas tote tha efanisi ta apotelesmata stin form. -->

		<?php 
		// edo exoume to SELECT gia na mas efanizi ta iparxonta idi dedomena mas.
			$q = "SELECT * FROM settings ORDER BY id ASC";
			$r = mysqli_query($dbc, $q);

			while($opened = mysqli_fetch_assoc($r)) { ?>
			
				<form class="form-inline" action="index.php?page=settings&id=<?php echo $opened['id']; ?>" method="post" role="form"><!-- Start form -->
					<div class="form-group">
						<label class="sr-only" for="id">ID :</label>
						<input class="form-control" type="text" name="id" id="id" value="<?php echo $opened['id']; ?>" placeholder="First Name" autocomplete="off">
					</div>

					<div class="form-group">
						<label class="sr-only" for="label">LABEL :</label>
						<input class="form-control" type="text" name="label" id="label" value="<?php echo $opened['label']; ?>" placeholder="Last Name" autocomplete="off">
					</div>

					<div class="form-group">
						<label class="sr-only" for="value">VALUE :</label>
						<input class="form-control" type="text" name="value" id="value" value="<?php echo $opened['value']; ?>" placeholder="Email Address" autocomplete="off">
					</div>

					<button type="submit" class="btn btn-default">Save</button>
					<input type="hidden" name="submitted" value="1">
					<input type="hidden" name="openedid" value="<?php echo $opened['id']; ?>">
				</form><!-- Stop form-->
	
		<?php } ?>

	
	</div><!--Stop col-md-3-->
</div><!-- Stop row-->
		<br><br><br>