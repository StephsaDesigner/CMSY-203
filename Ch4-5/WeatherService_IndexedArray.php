<html>

<head>
	<title>Weather Service</title>
</head>

<body>
<h1>Weather Service - Demo for results into an indexed array</h1>
<!--

Assume a Weather Service (see below) that stores daily weather reports.
They also store average daily high, low, and mean temperatures, separated by commas,
on individual lines in a single text file.

The following code uses the file_put_contents() function to write the temperatures for the 
first week of January to a text file named "sfjanaverages.txt":
-->

<?php

$January = "48, 42, 68\r\n";
$January .= "48, 42, 69\r\n";
$January .= "49, 42, 69\r\n";
$January .= "49, 42, 61\r\n";
$January .= "49, 42, 65\r\n";
$January .= "49, 42, 62\r\n";
$January .= "49, 42, 62\r\n";

file_put_contents("sfjanaverages.txt", $January);

?>

<h3>The following is a demo using file() function</h3>
<!--

The first statement in the following code uses the file() function to read the contents of the
"sfjanaverages.txt" file into an indexed array named $JanuaryTemps[]. 

The for statement then loops through each element in the $JanuaryTemps[] and calls the explode()
function to split each element at the comma into another array named $CurDay.

The high, low, and mean averages in the $CurDay array are then printed with echo() statements.

-->

<?php

$JanuaryTemps = file("sfjanaverages.txt");
for ($i=0; $i < count($JanuaryTemps); ++$i) 
{
	$CurDay = explode(", ", $JanuaryTemps[$i]);
	echo "<p><strong>Day " . ($i + 1) . "</strong><br />";
	echo "High: {$CurDay[0]}<br />";
	echo "Low: {$CurDay[1]}<br />";
	echo "Mean: {$CurDay[2]}</p>";
}

?>


</body>

</html>