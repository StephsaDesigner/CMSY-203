<html>

<head>
<title>For Loop and While Loop Logic</title>
</head>

<body>
<?php

//First a while loop

$Count = 1;
echo "<br>----Using While Loop----<br>";
while ($Count <= 5)
{
	echo "$Count<br>";
	++$Count;
}

//This script will now use For Loop

echo "<br>----Using For Loop----<br>";
for ($Count = 1; $Count <= 5; ++$Count)
{
	echo "$Count<br>";
}
?>
</body>

</html>