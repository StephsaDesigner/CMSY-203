<html>

<head>
	<title>Weather Service</title>
</head>

<body>
<h1>Weather Service - Demo for file_put_contents()</h1>
<!--
The file_get_contents() function reads the entire contents of a file into a string.
If you have a text file containing a single block of data (that is not a collection of individual records), 
the file_get_contents() function can be useful.

Assume a Weather Service (see below) that uses a text file to store daily weather forecasts.
The following code uses the file_put_contents() function to write the daily forecast for San Francisco to
a text file named "sfweather.txt":
-->

<?php
$DailyForecast = "<p><strong>San Francisco daily weather forecast</strong>: ";
$DailyForecast .= "Today: Partly cloudy. Highs from the 60s to mid 70s. West winds 5 to 15 mph. Tonight: Increasing clouds. Lows ";
$DailyForecast .= "in the mid 40s to lower 50s. West winds 5 to 10 mph.</p>";

file_put_contents("sfweather.txt", $DailyForecast);

?>

</body>

</html>