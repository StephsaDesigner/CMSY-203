<html>

<head>
	<title>Weather Service</title>
</head>

<body>
<h1>Weather Service - Demo for file_get_contents()</h1>
<!--
The file_get_contents() function reads the entire contents of a file into a string.
If you have a text file containing a single block of data (that is not a collection of individual records), 
the file_get_contents() function can be useful.

Assume a Weather Service (see below) that uses a text file to store daily weather forecasts.
The following example uses the file_get_contents() function to read the contents of the text file named "sfweather.txt"
into a string variable, which is then printed with an echo() statement:
-->

<?php

$SFWeather = file_get_contents("sfweather.txt");
echo $SFWeather;

?>

</body>

</html>