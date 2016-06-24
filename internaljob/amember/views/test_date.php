<?php  #test date

	$q = "SELECT date_format(date, '%D %M %Y')  AS sex FROM news";
	$r = mysqli_query($dbc, $q);
	$test = mysqli_fetch_assoc($r); 

?>

<h1>Test Date</h1>
<h1><?php echo $test['sex']; 
echo "PHP date()<br>"; 
echo date('dS F Y ', $test['sex']); ?></h1><br/>
<h1><?php echo date('dS F Y ', strtotime($test['sex'])); ?></h1><br/>
<h1><?php echo date('d-M-y', strtotime($test['sex'])); ?></h1><br/>
<h1><?php echo date('dS F Y ', strtotime($test['sex'])); ?></h1><br/>
<h1><?php echo date('dS F Y @ h:i:s A', strtotime($test['sex'])); ?></h1><br/>

<br/> edo prepi na do pos tha apothikevo kai to time.
<br/><br/><br/><br/>






<h2>HTML5 + Javascript Date Time Form Input Types Tutorial</h2>
Date: <input type="date" name="field1" id="field1" /><br /><br />
Datetime local: <input type="datetime-local" name="field2" id="field2" /><br /><br />
Datetime: <input type="datetime" name="field3" id="field3" /><br /><br />
Month: <input type="month" name="field4" id="field4" /><br /><br />
Time: <input type="time" name="field5" id="field5" /><br /><br />
Week: <input type="week" name="field6" id="field6" /><br /><br />
<input type="button" onClick="processData('field1','field2','field3','field4','field5','field6')" value="Submit" />



