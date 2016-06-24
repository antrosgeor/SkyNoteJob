<?php #for lever
//statheres times

    $zero = " Regular"; // primary => mple 
    $one = " Important"; //danger => kokino
    $two = " Important"; // success => prasino 
    $three = "Update"; // info = > galazio
    $four  = "Report";
    $five = "Warning"; // warning = > portokali
    $six = "Irrelevant"; // Default=> aspro


 ?>

<div class = "container"><!-- Start container -->
<!-- title -->
<h1>View Message</h1>  

    <?php if($_GET[id] == "") {?>
    <div class="row"><!-- Start row -->
      <br/><br/><br/><br/>
          <div class="col-md-2" align="left"><!-- Start md-9 -->
          </div>

          <div class="col-md-8"><!-- Start md-9 -->
            <p class="alert alert-success" align="center">Message Send!</p>
          </div>  
          
          <div class="col-md-2" align="right">             
          </div>
    </div>
    
    <div class="row"><!-- Start row -->
        <br/><br/><br/><br/>

          <div class="col-md-2" align="left"><!-- Start md-9 -->
              <a href="?page=message/messages"><button type="button" class="btn btn-default"><i class="fa fa-reply"></i> Back to Message</button></a>
          </div>
          <div class="col-md-8"><!-- Start md-9 -->
          </div>  
          <div class="col-md-2" align="right">             
              <a href="?page=dashboard"><button type="button" class="btn btn-default"> Go to Dashboard <i class="fa fa-share"></i></button></a>
              </div>
<br/><br/><br/><br/><br/><br/><br/><br/>    
    </div>

    <?php } ?>

