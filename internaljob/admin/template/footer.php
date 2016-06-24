	</div><!-- Stop wrap-->

		<footer id="footer"><!--footer -->
		 <div class="container" align="center">
			<div class="row">
			<br/>	
				<div class="col-md-3">
					<?php //include('views/note.php'); ?>
				</div>				

				<div class="col-md-6">
					<p> 
						<i class="fa fa-at"><?php echo $_SESSION['Company_Name']; ?></i> | <i class="fa fa-hashtag">
							<?php 
								$AdminName = $_SESSION['first'].' '.$_SESSION['last'];
								echo $AdminName; 
							?>
						</i>
						<img class="img-circle avatar_nav" src="../uploads/<?php echo $_SESSION['avatar']; ?>">
					</p>
				</div>

				<div class="col-md-3">
					<strong><?php echo date('l jS \of F Y'); ?> </strong>
				</div>
			</div>
		 </div>
		</footer><!-- END footer -->

	<?php if($debug == 1) { include('widgets/debug.php'); } ?>

</body><!-- Stop body-->
</html>