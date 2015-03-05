<html>
<head>
	<title>Edit Flightlog Entry</title>
	<link rel="stylesheet" href="php_styles.css" type="text/css" />
</head>
<body>
<h1>Edit Flightlog Entry</h1>
<?php

$flightid=$_GET["FlightID"];

$DBConnect = @mysql_connect("localhost", "root","password")
	Or die("<p>Unable to connect to the database server.</p>" . "<p>Error code " . mysql_connect_errno() . ": " . mysql_connect_error()) . "</p>";

$DBName = "flightlog";

@mysql_select_db($DBName, $DBConnect)
	Or die("<p>Unable to select the database.</p>" . "<p>Error code " . mysql_errno($DBConnect) . ": " . mysql_error($DBConnect)) . "</p>";

$SQLstring = "SELECT * FROM flightsessions WHERE flightid=" . $flightid;

$QueryResult = @mysql_query($SQLstring, $DBConnect)
	Or die("<p>Unable to execute the query.</p>" . "<p>Error code " . mysql_errno($DBConnect) . ": " . mysql_error($DBConnect)) . "</p>";
?>

<form action="UpdateLog.php" method="post">
<table width="50%" border="1">

<?php
$Row = mysql_fetch_assoc($QueryResult);
do 
{
	echo "<tr>";
	echo "<td width='40%'>Flight ID</td>";
	echo "<td><input type='text' name='flightid' readonly='true' value='$flightid'></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td width='40%'>Flight Date</td>";
	echo "<td><input type='text' name='flightdate' value='{$Row['flight_date']}'></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td width='40%'>Flight Time</td>";
	echo "<td><input type='text' name='flighttime' value='{$Row['flight_time']}'></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td width='40%'>Origin</td>";
	echo "<td><input type='text' name='origin' value='{$Row['origin']}'></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td width='40%'>Destination</td>";
	echo "<td><input type='text' name='destination' value='{$Row['destination']}'></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td width='40%'>Weather</td>";
	echo "<td><input type='text' name='weather' value='{$Row['weather']}'></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td width='40%'>Winds</td>";
	echo "<td><input type='text' name='winds' value='{$Row['winds']}'></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td width='40%'>Temperature</td>";
	echo "<td><input type='text' name='temperatures' value='{$Row['temp']}'></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td colspan='2' align='center'><input type='submit' name='btnSubmit' value='Submit Edits for this record'></td>";
	echo "</tr>";
	$Row = mysql_fetch_assoc($QueryResult);
} while ($Row);

mysql_close($DBConnect);

?>

</form>
</table>
</body>
</html>
