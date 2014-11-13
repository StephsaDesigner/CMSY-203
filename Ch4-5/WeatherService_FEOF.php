<html>

<head>
	<title>Weather Service</title>
</head>

<body>
<h1>Weather Service - Demo for reading data incrementally</h1>
<!--

Assume a Weather Service (see below) that stores daily weather reports.

The following code demonstrates how to use the feof() function along with the fgets() function, 
which returns a line and moves the file pointer to the next line. The code reads and parses each line
in the "sfjanaverages.txt" text file, similar to the previous example we just discussed.

In this version, a while statement uses the value returned from the feof() function as the conditional
expression. The lines in the while statement then parse and print the contents of each line, and the last
statement calls the fgets() function, which reads the current line and moves the file pointer to the next line.

-->

<?php

$JanuaryTemps = fopen("sfjanaverages.txt", "r");
$Count = 1;
$CurAverages = fgets($JanuaryTemps);

while (!feof($JanuaryTemps)) 
{
	$CurDay = explode(", ", $CurAverages);
	echo "<p><strong>Day $Count</strong><br />";
	echo "High: {$CurDay[0]}<br />";
	echo "Low: {$CurDay[1]}<br />";
	echo "Mean: {$CurDay[2]}</p>";
	$CurAverages = fgets($JanuaryTemps);
	++$Count;
}

fclose($JanuaryTemps);

?>

</body>

</html>