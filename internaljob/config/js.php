<?php  #js Javascript: ?>

<!--jQuery -->
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<!--jQuery UI-->
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<!-- BOOTSTRAP Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	
<script>
	$(document).ready(function(){
		$("#console-debug").hide();
		$("#btn-debug").click(function(){
			$("#console-debug").toggle();
		});
	});
</script>