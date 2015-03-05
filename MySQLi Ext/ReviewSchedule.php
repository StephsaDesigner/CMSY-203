<html>
<head>
	<title>Review Schedule</title>
	<link rel="stylesheet" href="php_styles.css" type="text/css" />
</head>
<body>
<h1>Aqua Don's Scuba School</h1>
<h2>This is your current schedule:</h2>
<?php
$DiverID = $_GET['diverID'];

if (empty($DiverID))
	exit("<p>You must enter a diver ID! Click your browser's Back button to return to the previous page.</p>");

$DBConnect = @mysqli_connect("localhost", "dongosselin","rosebud")
	Or die("<p>Unable to connect to the database server.</p>"
	. "<p>Error code " . mysqli_connect_errno()
	. ": " . mysqli_connect_error()) . "</p>";

$DBName = "scuba_school";

@mysqli_select_db($DBConnect, $DBName)
	Or die("<p>Unable to select the database.</p>"
	. "<p>Error code " . mysqli_errno($DBConnect)
	. ": " . mysqli_error($DBConnect)) . "</p>";

$TableName = "registration";
$SQLstring = "SELECT * FROM $TableName WHERE diverID='$DiverID'";

$QueryResult = @mysqli_query($DBConnect, $SQLstring)
	Or die("<p>Unable to execute the query.</p>"
	. "<p>Error code " . mysqli_errno($DBConnect)
	. ": " . mysqli_error($DBConnect)) . "</p>";

if (mysqli_num_rows($QueryResult) == 0)
	die("<p>You have not registered for any classes! Click your browser's Back button to return to the previous page.</p>");

echo "<table width='100%' border='1'>";
echo "<tr> <th>Class</th> <th>Days</th> <th>Time</th> </tr>";

$Row = mysqli_fetch_assoc($QueryResult);

do 
{
	echo "<tr><td>{$Row['class']}</td>";
	echo "<td>{$Row['days']}</td>";
	echo "<td>{$Row['time']}</td></tr>";
	$Row = mysqli_fetch_assoc($QueryResult);
} while ($Row);

mysqli_free_result($QueryResult);
mysqli_close($DBConnect);

?>
</body>
</html>
