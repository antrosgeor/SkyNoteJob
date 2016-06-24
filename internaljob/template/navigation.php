<!-- Navigation -->
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">

    <!-- Debug Button -->
    <?php if ($debug == 1) { ?>
    <button id= "btn-debug" class="btn btn-default"><i class="fa fa-bug"></i></button>
    <?php } ?>
    
    <div class="container-fluid">
    
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"> 
                <ul class="nav navbar-nav">
                    <li>
                        <img class="img-circle avatar_nav" src="images/cm.png" height="40" width="40">
                    #<?php echo $_SESSION['Company_Name']; ?>
                    </li>
                </ul>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <li><a href="admin/login.php">Admin</a></li>
                    <li><a href="amember/login.php">Member</a></li>
                    <li class="dropdown" class="<?php selected('contact', $_GET['page'], 'active') ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Contact<b class="caret" ></b></a>
                        <ul class="dropdown-menu">
                            <li><a data-toggle="modal" data-target="#ContactNoUser">Send Mail</a></li>
                            <li><a data-toggle="modal" data-target="#ContactNopassword">Forgot Password</a></li>
                        </ul>
                    </li>    
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<script>

// Navigation Scripts to Show Header on Scroll-Up
jQuery(document).ready(function($) {
    var MQL = 1170;

    //primary navigation slide-in effect
    if ($(window).width() > MQL) {
        var headerHeight = $('.navbar-custom').height();
        $(window).on('scroll', {
                previousTop: 0
            },
            function() {
                var currentTop = $(window).scrollTop();
                //check if user is scrolling up
                if (currentTop < this.previousTop) {
                    //if scrolling up...
                    if (currentTop > 0 && $('.navbar-custom').hasClass('is-fixed')) {
                        $('.navbar-custom').addClass('is-visible');
                    } else {
                        $('.navbar-custom').removeClass('is-visible is-fixed');
                    }
                } else {
                    //if scrolling down...
                    $('.navbar-custom').removeClass('is-visible');
                    if (currentTop > headerHeight && !$('.navbar-custom').hasClass('is-fixed')) $('.navbar-custom').addClass('is-fixed');
                }
                this.previousTop = currentTop;
            });
    }
}); 

</script>







<div class="modal fade" id="ContactNoUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Send Mail</h4>
      </div>
      <div class="modal-body">
        <form action="index.php" method="post" role="form" enctype='multipart/form-data'>
        <div class="form-group">
            <label for="recipient-name" class="control-label">Your Name:</label>
            <input type="text" class="form-control" name="name" id="name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Your Phone:</label>
            <input type="text" class="form-control" name="phone" id="phone">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Your Mail:</label>
            <input type="text" class="form-control" name="mail" id="mail">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Message:</label>
            <textarea class="form-control" name="message" id="message"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary active" name="ContactNoUser">Send message</button>
            <input type="hidden" name="ContactNoUser" value="1">
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="ContactNopassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Forgot Password</h4>
      </div>
      <div class="modal-body">
        <form action="index.php" method="post" role="form" enctype='multipart/form-data'>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Your Mail</label>
            <input type="text" class="form-control" id="mail" name="mail">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Message:</label>
            <textarea class="form-control" id="message" name="message"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="button" class="btn btn-primary active" name="ContactNopassword">Send message</button>
            <input type="hidden" name="ContactNopassword" value="1">
      </div>
    </div>
  </div>
</div>