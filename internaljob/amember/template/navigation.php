<!--navbar -->
<nav class="navbar navbar-inverse navbar-custom" role="navigation"><!-- Start nav -->

	<div class="container-fluid"><!-- Start div1 -->
	 <div class="page-scroll">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
		 <a class="navbar-brand" href="?page=my_profile"> 
          <ul class="nav navbar-nav">
			<li>
				<?php if($_SESSION['avatar'] != "") { ?>
					<img class="img-circle avatar_nav" src="../uploads_member/<?php echo $_SESSION['avatar']; ?>">
					<?php } else { ?>
					<img class="img-circle avatar_nav" src="../images/no_avatar.png">
					<?php  } ?>
					<strong> Member</strong>
			</li>
			</ul><!-- Stop ul -->
		</a>
		<?php include('php/RowRemember.php'); ?>				
				<?php if($Row != 0){ ?>
		<a href="?page=today_remember"> 
						<br/>

			<ul class="nav navbar-nav"><!-- Start ul -->
				<li>&nbsp;&nbsp;
				 <strong><span class="badge">  <?php echo "$Row"." "."Remember Today" ?> </span></strong>	
				</li>
			</ul><!-- Stop ul -->
		</a>
			
		<?php }else{ ?>
						<br/>
			<?php }?>
		</div>
	
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
			<li class="<?php selected('dashboard', $_GET['page'], 'active') ?>"><a href="?page=dashboard">Dashboard</a></li>
			<li class="<?php selected('message/messages', $_GET['page'], 'active') ?>"><a href="?page=message/messages">Messages</a></li>
			<li class="<?php selected('pages', $_GET['page'], 'active') ?>"><a href="?page=pages">Pages</a></li>
			<li class="<?php selected('news', $_GET['page'], 'active') ?>"><a href="?page=news">News</a></li>
			<li class="<?php selected('members', $_GET['page'], 'active') ?>"><a href="?page=members">Members</a></li>
			<li class="<?php selected('notes', $_GET['page'], 'active') ?>"><a href="?page=notes">Notes</a></li>
			<li class="<?php selected('remember', $_GET['page'], 'active') ?>"><a href="?page=remember">Remember</a></li>
			<li class="dropdown" class="<?php selected('contact', $_GET['page'], 'active') ?>">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Contact<b class="caret" ></b></a>
				<ul class="dropdown-menu">
					<li><a href="?page=contact">Contact</a></li>
					<li><a href="?page=contact/contact_admin">Contact to Admin</a></li>
					<li><a href="?page=contact/contact_member">Contact to Member</a></li>
					<li><a href="?page=contact/contact_type">Contact to Type Job</a></li>
				</ul>
			</li>
			<li>
				<?php if ($debug == 1) { ?>
					<button type="button" id="btn-debug" class="btn btn-default navbar-btn"><i class="fa fa-exclamation-triangle"></i>Debug</button>
				<?php } ?>
			</li>
			<li class="dropdown" class="<?php selected('my_profile', $_GET['page'], 'active') ?>">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php
				$AdminName = $_SESSION['last'].' '.$_SESSION['first']; echo $AdminName; ?><b class="caret" ></b></a>
				<ul class="dropdown-menu">
					<li><a href="?page=my_profile"><i class="fa fa-user"></i>  My Profile</a></li>
					<li class="disabled"><a href="#"><i class="fa fa-user-secret" aria-hidden="true">  Admin Pages</i></a></li>
					<li><a href="?page=settings"><i class="fa fa-cogs" aria-hidden="true"> Settings</i>
</a></li>
					<li><a href="?page=help/help"><i>Help</i></a></li>
					<li><a href="?page=help/menou"><i>menou</i></a></li>
					<li><a href="?page=today_remember"><i class="fa fa-flag" aria-hidden="true">  Today Remember</i></a></li>
					<li role="separator" class="divider"></li>
					<li><a href="logout.php"><i class="fa fa-sign-out"></i> Log Out</a></li>	
				</ul>
			</li>
		</ul> 
	</div><!-- Stop div2 -->
</div><!-- Stop div1 -->
</nav><!-- Stop nav -->
<!-- END navbar -->
<div id="show_remember"> </div>

<script type="text/javascript" src="jquery-2.2.3.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			setInterval(function() {
				$('#show_remember').load('views/show.php')
			}, 60000);
		});
	</script>