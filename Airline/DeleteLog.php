<html>
<head>
	<title>Flightlog Entry Deleted Successfully.</title>
	<link rel="stylesheet" href="php_styles.css" type="text/css" />
</head>
<body>
<?php

$flightid=$_GET["FlightID"];

echo "<h1>Flightlog Entry Deleted Successfully!</h1>";

$DBConnect = @mysql_connect("localhost", "root","password")
	Or die("<p>Unable to connect to the database server.</p>"
	. "<p>Error code " . mysql_connect_errno()
	. ": " . mysql_connect_error()) . "</p>";

$DBName = "flightlog";

@mysql_select_db($DBName, $DBConnect)
	Or die("<p>Unable to select the database.</p>"
	. "<p>Error code " . mysql_errno($DBConnect)
	. ": " . mysql_error($DBConnect)) . "</p>";

$SQLstring = "DELETE FROM flightsessions WHERE flightid = " . $flightid;

//echo "Query: " . $SQLstring;

$QueryResult = @mysql_query($SQLstring, $DBConnect)
	Or die("<p>Unable to execute the query.</p>" . "<p>Error code " . mysql_errno($DBConnect) . ": " . mysql_error($DBConnect)) . "</p>";

mysql_close($DBConnect);

//header( 'Location: FlightlogEntries.php' ) ;
?>

<br>
<a href="FlightlogEntries.php">Click Here</a> to go back.
</body>
</html>