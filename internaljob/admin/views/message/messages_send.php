<?php #Messages
  // gia na mporesi na to diavasi.
  $userid = $_SESSION['id'];

?>
<div class = "container"><!-- Start div container -->
<h1><?php echo $_SESSION['Messages']; ?></h1>  
<br>
  <div class="row"><!-- Start div row -->
  <div class="col-md-12"><!-- Start div md-12 -->

<?php include('navigation_message.php'); ?>
  
<div class="row"><!-- Start div row -->
  <div class="col-md-12"><!-- Start div md-12 -->
  <div class="mail-option"><!-- Start div mail-option -->
  
  <a class="list-group-item list-group-item-success"  href="?page=message/messages">  
    <?php 
      $sql = "SELECT * FROM messages WHERE admin_from = '$userid'";
      $result=mysqli_query($dbc, $sql);
      $row = mysqli_num_rows($result);
    ?> <strong><i><?php echo $_SESSION['Value_Send_Messages']; ?> </i></strong><span class="badge"> <?php echo "$row" ?> </span>
  </a>
  <table class="table table-inbox table-hover">
    <tbody>
    <?php 
        $q = "SELECT * FROM messages WHERE admin_from = '$userid' ORDER BY date DESC";
        $r = mysqli_query($dbc,$q);
        while($list = mysqli_fetch_assoc($r)){ 
    ?> 
    <tr id ="row_<?php echo $list['id']; ?>" style="cursor: pointer" class="<?php echo $list['marked']; ?>">
      <td>
          <input type="checkbox" class="mail-checkbox" value="<?php echo $list['id']; ?>">
      </td>
      <td class='clickable-row' data-href='?page=view_message&id=<?php echo $list['id']; ?>'>
        <?php echo $list['title'] ?>
      </td>
      <td class='clickable-row' data-href='?page=view_message&id=<?php echo $list['id']; ?>'><?php echo substr($list['message'], 0,100); ?>...</td>
      <td class="clickable-row text-right" style="font-weight: normal;" data-href='?page=view_message&id=<?php echo $list['id']; ?>'><?php echo date('dS D F Y', strtotime($list['date'])); ?></td>
  </tr>
  <?php } ?>
      
   </tbody>
</table>

<br><br><br>

</div><!-- Stop div mail-option -->
</div><!-- Stop div md-12 -->
</div><!-- Stop div row -->

</div><!-- Stop div md-12 -->
</div><!-- Stop div row -->
</div><!-- Stop div container -->