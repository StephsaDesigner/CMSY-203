<html>

<head>
	<title>Coast City Bowling Tournament</title>
</head>

<body>
<h1>Coast City Bowling Tournament - using lock features</h1>
<p>Sample Data:
<br>
Don \"The Rocket\"
<br>
Gosselin
</p>
<!--
The following example adds new names to the Bowlers.txt file.

A single name is assigned to the $NewBowler variable. The flock() function use the LOCK_EX constant
to lock the bowlers.txt file for writing. If the lock is successful, a nested if..else statement
attempts to write the name to the file and prints a message stating whether the fwrite() function was successful.
The last statement in the main if statement then uses the LOCK_UN constant with the flock() function to unlock
the bowlers.txt file.
-->

<?php

$BowlersFile = fopen("bowlers.txt", "a");
$FirstName = "Don \"The Rocket\"";
$LastName = "Gosselin";
$NewBowler = addslashes("$LastName, $FirstName\r\n");

if (flock($BowlersFile, LOCK_EX)) 
{
	if (fwrite($BowlersFile, $NewBowler) > 0)
		echo "<p>" . stripslashes($FirstName) . " " . stripslashes($LastName) . " has been registered for the bowling tournament!</p>";
	else
		echo "<p>Registration error!</p>";
	flock($BowlersFile, LOCK_UN);
}
else
	echo "<p>Cannot write to the file. Please try again later.</p>";
fclose($BowlersFile);
?>
<form action="BowlingTournament_lock.php" method="get">
<p>First Name: <input type="text" name="first_name" size="30" /></p>
<p>Last Name: <input type="text" name="last_name" size="30" /></p>
<p><input type="submit" value="Register" /></p>
</form>

</body>

</html>