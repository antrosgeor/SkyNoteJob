<!--#index.php  video 24 login index.php  -->
<?php 
#Start Session:
session_start();

#connection with DB
include('../config/connection.php'); 

if($_POST) {
	$q="SELECT * FROM member WHERE email = '$_POST[email]' AND password = sha1('$_POST[password]')";
	$r=mysqli_query($dbc, $q);

if($_SESSION['test'] == "Admin") { ?>
	<div class="row">
  		<div class="col-md-2"></div>
  		
  		<div class="col-md-8">
  			<p align="center" class="bg-danger alert alert-danger"><strong>ERROR !!</strong>
			<br/>
			You should <strong><a href="../admin/logout.php">log-out</a></strong> from the <strong><a href="../admin/">admin</a></strong> page Before you <strong>log-in</strong> here.
			<br/>
			<strong><i>Sing up for an account.</i></strong>
			</p> <!-- diaforetika ERROR -->
  		</div>
  		<div class="col-md-2"></div>
  	</div>
<?php
	} elseif(mysqli_num_rows($r) == 1){ // an to apotelesma feri 1 apantisi tote 
		$_SESSION['test'] = "Member";
		$_SESSION['username'] = $_POST['email']; // dose to onoma sto $_SESSION['username']
		$member_login = mysqli_fetch_assoc($r);
		$_SESSION['first'] = $member_login['first'];
		$_SESSION['last'] = $member_login['last'];
		$_SESSION['status'] = $member_login['status'];
		$_SESSION['avatar'] = $member_login['avatar'];
		$_SESSION['id'] = $member_login['id'];
		$_SESSION['type_job'] = $member_login['type_job'];
		$_SESSION['mphone'] = $member_login['mphone'];
		$_SESSION['wphone'] = $member_login['wphone'];
		$_SESSION['address'] = $member_login['address'];
	
		header('Location: index.php'); // kai pigene sto index.php

	} else { ?> 
	<div class="row">
  		<div class="col-md-2"></div>
  		
  		<div class="col-md-8">
  			<p align="center" class="bg-danger alert alert-danger"><strong>ERROR !!</strong>
			<br/>
			The <strong>email</strong> or <strong>password</strong> you've entered doesn't macth any account.
			<br/>
			<strong><i>Sing up for an account.</i></strong>
			</p> <!-- diaforetika ERROR -->
  		</div>
  		<div class="col-md-2"></div>
  	</div>

<?php 
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<!-- title -->
	<title>Log In | Member</title>
	<!-- meta-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- edo exoume tous sindesmous me ta css.php js.php-->
	<?php include('config/css.php'); ?>
	<?php include('config/js.php'); ?>

</head>

<body id="login" background="../images/background/back2.jpg" bgcolor="red">
	<div id="wrap"><!-- Start wrap-->
	<div class="container"><!-- Start container-->
	  <div class="row"><!-- Start row-->
	    <div class="col-md-4 col-md-offset-4"><!-- Start col-md-4 col-md-offset-4-->
		  <div class="panel panel-info"><!-- Start panel panel-info-->
			<div align="center" class="panel-heading"><!-- Start panel-heading-->
				<strong><h4>Login Member</h4></strong>
			</div><!-- Start panel-heading-->
			
			<div class="panel-body" > <!-- Start panel-body-->
				<form action="login.php" method="post" role="form" onSubmit="return validate_form_login_admin();"><!-- Start form login-->
				  <div class="form-group">
				    <label for="email">Email address</label>
				    <input type="email" class="form-control" id="email" name="email" placeholder="jane.doe@example.com">
				  </div>
				  <div class="form-group">
				    <label for="password">Password</label>
				    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
				  </div>

				  <div align="right" class="form-group">
				  	<button type="submit" class="btn btn-success">Log In Member</button>
				</dir>
				</form><!-- Stop form login-->
			</div><!-- Stop panel-body-->
		  </div><!-- Stop panel panel-info-->
		</div><!-- Stop col-md-4 col-md-offset-4-->
	  </div>	<!-- Stop row-->
	</div><!-- Stop container-->
	</div><!-- Stop wrap-->
	
	<!--footer -->
	<?php // include(D_TEMPLATE.'/footer.php'); ?>
	<?php // if($debug == 1) { include('widgets/debug.php'); } ?>

</body>
</html>