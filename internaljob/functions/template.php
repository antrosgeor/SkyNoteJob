<?php

function nav_main($dbc, $path) { 
	$q = "SELECT * FROM pages";
	$r = mysqli_query($dbc, $q);
			
	while ($nav = mysqli_fetch_assoc($r)) { ?>
			<!--	echo '<li><a href="?page='.$nav['id'].'">'.$nav['title'].'</a></li>'; -->	
		<li <?php selected($path['call_parts'][0],$nav['slug'],'class="active"') ?>>
			<a href="<?php echo $nav['slug']; ?>"><?php echo $nav['label']; ?></a>
		</li>

<?php }
	}
?>