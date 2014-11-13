<html>

<head>
	<title>Weather Service</title>
</head>

<body>
<h1>Weather Service - Obtaining File and Directory Information</h1>
<!--

The following example shows a modified version of the code you just saw. This example includes an if statement
that uses the is_writable() function to determine whether the text file can be written to.

-->

<?php

$DailyForecast = "<p><strong>San Francisco daily weather forecast</strong>: ";
$DailyForecast .= "Today: Partly cloudy. Highs from the 60s to mid 70s. West winds 5 to 15 mph. Tonight: Increasing clouds. Lows ";
$DailyForecast .= "in the mid 40s to lower 50s. West winds 5 to 10 mph.</p>";

$WeatherFile = "sfweather.txt";

if (is_writable($WeatherFile))
{
	file_put_contents($WeatherFile, $DailyForecast);	
	echo "<p>The forecast information has been saved to the $WeatherFile file.</p>";
}
else
	echo "<p>The forecast information cannot be saved to the $WeatherFile file.</p>";

?>

<h3>Demo for using is_readable() function</h3>

<!--

The following example uses the file_get_contents() function to read the contents of the "sfweather.txt" file into a string
variable, which is then printed with an echo() statement. This example includes an if statement that uses the is_readable()
function to determine whether the text file can be read.

-->

<?php

$WeatherFile = "sfweather.txt";

if (is_readable($WeatherFile))
{
	$SFWeather = file_get_contents($WeatherFile);	
	echo $SFWeather;
}
else
	echo "<p>The $WeatherFile file cannot be read.</p>";

?>

</body>

</html>