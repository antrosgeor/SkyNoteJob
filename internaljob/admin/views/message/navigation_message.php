<div class="mail-option"><!-- Start div mail-option-->
  <div class="btn-group"><!-- Start div btn-group -->
    <a data-toggle="dropdown" href="#" class="btn mini all">
        <?php echo $_SESSION['Value_All']; ?> &nbsp;<i class="fa fa-angle-down"></i>
    </a>
    <ul class="dropdown-menu">
          <li><a href="?page=message/messages"> <?php echo $_SESSION['Value_All']; ?></a></li>
          <li><a href="?page=message/messages_read"> <?php echo $_SESSION['Value_Read']; ?></a></li>
          <li><a href="?page=message/messages_unread"> <?php echo $_SESSION['Value_Unread']; ?></a></li>
          <li><a href="?page=message/messages1"> <?php echo $_SESSION['Value_Read-Unread']; ?></a></li>
          <li><a href="?page=message/messages_send"> <?php echo $_SESSION['Value_Send']; ?></a></li>
    </ul>
  </div><!-- Stop div btn-group-->
  <div class="btn-group"><!-- Start div -->
      <a data-toggle="dropdown" href="#" class="btn mini blue">
           <i class="fa fa-angle-down ">
             <?php echo $_SESSION['Value_More']; ?>
           </i>
      </a>
      <ul class="dropdown-menu">
          <li><a href="#"><i class="fa fa-pencil">
            <?php echo $_SESSION['Value_Mark_as_Read']; ?>
            </i></a></li>
          <li><a href="#"><i class="fa fa-ban">
            <?php echo $_SESSION['Value_Spam']; ?>
            </i></a></li>
          <li class="divider"></li>
          <li><a href = "#" id = "delete" ><i class="fa fa-trash-o">
            <?php echo $_SESSION['Value_Delete']; ?>
          </i></a></li>
      </ul>
  </div><!-- Stop div btn-group-->
</div><!-- Stop div mail-option -->