<?php 
#Start Session:
session_start();

#connection with DB
include('../config/connection.php'); 

if($_POST) {
	$q = "SELECT * FROM admin_user WHERE email = '$_POST[email]' AND password = sha1('$_POST[password]')";
	$r = mysqli_query($dbc, $q);
	
	if($_SESSION['test'] == "Member") { ?>
	<div class="row">
  		<div class="col-md-2"></div>
  		
  		<div class="col-md-8">
  		  <p align="center" class="bg-danger alert alert-danger"><strong>ERROR !!</strong>
			<br/>
			You should <strong><a href="../amember/logout.php"> log-out </a></strong> from the <strong><a href="../amember/">member</a></strong> page Before you <strong>log-in</strong> here.
			<br/>
			<strong><i>Sing up for an account.</i></strong>
		  </p> <!-- diaforetika ERROR -->
  		</div>
  		
  		<div class="col-md-2"></div>
  	</div>
<?php } elseif(mysqli_num_rows($r) == 1) { // an to apotelesma feri 1 apantisi tote 
		$_SESSION['username'] = $_POST['email']; // dose to onoma sto $_SESSION['username']
		$user_login = mysqli_fetch_assoc($r);
		$_SESSION['test'] = "Admin";
		$_SESSION['first'] = $user_login['first'];
		$_SESSION['last'] = $user_login['last'];
		$_SESSION['status'] = $user_login['status'];
		$_SESSION['avatar'] = $user_login['avatar'];
		$_SESSION['id'] = $user_login['id'];

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

<?php } 
	} 
?>

<!DOCTYPE html>
<html>
<head><!-- Start head-->
	<title>Log In | Admin</title><!-- title -->
	<!-- meta-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- edo exoume tous sindesmous me ta css.php js.php-->
	<?php include('config/css.php'); ?>
	<?php include('config/js.php');  ?>
	
</head><!-- Stop head-->
<body id="login" background="../images/background/back4.jpg" bgcolor="red"><!-- Start body-->
	<div id="wrap"><!-- Start wrap-->
	<div class="container"><!-- Start container-->
	  <div class="row"><!-- Start row-->
	    <div class="col-md-4 col-md-offset-4"><!-- Start col-md-4 col-md-offset-4-->
		  <div class="panel panel-info"><!-- Start panel panel-info-->
			<div align="center" class="panel-heading"><!-- Start panel-heading-->
				<strong><h4>Login Admin</h4></strong>
			</div><!-- Stop panel-heading-->
			
			<div class="panel-body"><!-- Start panel-body-->
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
				  	<button type="submit" class="btn btn-success">Log In Admin</button>
				  </div>
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