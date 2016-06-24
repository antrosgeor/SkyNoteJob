
<!--Start Modal dashboard -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" align="center">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Member user</h4>
      </div>
      <div class="modal-body" align="center">
       	<?php  if($_SESSION['avatar'] != "") { ?>
			<img class="img-rounded avatar" src="../uploads_member/<?php echo $_SESSION['avatar']; ?>">
		<?php } else { ?>
			<img class="img-rounded avatar" src="../images/no_avatar.png">
		<?php } ?>
        <address>
	        <strong>Name : </strong> <?php echo "$AdminName"; ?> <br/>
			<strong>Email : </strong><a href="mailto:<?php echo $_SESSION['username']; ?>"> <?php echo $_SESSION['username']; ?></a> <br/>
			<strong>Status : <?php if($_SESSION['status'] == 1) {echo "Active";} else {echo "InActive";}  ?> </strong> <br/>
			
			<strong>Jobs : <?php 
				$type_job = $_SESSION['type_job'];
				$q = "SELECT * FROM type_job WHERE id = '$type_job'";
				$r = mysqli_query($dbc,$q);
				$type = mysqli_fetch_assoc($r);
				echo $type['name_job'];  ?> 
			</strong>
		</address>
		<address>
		  <abbr title="Mobile Phone"><strong>Mobile Phome</abbr> : </strong>
		  <?php if ($_SESSION['mphone'] != "") { echo $_SESSION['mphone']; } 
		  		else { echo "Null"; } ?> <br/>
		  <abbr title="Word Phone"><strong>Word Phone</abbr> : </strong>
		  <?php if ($_SESSION['wphone'] != "") { echo $_SESSION['wphone']; }
		  		else { echo "Null"; } ?> <br/><br/>
		  <abbr title="Address"><strong>Address</abbr> : </strong>
		  <?php if ($_SESSION['address'] != "") { echo $_SESSION['address']; }
		  		else { echo "Null"; } ?> <br/>
		</address>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#changes_my">Go to changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Stop Modal dashboard -->


<!-- Start modal list form  -->
<div class="modal fade" id="changes_my" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"> Change my Profile  <?php echo $_SESSION['first'].' '.$_SESSION['last']; if($_SESSION['avatar'] != "") { ?>
          <img class="img-circle avatar_nav" src="../uploads_member/<?php echo $_SESSION['avatar']; ?>">
          <?php } else { ?>
          <img class="img-circle avatar_nav" src="../images/no_avatar.png">
          <?php  } ?></i></h4>
      </div>
      <div class="modal-body">
        <form action="index.php?page=members" enctype='multipart/form-data' method="post" role="form">
          <blockquote>
          <div class="form-group">
          <label>
            <p><i>Change Profile</i></p>
            <br/>
            </label>
          <br/>
            <label for="first" class="control-label">First Name :</label>
            <input type="text" class="form-control" id="first" name="first" placeholder="First Name" value="<?php echo $_SESSION['first']; ?>">
          <br/>
            <label for="last" class="control-label">Last Name :</label>
            <input type="text" class="form-control" id="last" name="last" placeholder="Last Name" value="<?php echo $_SESSION['last']; ?>">
          <br/>
            <label for="email" class="control-label">Email :</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="<?php echo $_SESSION['username']; ?>">
           <br/>
            <label for="address" class="control-label">Home Address :</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Home Address" value="<?php echo $_SESSION['address']; ?>">
          <br/>
            <label for="wphone" class="control-label">Home Phone Number :</label>
            <input type="tel" maxlength="10" class="form-control" id="wphone" name="wphone" placeholder="Home Phone Number" value="<?php echo $_SESSION['wphone']; ?>">
          <br/>
            <label for="mphone" class="control-label">Mobile Phone :</label>
            <input type="tel" maxlength="10" class="form-control" id="mphone" name="mphone" placeholder="Mobile Phone" value="<?php echo $_SESSION['mphone']; ?>">
           <br/>
          <label for="upload" class="control-label">Image Avatar :</label><br/>
          <input type="file" name="upload" id="upload">
          <br/>
          <footer>After Change you have to Logout and Login Again </footer>
          </div>
    <br/>
           </blockquote>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default active" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary active" name="changes_my">Change</button>
            <input type="hidden" name="changes_my" value="9">
      </div>
</form>
    </div>
  </div>
</div>
<!-- Stop modal list form  -->




