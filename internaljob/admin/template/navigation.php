<?php include('value.php'); ?>
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
			<ul class="nav navbar-nav"><!-- Start ul -->
				<li>
				<img class="img-circle avatar_nav" src="../uploads/<?php echo $user['avatar']; ?>">
				<strong><?php echo $_SESSION['Admin']; ?></strong>
				</li>
			</ul><!-- Stop ul -->
		</a>
								<br/>
		</div>

	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
			<li class="<?php selected('dashboard', $_GET['page'], 'active') ?>">
				<a href="?page=dashboard">
					<?php echo $_SESSION['Dashboard_Name']; ?>
				</a>
			</li>
			<li class="<?php selected('message/messages', $_GET['page'], 'active') ?>">
				<a href="?page=message/messages">
					<?php echo $_SESSION['Messages']; ?>
				</a>
			</li>
			<li class="<?php selected('pages', $_GET['page'], 'active') ?>">
				<a href="?page=pages">
					<?php echo $_SESSION['Pages']; ?>						
				</a>
			</li>
			<li class="<?php selected('news', $_GET['page'], 'active') ?>">
				<a href="?page=news">
					<?php echo $_SESSION['News']; ?>
				</a>
			</li>
			<li class="<?php selected('type_job', $_GET['page'], 'active') ?>">
				<a href="?page=type_job">
					<?php echo $_SESSION['Type_Job']; ?>
				</a>
			</li>
			<li class="<?php selected('users', $_GET['page'], 'active') ?>">
				<a href="?page=users">
					<?php echo $_SESSION['Users']; ?>
				</a>
			</li>
			<li class="<?php selected('members', $_GET['page'], 'active') ?>">
				<a href="?page=members">
					<?php echo $_SESSION['Members']; ?>
				</a>
			</li>
			<li class="dropdown" class="<?php selected('contact', $_GET['page'], 'active') ?>">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<?php echo $_SESSION['Contact']; ?><b class="caret" ></b>
				</a>
				<ul class="dropdown-menu">
					<li><a href="?page=contact">
							<?php echo $_SESSION['Contact']; ?>
						</a></li>
					<li><a href="?page=contact/contact_admin">
							<?php echo $_SESSION['Admin_Contact']; ?>
						</a></li>
					<li><a href="?page=contact/contact_member">
							<?php echo $_SESSION['Member_Contact']; ?>
						</a></li>
					<li><a href="?page=contact/contact_type">
							<?php echo $_SESSION['Type_Job_Contact']; ?>
						</a></li>
				</ul>
			</li>
			<li>
				<?php if ($debug == 1) { ?>
					<button type="button" id="btn-debug" class="btn btn-default navbar-btn"><i class="fa fa-exclamation-triangle"></i>Debug</button>
				<?php } ?>
			</li>
			<li class="dropdown" class="<?php selected('my_profile', $_GET['page'], 'active') ?>">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user['fullname']; ?><b class="caret" ></b></a>
				<ul class="dropdown-menu">
					<li><a href="?page=my_profile">
						<i class="fa fa-user">  &nbsp; <?php echo $_SESSION['Admin_Profile']; ?></i></a>
					</li>
					<li><a href="?page=settings"><i class="fa fa-cogs" aria-hidden="true"> &nbsp; 	<?php echo $_SESSION['Settings']; ?></i>
						</a></li>
					<li class="disabled"><a href="#"><i class="fa fa-users" aria-hidden="true">  &nbsp;	<?php echo $_SESSION['Disabled link']; ?></i>
						</a></li>
					<li><a href="?page=help/help"><i>
						<?php echo $_SESSION['Help']; ?></i>
						</a></li>
					<li><a href="?page=help/menou"><i>
						<?php echo $_SESSION['Menou']; ?></i>
					</a></li>
					<li role="separator" class="divider"></li>
					<li><a href="logout.php">
						<i class="fa fa-lock">  &nbsp; <?php echo $_SESSION['Logout']; ?></i>
						</a></li>	
				</ul>
			</li>
		</ul> 
	</div><!-- Stop div2 -->
</div><!-- Stop div1 -->
</nav><!-- Stop nav -->
<!-- END navbar -->
