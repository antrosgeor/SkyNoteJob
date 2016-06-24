<!-- Start myModal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" align="center">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $_SESSION['Admin']; ?></h4>
      </div>
      <div class="modal-body">
        <img class="img-rounded avatar" src="../uploads/<?php echo $_SESSION['avatar']; ?>">
        <p><?php echo $_SESSION['Value_Name']; ?> : <?php echo $AdminName; ?> </p>
		<address>
		  <strong><?php echo $_SESSION['Value_Email']; ?></strong><a href="mailto:<?php echo $_SESSION['username']; ?>"> <?php echo $_SESSION['username']; ?></a><br/>
		  <strong><?php echo $_SESSION['Value_Status']; ?> : <?php if($_SESSION['status'] == 1) {echo "Active";} else {echo "InActive";}  ?> </strong>
		</address>          
		<address>
		  <abbr title="Mobile Phone"><?php echo $_SESSION['Value_Mobile_Phone']; ?></abbr> : (0030) 69- <br/>
		  <abbr title="Word Phone"><?php echo $_SESSION['Value_Word_Phone']; ?></abbr>  : (0030) <br/>
		</address>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $_SESSION['Value_Close']; ?></button>
        <a href="?page=users&id=<?php echo $_SESSION['id']; ?>">
        	<button type="button" class="btn btn-primary"><?php echo $_SESSION['Value_Changes']; ?></button>
        </a>
      </div>
    </div>
  </div>
</div>
<!-- Stop myModal -->


<!-- Start exampleModal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel"><?php echo $_SESSION['Value_New_Message']; ?></h4>
          </div>
          <div class="modal-body">

            <form action="index.php?page=view_message" enctype='multipart/form-data' method="post" role="form">
              <div class="form-group">
                <label for="recipient-name" class="control-label" id="sent_to" name="sent_to" value="<?php echo $_SESSION['from_id'] ?>" > 
                    <?php echo $_SESSION['Value_Send_to']; ?> 
                    <?php if ($from['avatar'] != "") { ?>
                  <img data-toggle="modal" data-target="#myModal"  class="img-circle avatar_nav" src="../uploads/<?php echo $from['avatar']; ?>">
                <?php } else { ?>
                  <img data-toggle="modal" data-target="#myModal"  class="img-circle avatar_nav" src="../images/no_avatar.png">
                <?php } ?>
                        <?php echo $from['first'].' '.$from['last']; ?>
                </label>
                <label for="recipient-name" class="control-label" id="sent_to_type" name="sent_to_type" value="<?php echo $_SESSION['from_view'] ?>"></label>
              </div>

              <div class="form-group">
                <label for="recipient-name" class="control-label"><?php echo $_SESSION['Value_Recipient']; ?> :</label>
                <input type="text" class="form-control" id="recipient-name" name="recipient-name">
              </div>
              <div class="form-group">
                <label for="message-text" class="control-label"><?php echo $_SESSION['Value_Message']; ?>:</label>
                <textarea class="form-control" id="message-text" name="message-text"></textarea>
              </div>
              <div class="form-group">
               <label for="upload" class="control-label"><?php echo $_SESSION['Value_File']; ?> :</label><br/>
                <input type="file" name="upload" id="upload">
              </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $_SESSION['Value_Close']; ?></button>
            <button type="submit" class="btn btn-primary"><?php echo $_SESSION['Value_Send_Message']; ?></button>
            <input type="hidden" name="submitted" value="1">
           
          </div>
                      </form>
          </div>
        </div>
      </div>
    </div>
<!-- Stop exampleModal -->





<!-- Start Modal_message -->
<div align="center"><!-- Start align="center" -->
<div class="modal fade" id="Modal_message" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document"><!-- Start class="modal-dialog" role="document" -->
    <div class="modal-content">
       <?php if($_SESSION['from_view'] == "1") { ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Admin Users</h4>
        </div>
        <div class="modal-body">
       <?php if ($from['avatar'] != "") { ?>
                  <img class="img-rounded avatar_nav" src="../uploads/<?php echo $from['avatar']; ?>">
                <?php } else {?>
                  <img class="img-rounded avatar_nav" src="../images/no_avatar.png">
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
            <img class="img-rounded avatar" src="../uploads_member/<?php echo $from['avatar']; ?>">
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
</div><!-- Stop Modal -->
<!-- Stop Modal_message -->