<!-- Start modal list form  -->
<div class="modal fade" id="PlusContact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"> New Contact from <?php echo $_SESSION['first'].' '.$_SESSION['last']; if($_SESSION['avatar'] != "") { ?>
          <img class="img-circle avatar_nav" src="../uploads_member/<?php echo $_SESSION['avatar']; ?>">
          <?php } else { ?>
          <img class="img-circle avatar_nav" src="../images/no_avatar.png">
          <?php  } ?></i></h4>
      </div>
      <div class="modal-body">
        <form action="index.php?page=members" enctype='multipart/form-data' method="post" role="form">
          <blockquote>
          <div class="form-group">
          <label>
            <p><i>Create contact</i></p>
            <footer>the data you enter in this contact will have access <cite title="<?php echo $_SESSION['first'].' '.$_SESSION['last']; ?>">to only you</cite></footer>
				    <br/>
          	</label>
          <br/>
            <label for="first" class="control-label">First Name :</label>
            <input type="text" class="form-control" id="first" name="first" placeholder="First Name">
          <br/>
            <label for="last" class="control-label">Last Name :</label>
            <input type="text" class="form-control" id="last" name="last" placeholder="Last Name">
          <br/>
            <label for="email" class="control-label">Email :</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
          <br/>
            <label for="address" class="control-label">Home Address :</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Home Address">
          <br/>
            <label for="wphone" class="control-label">Home Phone Number :</label>
            <input type="tel" maxlength="10" class="form-control" id="wphone" name="wphone" placeholder="Home Phone Number">
          <br/>
            <label for="mphone" class="control-label">Mobile Phone :</label>
            <input type="tel" maxlength="10" class="form-control" id="mphone" name="mphone" placeholder="Mobile Phone">
           <br/>
          <label for="upload" class="control-label">Image Avatar :</label><br/>
          <input type="file" name="upload" id="upload">
          <br/>
            <label for="note-text" class="control-label">Note for this Contact :</label>
            <textarea class="form-control" id="note-text" name="note-text"></textarea>
          </div>
    <br/>
           </blockquote>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default active" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary active" name="contactplus">Save</button>
            <input type="hidden" name="contactplus" value="3">
      </div>
</form>
    </div>
  </div>
</div>
<!-- Stop modal list form  -->


<!--Start ContactModal View -->
<center>
<div class="modal fade" id="ContactModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">My Contact</h4>
      </div>
      <div class="modal-body"> 
       <?php  if($opened_contact['avatar'] != "") { ?>
      <img class="img-rounded avatar" src="../uploads_contact/<?php echo $opened_contact['avatar']; ?>">
    <?php } else { ?>
      <img class="img-rounded avatar" src="../images/no_avatar.png">
    <?php } ?>
        <p>Name : <?php echo $opened_contact['first'].' '.$opened_contact['last']; ?> </p>
    <address>
      <strong>Email</strong><a href="mailto:<?php echo $opened_contact['email']; ?>"> <?php echo $opened_contact['email']; ?></a><br/>
    </address>          
    <address>
    <strong><abbr title="Address">Address :</abbr></strong> <?php echo $opened_contact['address']; ?> <br/>
    <strong><abbr title="Mobile Phone">Mobile Phome:</abbr></strong> <?php echo $opened_contact['mphone']; ?> <br/>
    <strong><abbr title="Word Phone">Word Phone :</abbr></strong> <?php echo $opened_contact['wphone']; ?> <br/>
    </address>
    <strong><p title="Word Phone">Note for This Person :</p><br/></strong> <?php echo $opened_contact['note']; ?> <br/>
    
    </div>
    <!-- edo tha valoume ena elexo gia to an exei idi social. -->
    <?php
      $social_list = $opened_contact['id'];
      $q = "SELECT * FROM social WHERE id_contact = '$social_list'";
      $r = mysqli_query($dbc, $q);
      $list_social = mysqli_fetch_assoc($r);

      if ($list_social != "") { ?>
      <center><div>
  <?php if ($list_social['bebo'] != "") { ?>
      <a href="<?php echo $list_social['bebo']; ?>" target="_blank">
        <img class="img-circle icon" title="Belo" src="../images/social/bebo.png">
      </a>
  <?php } if ($list_social['classmates'] != "") { ?>
      <a href="<?php echo $list_social['classmates']; ?>" target="_blank">
        <img class="img-circle icon" title="Classmates" src="../images/social/classmates.png">
      </a>
  <?php } if ($list_social['facebook'] != "") { ?>
      <a href="<?php echo $list_social['facebook']; ?>" target="_blank">
        <img class="img-circle icon" title="Facebook" src="../images/social/facebook.png">
      </a>
  <?php } if ($list_social['friendster'] != "") { ?>
      <a href="<?php echo $list_social['friendster']; ?>" target="_blank">
        <img class="img-circle icon" title="Friendster" src="../images/social/friendster.png">
      </a>
  <?php } if ($list_social['google'] != "") { ?>
      <a href="<?php echo $list_social['google']; ?>" target="_blank">
        <img class="img-circle icon" title="Google+" src="../images/social/google_plus.png">
      </a>
  <?php } if ($list_social['instagram'] != "") { ?>
      <a href="<?php echo $list_social['instagram']; ?>" target="_blank">
        <img class="img-circle icon" title="Instagram" src="../images/social/instagram.png">
      </a>
  <?php } if ($list_social['linkedin'] != "") { ?>
      <a href="<?php echo $list_social['linkedin']; ?>" target="_blank">
        <img class="img-circle icon" title="LinkedIn" src="../images/social/linkedin.png">
      </a>
  <?php } if ($list_social['myspace'] != "") { ?>
      <a href="<?php echo $list_social['myspace']; ?>" target="_blank">
        <img class="img-circle icon" title="MySpace" src="../images/social/myspace.png">
      </a>
  <?php } if ($list_social['orkut'] != "") { ?>
      <a href="<?php echo $list_social['orkut']; ?>" target="_blank">
        <img class="img-circle icon" title="Orkut" src="../images/social/orkut.png">
      </a>
  <?php } if ($list_social['pinterest'] != "") { ?>
      <a href="<?php echo $list_social['pinterest']; ?>" target="_blank">
        <img class="img-circle icon" title="Pinterest" src="../images/social/pinterest.png">
      </a>
  <?php } if ($list_social['skype'] != "") { ?>
      <a href="<?php echo $list_social['skype']; ?>" target="_blank">
        <img class="img-circle icon" title="Skype" src="../images/social/skype.png">
      </a>
  <?php } if ($list_social['stumbleupon'] != "") { ?>
      <a href="<?php echo $list_social['stumbleupon']; ?>" target="_blank">
        <img class="img-circle icon" title="Stumbleupon" src="../images/social/stumbleupon.png">
      </a>
  <?php } if ($list_social['twitter'] != "") { ?>
      <a href="<?php echo $list_social['twitter']; ?>" target="_blank">
        <img class="img-circle icon" title="Twitter" src="../images/social/twitter.png">
      </a>
  <?php } if ($list_social['youtube'] != "") { ?>
      <a href="<?php echo $list_social['youtube']; ?>" target="_blank">
        <img class="img-circle icon" title="Youtube" src="../images/social/youtube.png">
      </a>
  <?php } ?>

      </div></center>
    <!-- prepi na mpi olo se ena social...  -->
   <?php  }?>

      <div class="modal-footer">
