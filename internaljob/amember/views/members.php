<?php #members ?>
<?php if(isset($opened_contact['id'])) { ?>
	<script>
		$(document).ready(function(){
			Dropzone.autoDiscover = false;

			var myDropzone = new Dropzone("#avatar-dropzone");
			myDropzone.on("success", function(file){
				$("#avatar").load("ajax/avatar_contact.php?id_contact=<?php echo $opened_contact['id']; ?>");
			});
		});
	</script>
<?php } ?>

<div class = "container"><!-- Start container -->
<center><h1><i class="fa fa-users"> Contact</i></h1></center>

<div class="row"><!-- Start row -->
<?php if(isset($message)){echo $message; } ?><!-- edo tiponete to minima gia to save.-->

<div class="col-md-3"><!-- Start col-md-3 -->
 <h3>Admin Members</h3>
	<div class="list-group"><!-- Start list-group -->
		<a class="list-group-item list-group-item-success" href="?page=members">
			<h4 class="list-group-item-heading"><i>Admin Members</i></h4>
		</a>
		<?php 
		// edo exoume to SELECT gia na mas efanizi ta iparxonta idi dedomena mas.
			$q = "SELECT * FROM admin_user ORDER BY first ASC";
			$r = mysqli_query($dbc, $q);
			while($list_admin = mysqli_fetch_assoc($r)) { 
				$list_admin = data_user($dbc, $list_admin['id']); 
			?>
			<a class="list-group-item <?php selected($list_admin['id'], $opened_admin['id'], 'active') ?>" href="index.php?page=members&id_admin=<?php echo $list_admin['id']; ?>">
				<div class="row">
					<div class="col-md-2">
						<?php if($list_admin['avatar'] != '') { ?> 
							<img class="img-circle avatar_nav" src="../uploads/<?php echo $list_admin['avatar']; ?>">
						<?php } else { ?>
						<img class="img-circle avatar_nav" src="../images/no_avatar.png" title="this avatar is from web">
						<?php } ?>
					</div>
					<div class="col-md-9">
						<h4 class="list-group-item-heading"><?php echo $list_admin['fullname']; ?></h4>
						<h4 class="list-group-item-heading"><?php echo $list_admin['email']; ?></h4>
					</div>
				</div>
				</a>
				<?php if($_GET['id_admin'] != "" AND $_GET['id_admin'] == $list_admin['id']) { ?>
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-4">
						<button type="button" class="btn btn-success btn-lg active" data-toggle="modal" data-target="#AdminModal">&nbsp; View &nbsp;</button>
					</div>
					<div class="col-md-4">
						<button type="button" class="btn btn-info btn-lg active" data-toggle="modal" data-target="#contact_admin_Modal">Send Mail</button>
					</div>
					<div class="col-md-1"></div>
				</div>
				<?php } ?>
		<?php } ?>
	</div><!--Stop list-group-->
</div><!--Stop col-md-3-->

<div class="col-md-1"></div>	

<div class="col-md-3"><!-- Start col-md-3 -->
 <h3>Colleague - Fellow Member</h3>
	<div class="list-group"><!-- Start list-group -->
		<a class="list-group-item list-group-item-success" href="?page=members">
			<h4 class="list-group-item-heading"><i>Colleague - Fellow Member</i></h4>
		</a>
		<?php 
		// edo exoume to SELECT gia na mas efanizi ta iparxonta idi dedomena mas.
			$q = "SELECT * FROM member ORDER BY first ASC";
			$r = mysqli_query($dbc, $q);
			while($list_member = mysqli_fetch_assoc($r)) { 
				$list_member = data_member($dbc, $list_member['id']);
			?>
			<a class="list-group-item <?php selected($list_member['id'], $opened_member['id'], 'active') ?>" href="index.php?page=members&id_member=<?php echo $list_member['id']; ?>">
				<div class="row">
					<div class="col-md-2">
						<?php if($list_member['avatar'] != '') { ?> 
							<img class="img-circle avatar_nav" src="../uploads_member/<?php echo $list_member['avatar']; ?>">
						<?php } else { ?>
						<img class="img-circle avatar_nav" src="../images/no_avatar.png" title="this avatar is from web">
						<?php } ?>
					</div>
					<div class="col-md-9">
						<h4 class="list-group-item-heading"><?php echo $list_member['fullname']; ?></h4>
						<h4 class="list-group-item-heading"><?php echo $list_member['email']; ?></h4>
						<!-- <p class="list-group-item-text"><?php echo $blurb; ?></p> -->
					</div>
				</div>	
			</a>
			<?php if($_GET['id_member'] != "" AND $_GET['id_member'] == $list_member['id']) { ?>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-4">
					<button type="button" class="btn btn-success btn-lg active" data-toggle="modal" data-target="#MemberModal">&nbsp; View &nbsp;</button>
				</div>
				<div class="col-md-4">
					<button type="button" class="btn btn-info btn-lg active" data-toggle="modal" data-target="#contact_Member_Modal">Send Mail</button>
				</div>
				<div class="col-md-1"></div>
			</div>
			<?php } ?>
		<?php } ?>
	</div><!--Stop list-group-->
</div><!--Stop col-md-3-->

<div class="col-md-1"></div>

<div class="col-md-4"><!-- Start col-md-3 -->
 <h3>My Contact</h3>
	<div class="list-group"><!-- Start list-group -->
		<a class="list-group-item list-group-item-success" data-toggle="modal" data-target="#PlusContact">
			<h4 class="list-group-item-heading"><i class="fa fa-plus"> My Contact</i>
			</h4>
		</a>
		<?php 
		// edo exoume to SELECT gia na mas efanizi ta iparxonta idi dedomena mas.
			$acount = $_SESSION['id'];
			$q = "SELECT * FROM contact WHERE id_member = '$acount' ORDER BY first ASC";
			$r = mysqli_query($dbc, $q);
			while($list_contact = mysqli_fetch_assoc($r)) { 
				$list_contact = data_contact($dbc, $list_contact['id']);
			?>
			<a class="list-group-item <?php selected($list_contact['id'], $opened_contact['id'], 'active') ?>" href="index.php?page=members&id_contact=<?php echo $list_contact['id']; ?>">
				<div class="row">
					<div class="col-md-2">
						<?php if($list_contact['avatar'] != '') { ?> 
							<img class="img-circle avatar_nav" src="../uploads_contact/<?php echo $list_contact['avatar']; ?>">
						<?php } else { ?>
						<img class="img-circle avatar_nav" src="../images/no_avatar.png" title="this avatar is from web">
						<?php } ?>
					</div>
					<div class="col-md-9">
						<h4 class="list-group-item-heading"><?php echo $list_contact['fullname']; ?></h4>
						<h4 class="list-group-item-heading"><?php echo $list_contact['email']; ?></h4>
						<!-- <p class="list-group-item-text"><?php echo $blurb; ?></p> -->
					</div>
				</div>	
			</a>
			<?php if($_GET['id_contact'] != "" AND $_GET['id_contact'] == $list_contact['id']) { ?>
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-4">
						<button type="button" class="btn btn-success btn-lg active" data-toggle="modal" data-target="#ContactModal">&nbsp; View &nbsp;</button>
					</div>
					<div class="col-md-4">
						<button type="button" class="btn btn-info btn-lg active" data-toggle="modal" data-target="#socialContact">Add social network</button>
					</div>
					<div class="col-md-1"></div>
				</div>
			<?php } ?>
		<?php } ?>
	</div><!--Stop list-group-->
</div><!--Stop col-md-3-->



</div><!-- Stop row-->
</div><!-- Stop container -->


<?php include('Modal_member.php'); ?>