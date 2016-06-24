	</div><!-- Stop wrap-->
		
		<footer id="footer"><!--footer -->
		 <div class="container" align="center">
			<div class="row">
				<br/>
				
				<div class="col-md-3">
				<!-- <?php //include('views/note.php'); ?> -->
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#NotesPlus"><i class="fa fa-plus"> Add Note</i></button>
				</div>				

				<div class="col-md-6">
					<p> 
						<i class="fa fa-at"> Company name</i> 
						<i class="fa fa-hashtag">
							<?php 
								$AdminName = $_SESSION['first'].' '.$_SESSION['last'];
								echo $AdminName; 
							?>
						</i>
						<?php if($_SESSION['avatar'] != "") { ?>
					<img class="img-circle avatar_nav" src="../uploads_member/<?php echo $_SESSION['avatar']; ?>">
					<?php } else { ?>
					<img class="img-circle avatar_nav" src="../images/no_avatar.png">
					<?php  } ?>
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