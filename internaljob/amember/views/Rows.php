<?php 	
	
	$myid = $_SESSION['id'];
	// My Remembers
    $sql1 = "SELECT * FROM remember WHERE id_member = '$myid'";
    $result1 =mysqli_query($dbc, $sql1);
    $rowMyRemember = mysqli_num_rows($result1);

	// Others Remembers to have second user my id
    $sql2 = "SELECT * FROM remember WHERE id_second = '$myid'";
    $result2 =mysqli_query($dbc, $sql2);
    $rowOthersRemember = mysqli_num_rows($result2);

    // Notes user my id
    $sql3 = "SELECT * FROM notes WHERE id_member = '$myid'";
    $result3 =mysqli_query($dbc, $sql3);
    $rownotes = mysqli_num_rows($result3);

	// Pages from type_job
    $for = $_SESSION['type_job'];
	$sql4 = "SELECT * FROM pages WHERE forto = '$for'";
    $result4 =mysqli_query($dbc, $sql4);
    $rowpages = mysqli_num_rows($result4);

    // News from type_job
	$sql5 = "SELECT * FROM news WHERE forto = '$for'";
    $result5 =mysqli_query($dbc, $sql5);
    $rownews = mysqli_num_rows($result5);

?>
<div class="row">
<div class = "container" align="center"><!-- Start container -->

<?php if ($rowpages != 0) { ?>
	<a href="?page=pages">
		<button type="button" class="btn btn-primary btn-lg active">
			<span class="badge"><strong>
				<?php echo $rowpages; ?>
			</span>
			Pages </strong>
		</button>
	</a>
<?php } if ($rownews != 0) { ?>
	<a href="?page=news">
		<button type="button" class="btn btn-primary btn-lg active">
			<span class="badge"><strong>
				<?php echo $rownews; ?>
			</span>
			News </strong>
		</button>
	</a>
<?php } if ($rownotes != 0) { ?>
	<a href="?page=notes">
		<button type="button" class="btn btn-primary btn-lg active">
			<span class="badge"><strong>
				<?php echo $rownotes; ?>
			</span>
			Notes </strong>
		</button>
	</a>
<?php } if ($rowMyRemember != 0) { ?>
	<a href="?page=remember">
		<button type="button" class="btn btn-primary btn-lg active">
			<span class="badge"><strong>
				<?php echo $rowMyRemember; ?>
			</span> 
			My Remember </strong>
		</button>
	</a>
<?php } if ($rowOthersRemember != 0) { ?>
	<a href="?page=remember">
		<button type="button" class="btn btn-primary btn-lg active">
			<span class="badge"><strong>
				<?php echo $rowOthersRemember; ?>
			</span>
			Other Remember </strong>
		</button>
	</a>
<?php } ?>
</div>
</div>