<a href="?page=members" id="del_<?php echo $opened_contact['id']; ?>" class="btn btn-danger btn-delete-contact">
          <i class="fa fa-trash-o"></i>
        </a>

        <button type="button" class="btn btn-default active" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary active" data-toggle="modal" data-target="#socialContact">Add Social Netword</button>
      </div>
    </div>
  </div>
</div>
</center>
<!--Stop ContactModal View -->


<!--Start modal socialContact form  -->
<div class="modal fade" id="socialContact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"> Add social network for <?php $_SESSION['social_id'] = $opened_contact['id'];  echo $opened_contact['first'].' '.$opened_contact['last']; if($opened_contact['avatar'] != "") { ?>
          <img class="img-circle avatar_nav" src="../uploads_contact/<?php echo $opened_contact['avatar']; ?>">
          <?php } else { ?>
          <img class="img-circle avatar_nav" src="../images/no_avatar.png">
          <?php  } ?></i></h4>
      </div>
      <div class="modal-body">
        <form action="index.php?page=members" method="post" role="form">
          <blockquote>
          <div class="form-group">
            <label for="Bebo" class="control-label" title="http://www.bebo.com/">Bebo :</label>
            <input type="url" title="http://www.bebo.com/" class="form-control" id="Bebo" name="Bebo" placeholder="Bebo URL">
          <br/>
            <label for="Classmates" class="control-label" title="http://www.classmates.com/ "
>Classmates :</label>
            <input type="url" class="form-control" title="http://www.classmates.com/ "
 id="Classmates" name="Classmates" placeholder="Classmates URL">
          <br/>
            <label for="Facebook" class="control-label" title="http://www.facebook.com/"
>Facebook :</label>
            <input type="url" class="form-control" title="http://www.facebook.com/"
 id="Facebook" name="Facebook" placeholder="Facebook URL">
          <br/>
            <label for="Friendster" class="control-label" title="http://www.friendster.com/"
>Friendster :</label>
            <input type="url" class="form-control" title="http://www.friendster.com/"
 id="Friendster" name="Friendster" placeholder="Friendster URL">
          <br/>
            <label for="Google" class="control-label" title="http://plus.google.com/"
