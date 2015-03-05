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

$DBConnect = @mysql_connect("localhost", "root","password")
	Or die("<p>Unable to connect to the database server.</p>"
	. "<p>Error code " . mysql_errno()
	. ": " . mysql_error()) . "</p>";

$DBName = "scuba_school";

@mysql_select_db($DBName, $DBConnect)
	Or die("<p>Unable to select the database.</p>"
	. "<p>Error code " . mysql_errno($DBConnect)
	. ": " . mysql_error($DBConnect)) . "</p>";

$TableName = "registration";
$SQLstring = "SELECT * FROM $TableName WHERE diverID='$DiverID'";

$QueryResult = @mysql_query($SQLstring,$DBConnect)
	Or die("<p>Unable to execute the query.</p>"
	. "<p>Error code " . mysql_errno($DBConnect)
	. ": " . mysql_error($DBConnect)) . "</p>";

if (mysql_num_rows($QueryResult) == 0)
	die("<p>You have not registered for any classes! Click your browser's Back button to return to the previous page.</p>");

echo "<table width='100%' border='1'>";
echo "<tr> <th>Class</th> <th>Days</th> <th>Time</th> </tr>";

$Row = mysql_fetch_assoc($QueryResult);

do 
{
	echo "<tr><td>{$Row['class']}</td>";
	echo "<td>{$Row['days']}</td>";
	echo "<td>{$Row['time']}</td></tr>";
	$Row = mysql_fetch_assoc($QueryResult);
} while ($Row);

mysql_free_result($QueryResult);
mysql_close($DBConnect);

?>
</body>
</html>
