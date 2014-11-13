<html>

<head>
<title>For-Each Loop Logic</title>
</head>

<body>
<?php

//The following code uses a For-Each Loop to display contents of the $DaysOfWeek array

$DaysOfWeek = array ("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");

foreach ($DaysOfWeek as $Day)
{
	echo "<p>$Day</p>";
}
?>
</body>

</html>