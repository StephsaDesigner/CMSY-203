<html>

<head>
	<title>Coast City Bowling Tournament</title>
</head>

<body>
<h1>Coast City Bowling Tournament</h1>

<!--
The following example demonstrates how to use the file_put_contents() function with the FILE_APPEND
constant to add the names of bowlers to the "bowlers.txt" file.

The example consists of a single script that displays and processes a form that bowlers can use to register.

Because the file_put_contents() function includes the FILE_APPEND constant, any new names that are entered
in the form are appended to the "bowlers.txt" file.
-->

<?php

if (isset($_GET['first_name']) && isset($_GET['last_name'])) 
{
	$BowlerFirst = $_GET['first_name'];
	$BowlerLast = $_GET['last_name'];
	$NewBowler = $BowlerLast . ", " . "$BowlerFirst" . "\r\n";
	$BowlersFile = "bowlers.txt";
	if (file_put_contents($BowlersFile, $NewBowler, FILE_APPEND) > 0)
		echo "<p>{$BowlerFirst} {$BowlerLast} has been registered for the bowling tournament!</p>";
	else
		echo "<p>Registration error!</p>";
}
else
	echo "<p>To sign up for the bowling tournament, enter your first and last name and click the Register button.</p>";
?>
<form action="BowlingTournament.php" method="get">
<p>First Name: <input type="text" name="first_name" size="30" /></p>
<p>Last Name: <input type="text" name="last_name" size="30" /></p>
<p><input type="submit" value="Register" /></p>
</form>

</body>

</html>