>Google+ :</label>
            <input type="url" class="form-control" title="http://plus.google.com/"
 id="Google" name="Google" placeholder="Google+ URL">
          <br/>
            <label for="LinkedIn" class="control-label" title="http://www.linkedin.com/"
>LinkedIn :</label>
            <input type="url" class="form-control" title="http://www.linkedin.com/"
 id="LinkedIn" name="LinkedIn" placeholder="LinkedIn URL">
          <br/>
            <label for="MySpace" class="control-label" title="http://www.myspace.com/"
>MySpace :</label>
            <input type="url" class="form-control" title="http://www.myspace.com/"
 id="MySpace" name="MySpace" placeholder="MySpace URL">
          <br/>
            <label for="Orkut" class="control-label" title="http://www.orkut.com/"
>Orkut :</label>
            <input type="url" class="form-control" title="http://www.orkut.com/"
 id="Orkut" name="Orkut" placeholder="Orkut URL">
          <br/>
            <label for="Instagram" class="control-label" title="http://instagram.com/"
>Instagram :</label>
            <input type="url" class="form-control" title="http://instagram.com/"
 id="Instagram" name="Instagram" placeholder="Instagram URL">
          <br/>
            <label for="Pinterest" class="control-label" title="http://www.pinterest.com/"
>Pinterest :</label>
            <input type="url" class="form-control" title="http://www.pinterest.com/"
 id="Pinterest" name="Pinterest" placeholder="Pinterest URL">
          <br/>
            <label for="StumbleUpon" class="control-label" title="http://www.stumbleupon.com/"
>StumbleUpon :</label>
            <input type="url" class="form-control" title="http://www.stumbleupon.com/"
 id="StumbleUpon" name="StumbleUpon" placeholder="StumbleUpon URL">
          <br/>
            <label for="Twitter" class="control-label" title="http://www.twitter.com/"
>Twitter :</label>
            <input type="url" class="form-control" title="http://www.twitter.com/" id="Twitter" name="Twitter" placeholder="Twitter URL">
          <br/>
            <label for="Skype" class="control-label" title="http://www.skype.com/">Skype :</label>
            <input type="url" class="form-control" title="http://www.skype.com/" id="Skype" name="Skype" placeholder="Skype URL">
          <br/>
            <label for="YouTube" class="control-label" title="http://www.youtube.com/"
>YouTube :</label>
            <input type="url"  class="form-control" title="http://www.youtube.com/"
 id="YouTube" name="YouTube" placeholder="YouTube URL">   
        </div>
      </blockquote>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default active" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary active" name="social">Save</button>
            <input type="hidden" name="social" value="4">
      </div>
</form>
    </div>
  </div>
</div>
<!--Stop modal socialContact form  -->




<!--Start AdminModal -->
<center>
<div class="modal fade" id="AdminModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Admin Member</h4>
      </div>
      <div class="modal-body"> 
       <?php  if($opened_admin['avatar'] != "") { ?>
			<img class="img-rounded avatar" src="../uploads/<?php echo $opened_admin['avatar']; ?>">
		<?php } else { ?>
			<img class="img-rounded avatar" src="../images/no_avatar.png">
		<?php } ?>
        <p>Name : <?php echo $opened_admin['first'].' '.$opened_admin['last']; ?> </p>
		<address>
		  <strong>Email</strong><a href="mailto:<?php echo $opened_admin['email']; ?>"> <?php echo $opened_admin['email']; ?></a><br/>
		  <strong>Status : <?php if($opened_admin['status'] == 1) {echo "Active";} else {echo "InActive";}  ?> </strong>

		</address>          
		<address>
		  <abbr title="Mobile Phone">Mobile Phome:</abbr> (0030) 69- NuLL <br/>
		  <abbr title="Word Phone">Word Phone  :</abbr> (0030) NuLL <br/>
		</address>

		</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default active" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary active" data-toggle="modal" data-target="#contact_admin_Modal">Send Mail</button>
      </div>
    </div>
  </div>
</div>
</center>
<!--Stop AdminModal -->


