	<?php 
		$ids = $_SESSION['id'];
	 	if ($ids != 0) {
		 	$nowdate = date("Y-m-d");
		 	$nowtime = date("H:i:s");
		 	echo $nowtime." ";
		 	$q="SELECT * FROM remember WHERE (id_member = $ids OR id_second = $ids) AND date = '$nowdate' AND time >= '$nowtime' ORDER BY time ASC";
			$r=mysqli_query($dbc, $q);
			$rowRe = mysqli_num_rows($r);
	 	}if ($rowRe != 0) {
	 		$testRe = mysqli_fetch_assoc($r);
	 		$helps = false;
	 		do{
		 		if($testRe['time'] <= date("H:i:s")){
		 			$helps = true;
		 		}
		 	}while($helps == false);

		 	}
		 }
	
 //$helps = true;
	//do{

	//}while();

 	?>
 	<br/><br/><br/><br/>
<h1>gia su<br/><br/><br/><?php echo $rowRe; echo $testRe['title']; echo $testRe['message'];  ?></h1>

<!-- 
 	// for (;;)
	 	// {
	 	// 	echo $nowtime;
	 	// 	sleep(30);
	 	// }
 -->