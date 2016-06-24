<?php # Debug.php ?>
<div id="console-debug"><!-- Start div1 -->
	<!-- Array edo exoume ton kidika pou mas dixni oles tis metavlites pou pernoume.
		me ton elexo if pou exoume vali sto kodika mas einai gia to URL pos prepi na einai &debug=1 -->
	<?php
		$all_vars = get_defined_vars();
	?>

	<h1>GET</h1> 
		<pre>
			<?php print_r($_GET); ?>
		</pre>

	<h1>POST</h1> 
		<pre>
			<?php print_r($_POST); ?>
		</pre>
	
	<h1>All Variables</h1> 
		<pre>
			<?php print_r($all_vars); ?>
		</pre>

	<h1>Page Array :</h1> 
		<pre>
			<?php print_r($page); ?>
		</pre>
</div><!-- Stop div1 -->