<!--Start  modal list form  -->
<div class="modal fade" id="contact_admin_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
      </div>
      <div class="modal-body">
      <form action="index.php?page=members" enctype='multipart/form-data' method="post" role="form">
          <div class="form-group">
          <?php $_SESSION['modal_send'] = $opened_admin['id']; ?>
          <label for="recipient-name" class="control-label" id="sent_to" name="sent_to" value="<?php echo $_SESSION['modal_send']; ?>" >
	      		Send Message to <?php if($opened_admin['avatar'] != "") { ?>
						<img class="img-circle avatar_nav" src="../uploads/<?php echo $opened_admin['avatar']; ?>">
						<?php } else { ?>
						<img class="img-circle avatar_nav" src="../images/no_avatar.png">
						<?php  } ?> <?php echo $opened_admin['first'].' '.$opened_admin['last']; ?>
				<br/>
          	</label>
          	<br/>
            <label for="recipient-name" class="control-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name" name="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Message:</label>
            <textarea class="form-control" id="message-text" name="message-text"></textarea>
          </div>
        <div class="form-group">
          <label class="list-group-item" for="upload">File input</label>
          <input class="btn btn-warning" type="file" id="upload" name="upload">
          <p class="help-block">Example block-level help text here.</p>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default active" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary active">Send message</button>
            <input type="hidden" name="submitted_admin" value="1">
      </div>
</form>
    </div>
  </div>
</div>
<!--Stop  modal list form  -->


<!-- Start MemberModal -->
<center>
<div class="modal fade" id="MemberModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Company Member</h4>
      </div>
      <div class="modal-body"> 
       <?php  if($opened_member['avatar'] != "") { ?>
			<img class="img-rounded avatar" src="../uploads_member/<?php echo $opened_member['avatar']; ?>">
		<?php } else { ?>
			<img class="img-rounded avatar" src="../images/no_avatar.png">
		<?php } ?>
        <p>Name : <?php echo $opened_member['first'].' '.$opened_member['last']; ?> </p>
		<address>
		  <strong>Email</strong><a href="mailto:<?php echo $opened_member['email']; ?>"> <?php echo $opened_member['email']; ?></a><br/>
		  <strong>Job</strong> : 
      <?php 
          $type_job_member = $opened_member['type_job'];
          $q = "SELECT * FROM type_job WHERE id = '$type_job_member' ";
          $r = mysqli_query($dbc, $q);
          $job_member = mysqli_fetch_assoc($r); 

          echo $job_member['name_job']; 
      ?> 
		</address>          
		<address>
    <strong><abbr title="Address">Address :</abbr></strong> <?php echo $opened_member['address']; ?> <br/>
		<strong><abbr title="Mobile Phone">Mobile Phome:</abbr></strong> <?php echo $opened_member['mphone']; ?> <br/>
		<strong><abbr title="Word Phone">Word Phone :</abbr></strong> <?php echo $opened_member['wphone']; ?> <br/>
		</address>

		</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default active" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary active" data-toggle="modal" data-target="#contact_Member_Modal">Send Mail</button>
      </div>
    </div>
  </div>
</div>
</center>
<!-- Stop MemberModal -->


<!-- Start contact_Member_Modal list form  -->
<div class="modal fade" id="contact_Member_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
      </div>
      <div class="modal-body">
      <form action="index.php?page=members" enctype='multipart/form-data' method="post" role="form">
          <div class="form-group">
          <?php $_SESSION['modal_send_member'] = $opened_member['id']; ?>
          <label for="recipient-name" class="control-label" id="sent_to" name="sent_to" value="<?php echo $_SESSION['modal_send_member']; ?>" >
	      		Send Message to <?php if($opened_member['avatar'] != "") { ?>
						<img class="img-circle avatar_nav" src="../uploads_member/<?php echo $opened_member['avatar']; ?>">
						<?php } else { ?>
						<img class="img-circle avatar_nav" src="../images/no_avatar.png">
						<?php  } ?> <?php echo $opened_member['first'].' '.$opened_member['last']; ?>
				<br/>
          	</label>
          	<br/>
            <label for="recipient-name" class="control-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name" name="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Message:</label>
            <textarea class="form-control" id="message-text" name="message-text"></textarea>
          </div>

        <div class="form-group">
          <label class="list-group-item" for="upload">File input</label>
          <input class="btn btn-warning" type="file" id="upload" name="upload">
          <p class="help-block">Example block-level help text here.</p>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default active" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary active">Send message</button>
            <input type="hidden" name="submitted_member" value="1">
      </div>    
</form>
    </div>
  </div>
</div>
<!-- Stop contact_Member_Modal list form  -->


<!--Start  view_anser-->
   <div class="modal fade" id="view_anser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">New message</h4>
          </div>
          <div class="modal-body">

