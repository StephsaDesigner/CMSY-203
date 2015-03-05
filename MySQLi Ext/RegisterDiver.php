<html>
<head>
	<title>Register Diver</title>
	<link rel="stylesheet" href="php_styles.css" type="text/css" />
</head>
<body>
<h1>Aqua Don's Scuba School</h1>
<h2>Registration Confirmation</h2>
<?php
$DiverID = $_GET['diverID'];

if (empty($DiverID))
	exit("<p>You must enter a diver ID! Click your browser's Back button to return to the previous page.</p>");

$DBConnect = @mysqli_connect("localhost", "dongosselin", "rosebud")
	Or die("<p>Unable to connect to the database server.</p>"
	. "<p>Error code " . mysqli_connect_errno()
	. ": " . mysqli_connect_error()) . "</p>";

$DBName = "scuba_school";

@mysqli_select_db($DBConnect, $DBName)
	Or die("<p>Unable to select the database.</p>"
	. "<p>Error code " . mysqli_errno($DBConnect)
	. ": " . mysqli_error($DBConnect)) . "</p>";

$TableName = "registration";
$SQLstring = "SELECT * FROM $TableName";
$QueryResult = @mysqli_query($DBConnect, $SQLstring);

if (!$QueryResult) {
	$SQLstring = "CREATE TABLE registration (diverID SMALLINT, class VARCHAR(40), days VARCHAR(40), time VARCHAR(40))";

	$QueryResult = @mysqli_query($DBConnect, $SQLstring)
		Or die("<p>Unable to create the registration table.</p>"
		. "<p>Error code " . mysqli_errno($DBConnect)
		. ": " . mysqli_error($DBConnect)) . "</p>";

	echo "<p>Successfully created the registration table.</p>";
}

$Class = $_GET['class'];
$Days = $_GET['days'];
$Time = $_GET['time'];
$SQLstring = "INSERT INTO $TableName VALUES('$DiverID', '$Class', '$Days', '$Time')";

$QueryResult = @mysqli_query($DBConnect, $SQLstring)
	Or die("<p>Unable to execute the query.</p>"
	. "<p>Error code " . mysqli_errno($DBConnect)
	. ": " . mysqli_error($DBConnect)) . "</p>";

mysqli_close($DBConnect);
?>
<p>You are registered for <?= "$Class on $Days, $Time" ?>. Click your browser's Back button to register for another course or review your schedule.</p>
</body>
</html>