<div class="row"><!-- Start row -->
  <div class="col-md-12"><!-- Start md-9 -->
      <?php 

        $q = "SELECT * FROM messages WHERE id ='$_GET[id]'";       
        $r = mysqli_query($dbc, $q);

        while($list = mysqli_fetch_assoc($r)){ 
            
            //lever
            if($list['lever'] == 0) { $lever = $zero; $color = "primary"; $icon = "fa-user-plus";}
            elseif ($list['lever'] == 1) { $lever = $one; $color = "danger"; $icon = "fa-exclamation-triangle";} 
            elseif ($list['lever'] == 2) { $lever = $two; $color = "success"; $icon = "fa-check-square-o";}
            elseif ($list['lever'] == 3) { $lever = $three; $color = "info"; $icon = "fa-info";}
            elseif ($list['lever'] == 4) { $lever = $four; $color = "info"; $icon = "fa-info";}
            elseif ($list['lever'] == 5) { $lever = $five; $color = "warning"; $icon = "fa-bell";}
            elseif ($list['lever'] == 6) { $lever = $six; $color = "default"; $icon = "fa-users";}

        	if ($list['marked']=="unread" && $list['admin_from'] != $_SESSION['id'] ) {
                $q2 = "UPDATE messages SET marked = 'read' WHERE id ='$_GET[id]'";
                $r2 = mysqli_query($dbc,$q2);
         	};

        // otan to stelni o admin 0=NO
            if($list['admin_from'] != 0 && $list['user_from'] == 0){
               
                $adq = "SELECT * FROM admin_user WHERE id = '$list[admin_from]'";       
                $adr = mysqli_query($dbc, $adq);
                $from = mysqli_fetch_assoc($adr);
                $_SESSION['from_view'] = "1";
                $_SESSION['from_id'] = $from['id'];
            } elseif($list['user_from'] != 0 && $list['admin_from'] == 0) { //otan  to stelni to member 0=NO
                $usq = "SELECT * FROM member WHERE id = '$list[user_from]'";       
                $usr = mysqli_query($dbc, $usq);
                $from = mysqli_fetch_assoc($usr);
                $_SESSION['from_view'] = "2";
                $_SESSION['from_id'] = $from['id'];
            }

        // to -1 einai keno to 0 einai gia olous to >0 einai gia sigkekrimeno ID.
        //gia ton admin
            if($list['admin_to'] >= 0){
                $adtoq = "SELECT * FROM admin_user WHERE id = '$list[admin_to]'";       
                $adtor = mysqli_query($dbc, $adtoq);
                $admin_to = mysqli_fetch_assoc($adtor);
            } else { $test_admin_to = "-1"; }
        //gia to member
            if($list['user_to'] >= 0){
                $ustoq = "SELECT * FROM member WHERE id = '$list[user_to]'";       
                $ustor = mysqli_query($dbc, $ustoq);
                $user_to = mysqli_fetch_assoc($ustor);
            } else { $test_user_to = "-1"; }
        //gia to type
            if($list['type_to'] >= 0){
                $tytoq = "SELECT * FROM type_job WHERE id = '$list[type_to]'";       
                $tytor = mysqli_query($dbc, $tytoq);
                $type_to = mysqli_fetch_assoc($tytor);
            } else { $test_type_to = "-1"; }

// TO
        if ($test_admin_to != "-1") {
            if ($list['admin_to'] == 0) {
                $To_Admin = "All Admins, ";
            } elseif ($list['admin_to'] > 0) {
                $To_Admin = $admin_to['first'].' '.$admin_to['last'];
            }
        } else { $To_Admin = ''; } 

        if ($test_user_to != "-1") {
            if ($list['user_to'] == 0) {
                $To_User = "All Users, ";
            } elseif ($list['user_to'] > 0) {
                $To_User = $user_to['first'].' '.$user_to['last'].', ';
            }
        }else{$To_User = "";}

        if ($test_type_to != "-1") {
             if ($list['type_to'] == 0) {
                $To_Type = "All Types Jobs, ";
            } elseif ($list['type_to'] > 0) {
                $To_Type =  $type_to['name_job'].', ';
            }
        }else{$To_Type = "";}
 ?>

<div class="jumbotron">
   
        <div class="row"><!-- Start md-9 -->
            <div class="col-md-8"><!-- Start md-8 -->
                From  
                <?php if ($from['avatar'] != "") { ?>
                  <img data-toggle="modal" data-target="#Modal_message"  class="img-circle avatar_nav" src="../uploads/<?php echo $from['avatar']; ?>">
                <?php } else { ?>
                  <img data-toggle="modal" data-target="#Modal_message"  class="img-circle avatar_nav" src="../images/no_avatar.png">
                <?php } ?>
                <strong data-toggle="tooltip" data-placement="top" title="<?php echo $from['first'].' '.$from['last']; ?>">
                        <?php echo $from['first'].' '.$from['last']; ?>
                </strong>
                <span>(<?php echo $from['email']; ?>)</span> 
                <i class="fa fa-hand-o-right"> To </i>  
                <strong><?php echo $To_User.' '.$To_Admin.' '.$To_Type; ?></strong>
            </div><!-- Stop md-8 -->
            
            <div class="col-md-2"><!-- Start md-2 -->
                <p class="date" data-toggle="tooltip" data-placement="top" title="Date to send tha message"> <?php echo $list['date'] ?></p>
            </div><!-- Stop md-2 -->
       
            <div class="col-md-1"></div>
       
            <div class="col-md-1"><!-- Start md-1 -->
                <button type="button" class="btn btn-<?php echo $color; ?>" 
                        data-toggle="tooltip" data-placement="top" 
                        title="lever for this message">
                        <i class="fa <?php echo $icon; ?>"></i> <?php echo $lever; ?>
                </button>
            </div><!-- Stop md-1 -->
        </div><!-- Stop md-9 -->
        <br/>

  <h1><?php echo $list['title']; ?></h1>
  <br/>
  <p><?php echo $list['message']; ?></p>
  <br/>

   <?php if ($list['send_note'] != '') { ?><!-- Start send_note  -->
        <br/><br/><br/>
        <p>1 Attachment File</p>
        <a class="btn btn-warning btn-lg" href="../files/<?php echo $list['send_note']; ?>" role="button" data-toggle="tooltip" data-placement="right" title="Download this file"><i class="fa fa-cloud-download" download></i> DOWNLOAD</a>
            
        <!-- <?php echo $list['send_note']; ?> -->
    <?php } ?><!-- Stop send_note  -->
</div>

    <div class="row"><!-- Start row -->
        <div class="col-md-2" align="left"><!-- Start md-9 -->
            <a href="?page=message/messages"><button type="button" class="btn btn-default"><i class="fa fa-reply"></i> Back</button></a>
        </div>
        
        <div class="col-md-8"></div>  
        
        <div class="col-md-2" align="right">             
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Answer to <?php echo $from['first'].' '.$from['last']; ?></button>
        </div>

    <br/><br/><br/>

       <!-- Start modal from Admin -->
    <?php include('Modal_Admin.php'); ?>
    <!-- Start modal from Admin -->

    </div>


      <?php } ?>

  </div><!-- end of col-md-3 -->
 
</div><!-- end of row -->