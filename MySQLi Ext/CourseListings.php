<html>
<head>
	<title>Course Listings</title>
	<link rel="stylesheet" href="php_styles.css" type="text/css" />
</head>
<body>
<h1>Aqua Don's Scuba School</h1>
<h2>Class Registration Form</h2>
<?php
$DBConnect = @mysqli_connect("localhost", "root", "password")
	Or die("<p>Unable to connect to the database server.</p>"
	. "<p>Error code " . mysqli_connect_errno()
	. ": " . mysqli_connect_error()) . "</p>";

$DBName = "scuba_school";

@mysqli_select_db($DBConnect, $DBName)
	Or die("<p>Unable to select the database.</p>"
	. "<p>Error code " . mysqli_errno($DBConnect)
	. ": " . mysqli_error($DBConnect)) . "</p>";

$DiverID = $_GET['diverID'];

if (empty($DiverID))
	exit("<p>You must enter a diver ID! Click your browser's Back button to return to the previous page.</p>");

$TableName = "divers";
$SQLstring = "SELECT * FROM $TableName WHERE diverID='$DiverID'";

$QueryResult = @mysqli_query($DBConnect, $SQLstring)
	Or die("<p>Unable to execute the query.</p>"
	. "<p>Error code " . mysqli_errno($DBConnect)
	. ": " . mysqli_error($DBConnect)) . "</p>";

if (mysqli_num_rows($QueryResult) == 0)
	die("<p>You must enter a valid diver ID! Click your browser's Back button to return to the Registration form.</p.");

mysqli_close($DBConnect);

?>
<form method="get" action="ReviewSchedule.php">
	<p><strong>Student ID: <?= $DiverID ?></strong>
	<input type="submit" value=" Review Current Schedule " /><input type="hidden" name="diverID" value="<?= $DiverID ?>" /></p>
</form>

<form method="get" action="RegisterDiver.php">
	<p><strong>Select the class you would like to take:</strong><br />
	<input type="radio" name="class" value="Beginning Open Water" checked="checked" />Beginning Open Water<br />
	<input type="radio" name="class" value="Advanced Open Water" />Advanced Open Water<br />
	<input type="radio" name="class" value="Rescue Diving" />Rescue Diving<br />
	<input type="radio" name="class" value="Divemaster Certification" />Divemaster Certification<br />
	<input type="radio" name="class" value="Instructor Certification" />Instructor Certification</p>
	<p><strong>Available Days and Times:</strong><br />
	<select name="days">
		<option selected="selected" value="Mondays and Wednesdays">Mondays and Wednesdays</option>
		<option value="Tuesdays and Thursdays">Tuesdays and Thursdays</option>
		<option value="Wednesdays and Fridays">Wednesdays and Fridays</option>
	</select>
	<select name="time">
		<option selected="selected" value="9 a.m. - 11 a.m.">9 a.m. - 11 a.m.</option>
		<option value="1 p.m. - 3 p.m.">1 p.m. - 3 p.m.</option>
		<option value="6 p.m. - 8 p.m.">6 p.m. - 8 p.m.</option>
	</select>
	<input type="hidden" name="diverID" value="<?= $DiverID ?>" /></p>
	<p><input type="submit" value=" Register " />
	<input type="reset" /></p>
</form>
</body>
</html>