<form action="index.php?page=view_message" enctype='multipart/form-data' method="post" role="form">
              <div class="form-group">
                <label for="recipient-name" class="control-label" id="sent_to" name="sent_to" value="<?php echo $_SESSION['from_id'] ?>" > 
                    Send to 
                <?php if ($from['avatar'] != "") { ?>
                  <img data-toggle="modal" data-target="#myModal"  class="img-circle avatar_nav" src="../uploads/<?php echo $from['avatar']; ?>">
                <?php } else { ?>
                  <img data-toggle="modal" data-target="#myModal"  class="img-circle avatar_nav" src="../images/no_avatar.png">
                <?php } ?>
                <?php echo $from['first'].' '.$from['last']; ?>
                </label>
                <label for="recipient-name" class="control-label" id="sent_to_type" name="sent_to_type" value="<?php echo $_SESSION['from_view']  ?>"></label>
              </div>

              <div class="form-group">
                <label for="recipient-name" class="control-label">Recipient:</label>
                <input type="text" class="form-control" id="recipient-name" name="recipient-name">
              </div>
              <div class="form-group">
                <label for="message-text" class="control-label">Message:</label>
                <textarea class="form-control" id="message-text" name="message-text"></textarea>
              </div>

            <div class="form-group">
              <label class="list-group-item" for="upload">File input</label>
              <input class="btn btn-warning" type="file" id="upload" name="upload">
              <p class="help-block">Example block-level help text here.</p>
            </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Send message</button>
            <input type="hidden" name="submitted" value="1">
          </div>
</form>
          </div>
        </div>
      </div>
    </div>
<!--Stop  view_anser-->


<!-- Start Modal view_sow -->
<div align="center"><!-- Start align="center" -->
<div class="modal fade" id="view_sow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       <?php if($_SESSION['from_view'] == "1") { ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Admin Users</h4>
        </div>
        <div class="modal-body">
      <?php if ($from['avatar'] != "") { ?>
                  <img class="img-rounded avatar" src="../uploads/<?php echo $from['avatar']; ?>">
                <?php } else { ?>
                  <img class="img-rounded avatar" src="../images/no_avatar.png">
                <?php } ?>
        <p>Name : <?php echo $from['first'].' '.$from['last']; ?> </p>
        <address>
          <strong>Email</strong><a href="mailto:<?php echo $from['email']; ?>"> <?php echo $from['email']; ?></a><br/>
          <strong>Status : <?php if($from['status'] == 1) {echo "Active";} else {echo "InActive";}  ?> </strong>
        </address>          
        
        <address>
          <abbr title="Mobile Phone">Mobile Phome:</abbr>(0030) 69- <br/>
          <abbr title="Word Phone">Word Phone  :</abbr> (0030) <br/>
        </address>

      <?php } else { ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Member Users</h4>
        </div>
        <div class="modal-body">
       <?php if ($from['avatar'] != "") { ?>
                  <img class="img-rounded avatar" src="../uploads/<?php echo $from['avatar']; ?>">
                <?php } else { ?>
                  <img class="img-rounded avatar" src="../images/no_avatar.png">
                <?php } ?>
        <p>Name : <?php echo $from['first'].' '.$from['last']; ?> </p>
        <address>
          <strong>Email</strong><a href="mailto:<?php echo $from['email']; ?>"> <?php echo $from['email']; ?></a><br/>
          <strong>Job : <?php echo $from['type_job']; ?> </strong>
          <strong>Status : <?php if($from['status'] == 1) {echo "Active";} else {echo "InActive";}  ?> </strong>
        </address>          

        <address>
          <abbr title="Adderss">Address  :</abbr> (0030) <?php echo $from['address']; ?><br/>
          <abbr title="Mobile Phone">Mobile Phome:</abbr>(0030) <?php echo $from['mphone']; ?><br/>
          <abbr title="Word Phone">Word Phone  :</abbr> (0030) <?php echo $from['wphone']; ?><br/>
        </address>

    <?php } ?>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div><!-- Stop class="modal-dialog" role="document" -->
</div><!-- Stop align="center" -->
</div><!-- Stop Modal view_sow -->


<!-- Start Modal -->
<div align="center"><!-- Start align="center" -->
<div class="modal fade" id="newsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document"><!-- Start class="modal-dialog" role="document" -->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Admin Users</h4>
        </div>
        <div class="modal-body">
    <?php if ($user_news['avatar'] != "") { ?> 
        <img class="img-rounded avatar" src="../uploads/<?php echo $user_news['avatar']; ?>">
    <?php } else { ?>
      <img class="img-rounded avatar" src="../images/no_avatar.png">
    <?php } ?>
        <p>Name : <?php echo $user_news['first'].' '.$user_news['last']; ?> </p>
        <address>
          <strong>Email</strong><a href="mailto:<?php echo $user_news['email']; ?>"> <?php echo $user_news['email']; ?></a><br/>
        </address>          
        
        <address>
          <abbr title="Mobile Phone">Mobile Phome:</abbr>(0030) 69- <br/>
          <abbr title="Word Phone">Word Phone  :</abbr> (0030) <br/>
        </address>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div><!-- Stop class="modal-dialog" role="document" -->
