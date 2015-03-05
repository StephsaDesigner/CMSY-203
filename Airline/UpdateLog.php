<html>
<head>
	<title>Flightlog Entry Updated Successfully.</title>
	<link rel="stylesheet" href="php_styles.css" type="text/css" />
</head>
<body>
<?php
$flightid = $_POST["flightid"];
$flightdate = $_POST["flightdate"];
$flighttime = $_POST["flighttime"];
$origin = $_POST["origin"];
$destination = $_POST["destination"];
$weather = $_POST["weather"];
$winds = $_POST["winds"];
$temperatures = $_POST["temperatures"];

echo "<h1>Flightlog Entry Updated Successfully for ID: $flightid</h1>";

$DBConnect = @mysql_connect("localhost", "root","password")
	Or die("<p>Unable to connect to the database server.</p>"
	. "<p>Error code " . mysql_connect_errno()
	. ": " . mysql_connect_error()) . "</p>";

$DBName = "flightlog";

@mysql_select_db($DBName, $DBConnect)
	Or die("<p>Unable to select the database.</p>"
	. "<p>Error code " . mysql_errno($DBConnect)
	. ": " . mysql_error($DBConnect)) . "</p>";

$SQLstring = "UPDATE flightsessions SET flight_date = '" . $flightdate . "'";
$SQLstring = $SQLstring . ", flight_time = '" . $flighttime . "'";
$SQLstring = $SQLstring . ", origin = '" . $origin . "'";
$SQLstring = $SQLstring . ", destination = '" . $destination . "'";
$SQLstring = $SQLstring . ", weather = '" . $weather . "'";
$SQLstring = $SQLstring . ", winds = '" . $winds . "'";
$SQLstring = $SQLstring . ", temp = '" . $temperatures . "'";
$SQLstring = $SQLstring . " WHERE flightid = " . $flightid;

//echo "Query: " . $SQLstring;

$QueryResult = @mysql_query($SQLstring,$DBConnect)
	Or die("<p>Unable to execute the query.</p>" . "<p>Error code " . mysql_errno($DBConnect) . ": " . mysql_error($DBConnect)) . "</p>";

mysql_close($DBConnect);

//header( 'Location: http://localhost/php/ProjectDemo/FlightlogEntries.php' ) ;
?>

<br>
<a href="FlightlogEntries.php">Click Here</a> to go back.
</body>
</html>
