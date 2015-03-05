<html>
<head>
	<title>Flightlog Entries</title>
	<link rel="stylesheet" href="php_styles.css" type="text/css" />
</head>
<body>
<h1>Flightlog Entries</h1>
<form action="InsertLog.php" method="post">

<?php
$DBConnect = @mysql_connect("localhost", "root","password")
	Or die("<p>Unable to connect to the database server.</p>"
	. "<p>Error code " . mysql_connect_errno()
	. ": " . mysql_connect_error()) . "</p>";

$DBName = "flightlog";

@mysql_select_db($DBName, $DBConnect)
	Or die("<p>Unable to select the database.</p>"
	. "<p>Error code " . mysql_errno($DBConnect)
	. ": " . mysql_error($DBConnect)) . "</p>";

$SQLstring = "SELECT * FROM flightsessions";

$QueryResult = @mysql_query($SQLstring, $DBConnect)
	Or die("<p>Unable to execute the query.</p>"
	. "<p>Error code " . mysql_errno($DBConnect)
	. ": " . mysql_error($DBConnect)) . "</p>";

$NumRows = mysql_num_rows($QueryResult);
$NumFields = mysql_num_fields($QueryResult);

echo "<p>Your query returned the following "
		. mysql_num_rows($QueryResult)
		. " rows and ". mysql_num_fields($QueryResult)
		. " fields:</p>";
echo "<table width='100%' border='1'>";
echo "<tr><th>Flight Date</th><th>Flight Time</th><th>Origin</th><th>Destination</th><th>Weather</th><th>Winds</th><th>Temp</th><th>Action</th></tr>";

$Row = mysql_fetch_assoc($QueryResult);
do 
{
	echo "<tr>";
	echo "<td>{$Row['flight_date']}</td>";
	echo "<td>{$Row['flight_time']}</td>";
	echo "<td>{$Row['origin']}</td>";
	echo "<td>{$Row['destination']}</td>";
	echo "<td>{$Row['weather']}</td>";
	echo "<td>{$Row['winds']}</td>";
	echo "<td>{$Row['temp']}</td>";
	echo "<td><a href=EditLog.php?FlightID={$Row['flightid']}>Edit</a> <a href=DeleteLog.php?FlightID={$Row['flightid']}>Delete</a></td>";
	echo "</tr>";
	$Row = mysql_fetch_assoc($QueryResult);
} while ($Row);

echo "<tr>";
echo "<td><input type='text' name='flightdate' maxlength='10' size='12' value=''></td>";
echo "<td><input type='text' name='flighttime' maxlength='8' size='12' value=''></td>";
echo "<td><input type='text' name='origin' maxlength='50' size='12' value=''></td>";
echo "<td><input type='text' name='destination' maxlength='50' size='12' value=''></td>";
echo "<td><input type='text' name='weather' maxlength='50' size='12' value=''></td>";
echo "<td><input type='text' name='winds' maxlength='50' size='12' value=''></td>";
echo "<td><input type='text' name='temperatures' maxlength='10' size='12' value=''></td>";
echo "<td><input type='submit' name='btnSubmit' value='Insert this record'></td>";
echo "</tr>";


mysql_free_result($QueryResult);
mysql_close($DBConnect);
?>

</table>
</form>

</body>
</html>
