<html>

<head>
	<title>Coast City Bowling Tournament</title>
</head>

<body>
<h1>Coast City Bowling Tournament - using addslashes() function</h1>

<!--
The following example is a modified version of the script you saw in the previous file "BowlingTournament.php"

The script now includes addslashes() functions that escape the first and last names submitted by the user.

If you attempt to print the values assigned to the $BowlerFirst and $BowlerLast variables, any escaped
characters contained in the variables also print.

To prevent the display of escaped characters, use the stripslashes() function with the text you want to print.
-->

<?php

if (isset($_GET['first_name']) && isset($_GET['last_name'])) 
{
	$BowlerFirst = addslashes($_GET['first_name']);
	$BowlerLast = addslashes($_GET['last_name']);
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
<form action="BowlingTournament_addslashes.php" method="get">
<p>First Name: <input type="text" name="first_name" size="30" /></p>
<p>Last Name: <input type="text" name="last_name" size="30" /></p>
<p><input type="submit" value="Register" /></p>
</form>

</body>

</html>