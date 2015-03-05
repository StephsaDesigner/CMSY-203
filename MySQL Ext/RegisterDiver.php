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

$DBConnect = @mysql_connect("localhost", "root", "password")
	Or die("<p>Unable to connect to the database server.</p>"
	. "<p>Error code " . mysql_errno()
	. ": " . mysql_error()) . "</p>";

$DBName = "scuba_school";

@mysql_select_db($DBName, $DBConnect)
	Or die("<p>Unable to select the database.</p>"
	. "<p>Error code " . mysql_errno($DBConnect)
	. ": " . mysql_error($DBConnect)) . "</p>";

$TableName = "registration";
$SQLstring = "SELECT * FROM $TableName";
$QueryResult = @mysql_query($SQLstring, $DBConnect);

if (!$QueryResult) {
	$SQLstring = "CREATE TABLE registration (diverID SMALLINT, class VARCHAR(40), days VARCHAR(40), time VARCHAR(40))";

	$QueryResult = @mysql_query($SQLstring, $DBConnect)
		Or die("<p>Unable to create the registration table.</p>"
		. "<p>Error code " . mysql_errno($DBConnect)
		. ": " . mysql_error($DBConnect)) . "</p>";

	echo "<p>Successfully created the registration table.</p>";
}

$Class = $_GET['class'];
$Days = $_GET['days'];
$Time = $_GET['time'];
$SQLstring = "INSERT INTO $TableName VALUES('$DiverID', '$Class', '$Days', '$Time')";

$QueryResult = @mysql_query($SQLstring, $DBConnect)
	Or die("<p>Unable to execute the query.</p>"
	. "<p>Error code " . mysql_errno($DBConnect)
	. ": " . mysql_error($DBConnect)) . "</p>";

mysql_close($DBConnect);
?>
<p>You are registered for <?= "$Class on $Days, $Time" ?>. Click your browser's Back button to register for another course or review your schedule.</p>
</body>
</html>
