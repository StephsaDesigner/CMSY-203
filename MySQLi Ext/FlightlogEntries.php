<html>
<head>
	<title>Flightlog Entries</title>
	<link rel="stylesheet" href="php_styles.css" type="text/css" />
</head>
<body>
<h1>Flightlog Entries</h1>
<?php
$DBConnect = @mysqli_connect("localhost", "dongosselin","rosebud")
	Or die("<p>Unable to connect to the database server.</p>"
	. "<p>Error code " . mysqli_connect_errno()
	. ": " . mysqli_connect_error()) . "</p>";

$DBName = "flightlog";

@mysqli_select_db($DBConnect, $DBName)
	Or die("<p>Unable to select the database.</p>"
	. "<p>Error code " . mysqli_errno($DBConnect)
	. ": " . mysqli_error($DBConnect)) . "</p>";

$SQLstring = "SELECT * FROM flightsessions";

$QueryResult = @mysqli_query($DBConnect, $SQLstring)
	Or die("<p>Unable to execute the query.</p>"
	. "<p>Error code " . mysqli_errno($DBConnect)
	. ": " . mysqli_error($DBConnect)) . "</p>";

$NumRows = mysqli_num_rows($QueryResult);
$NumFields = mysqli_num_fields($QueryResult);

echo "<p>Your query returned the following "
		. mysqli_num_rows($QueryResult)
		. " rows and ". mysqli_num_fields($QueryResult)
		. " fields:</p>";
echo "<table width='100%' border='1'>";
echo "<tr><th>Flight Date</th><th>Flight Time</th><th>Origin</th><th>Destination</th><th>Weather</th><th>Winds</th><th>Temp</th></tr>";

$Row = mysqli_fetch_assoc($QueryResult);
do 
{
	echo "<tr><td>{$Row['flight_date']}</td>";
	echo "<td>{$Row['flight_time']}</td>";
	echo "<td>{$Row['origin']}</td>";
	echo "<td>{$Row['destination']}</td>";
	echo "<td>{$Row['weather']}</td>";
	echo "<td>{$Row['winds']}</td>";
	echo "<td>{$Row['temp']}</td></tr>";
	$Row = mysqli_fetch_assoc($QueryResult);
} while ($Row);

mysqli_free_result($QueryResult);
mysqli_close($DBConnect);
?>
</body>
</html>