</div><!-- Stop align="center" -->
</div><!-- Stop Modal -->


<!-- Start Modal -->
<div align="center"><!-- Start align="center" -->
<div class="modal fade" id="pagesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document"><!-- Start class="modal-dialog" role="document" -->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Admin Users</h4>
        </div>
        <div class="modal-body">
    <?php if ($user_pages['avatar'] != "") { ?> 
        <img class="img-rounded avatar" src="../uploads/<?php echo $user_pages['avatar']; ?>">
    <?php } else { ?>
      <img class="img-rounded avatar" src="../images/no_avatar.png">
    <?php } ?>
        <p>Name : <?php echo $user_pages['first'].' '.$user_pages['last']; ?> </p>
        <address>
          <strong>Email</strong><a href="mailto:<?php echo $user_pages['email']; ?>"> <?php echo $user_pages['email']; ?></a><br/>
        </address>          
        
        <address>
          <abbr title="Mobile Phone">Mobile Phome:</abbr>(0030) 69- <br/>
          <abbr title="Word Phone">Word Phone  :</abbr> (0030) <br/>
        </address>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div><!-- Stop class="modal-dialog" role="document" -->
</div><!-- Stop align="center" -->
</div><!-- Stop Modal -->





<!-- Start modal NotesPlus form  -->
<div class="modal fade" id="NotesPlus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"> New Note</i></h4>
      </div>
      <div class="modal-body">
        <form action="index.php?page=notes" method="post" role="form">
        <blockquote>
          <div class="form-group">
          <label>
            <p><i>Create notes for you</i> <footer><?php echo get_date(); ?></footer></p>
          </label>
            <br/>
          <label for="lever" class="control-label">Lever Note :</label>
            <select class="form-control" name="lever" id="lever">
                <option value = "Emergency">Emergency</option>
                <option value = "Important">Important</option>
                <option value = "Regular" selected="">Regular</option>
                <option value = "Reminder">Reminder</option>
            </select>
          <br/>
            <label for="color" class="control-label">Color for this Note :</label><br/>
            
            <div class="col-lg-8">
              <div class="input-group">
                <span class="input-group-addon btn-success">
                  <input type="radio" name="color" aria-label="..." value="success" checked="checked">
                </span>
                <span class="input-group-addon btn-info">
                  <input type="radio" name="color" aria-label="..." value="info">
                </span>
                <span class="input-group-addon btn-warning" >
                  <input type="radio" name="color" aria-label="..." value="warning">
                </span>
                <span class="input-group-addon btn-danger" >
                  <input type="radio" name="color" aria-label="..." value="danger">
                </span>
              </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->

          <br/><br/>
            <label for="title" class="control-label">Title :</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Title Note">
          <br/>
            <label for="body" class="control-label">Body :</label>
                <textarea class="form-control editor" type="text" name="body" id="body" rows="8" placeholder="Page Body"></textarea>
          <br/>
        </blockquote>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default active" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary active">Save</button>
            <input type="hidden" name="notesplus" value="1">
      </div>
</form>
    </div>
  </div>
</div>
<!-- Stop modal NotesPlus form  -->


<!--Start AdminModal -->
<center>
<div class="modal fade" id="noteshow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?php 
        $note = $_SESSION['note'];
        $q = "SELECT * FROM notes WHERE id = '$note'";
        $r = mysqli_query($dbc, $q);
        $notes = mysqli_fetch_assoc($r);
    ?>
        <h4 class="modal-title" id="myModalLabel"><?php echo  $notes['title']; ?></h4>
      </div>
      <div class="modal-body"> 


    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default active" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary active" data-toggle="modal" data-target="#contact_admin_Modal">Send Mail</button>
      </div>
    </div>
  </div>
</div>
</center>
<!--Stop AdminModal -->


