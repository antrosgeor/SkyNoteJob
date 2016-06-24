<?php 
?>

<div id="show">ok</div>

	<script type="text/javascript" src="jquery-2.2.3.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			setInterval(function() {
				$('#show').load('noti.php')
			}, 1000);
		});
	</script>