<!-- Start modal NotesPlus form  -->
<div class="modal fade" id="rememberPlus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"> New Remember</i></h4>
      </div>
      <div class="modal-body">
        <form action="index.php?page=remember" method="post" role="form">
        <blockquote>
          <div class="form-group">
          <label>
            <center><i>Create Remember for You and your Partners</i></center>
          </label>
            <br/>
          <label for="lever" class="control-label">Lever Remember :</label>
            <select class="form-control" name="lever" id="lever">
                <option value = "Emergency">Emergency</option>
                <option value = "Important">Important</option>
                <option value = "Regular" selected="">Regular</option>
                <option value = "Reminder">Reminder</option>
            </select>
          <br/>

            <label for="color" class="control-label">Color for this Remember :</label><br/>
            <div class="col-lg-8">
              <div class="input-group">
                <span class="input-group-addon btn-success">
                  <input type="radio" name="color" aria-label="..." value="success" checked="checked">
                </span>
                <span class="input-group-addon btn-info">
                  <input type="radio" name="color" aria-label="..." value="info">
                </span>
                <span class="input-group-addon btn-warning" >
                  <input type="radio" name="color" aria-label="..." value="warning">
                </span>
                <span class="input-group-addon btn-danger" >
                  <input type="radio" name="color" aria-label="..." value="danger">
                </span>
              </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->

          <br/><br/>
            <label for="title" class="control-label">Title :</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Title Note">
          <br/>
            <label for="message" class="control-label">Message :</label>
                <textarea class="form-control editor" type="text" name="message" id="message" rows="8" placeholder="Message"></textarea>
          <br/>

           <label for="color" class="control-label">Actions for this Remember :</label><br/>
            <div class="col-lg-8">
              <div class="input-group">
                <span class="input-group-addon">
                  <input type="radio" name="action" value="Reminder" checked="checked"> <strong>Reminder</strong>
                </span>
                <span class="input-group-addon">
                  <input type="radio" name="action" value="To Do"> <strong>To Do</strong>
                </span>
                <span class="input-group-addon">
                  <input type="radio" name="action" value="Doing"> <strong>Doing</strong>
                </span>
                <span class="input-group-addon">
                  <input type="radio" name="action" value="Done"> <strong>Done</strong>
                </span>
                </div>
                <div class="input-group">
                <span class="input-group-addon">
                  <input type="radio" name="action" value="others"> <strong>OR</strong> add action
                </span>
                <input type="text" name="radio_name" class="form-control">
              </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
        </blockquote>

          <br/><br/>
            <label for="title" class="control-label" for="id_second">Send this Remember to :</label>
            <select class="form-control" name="second" id="second">
              <option value = "0" >No Member</option>
                <?php 
                  $q = "SELECT id FROM member ORDER BY first ASC";
                  $r = mysqli_query($dbc,$q);

                  while ($user_list = mysqli_fetch_assoc($r)) { 
                    $member = data_member($dbc,$user_list['id']);  
                ?>
                  <option value = "<?php echo $member['id'];?>">
                    <?php echo $member['fullname']; ?>
                  </option>
              <?php } ?>
            </select>
          
          <br/>
            <strong> Date: </strong><input type="date" name="date" id="field1"/> 
            &nbsp;&nbsp;&nbsp;&nbsp; 
            <strong> Time: </strong><input type="time" name="time" id="field5"/>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default active" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary active">Save</button>
            <input type="hidden" name="rememberPlus" value="1">
      </div>
</form>
    </div>
  </div>
</div>
<!-- Stop modal NotesPlus form  -->

<!-- Remember now -->
<div class="modal fade" id="remember_now" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 align="center" class="modal-title" id="myModalLabel"><i class="fa fa-flag"> Remember Now !</i></h3>
      </div>
      <div class="modal-body">
      <h4 align="center"> <strong> <?php echo $today_remember_title; ?></strong></h4>
      <br/>
      
      <p align="right"> <i class="fa fa-calendar" aria-hidden="true"> &nbsp;&nbsp;&nbsp; Date to write : <?php echo $today_remember_date_write; ?> </i></p>
       </p>
      <br/><br/>
     
     <strong><p>&nbsp;&nbsp;<?php echo $today_remember_message; ?></p></strong>
     <br/><br/>
     <p align="center">
    <i class="fa fa-calendar" aria-hidden="true">&nbsp;&nbsp;&nbsp; Date : <?php echo $today_remember_date; ?></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    <i class="fa fa-clock-o" aria-hidden="true">&nbsp;&nbsp;&nbsp; Time : <?php echo $today_remember_time; ?> </i>
    </p>
     <br/>
    <p align="center">
    <i class="fa fa-thumb-tack" aria-hidden="true"> &nbsp;&nbsp;&nbsp; Lever : <?php echo $today_remember_lever; ?> </i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <i class="fa fa-check-square-o" aria-hidden="true" > &nbsp;&nbsp;&nbsp; Action : <?php echo $today_remember_action; ?> </i>
    </p> 
    <br/>
    <?php if(($today_remember_id_second != $today_remember_id_member) AND ($today_remember_id_second != 0)){ ?>
    <i class="fa fa-user-plus" aria-hidden="true"> &nbsp;&nbsp;&nbsp; Others member : <?php echo $today_remember_members_add; ?> </i>
    <?php } ?>

        </div>
      <div class="modal-footer">
      <p align="center">comment <?php echo $today_remember_commment; ?></p> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>