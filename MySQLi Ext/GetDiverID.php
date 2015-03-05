<html>
<head>
	<title>Register Diver</title>
	<link rel="stylesheet" href="php_styles.css" type="text/css" />
</head>
<body>
<h1>Aqua Don's Scuba School Registration</h1>
<?php
if (empty($_GET['first_name']) || empty($_GET['last_name']) || empty($_GET['phone']) || empty($_GET['address']) || empty($_GET['city']) || empty($_GET['state']) || empty($_GET['zip']) || empty($_GET['email']))
	exit("<p>You must enter values in all fields of the New Diver Registration form! Click your browser's Back button to return to the previous page.</p>");

$DBConnect = @mysqli_connect("localhost", "root", "password")
	Or die("<p>Unable to connect to the database server.</p>"
			. "<p>Error code " . mysqli_connect_errno()
			. ": " . mysqli_connect_error()) . "</p>";

$DBName = "scuba_school";

if (!@mysqli_select_db($DBConnect, $DBName)) 
{
	$SQLstring = "CREATE DATABASE $DBName";
	$QueryResult = @mysqli_query($DBConnect, $SQLstring)
			Or die("<p>Unable to execute the query.</p>"
					. "<p>Error code " . mysqli_errno($DBConnect)
					. ": " . mysqli_error($DBConnect)) . "</p>";

	echo "<p>Successfully created the database.</p>";
	mysqli_select_db($DBConnect, $DBName);
}

$TableName = "divers";
$SQLstring = "SELECT * FROM $TableName";
$QueryResult = @mysqli_query($DBConnect, $SQLstring);

if (!$QueryResult) 
{
 	$SQLstring = "CREATE TABLE divers (diverID SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY, first VARCHAR(40), last VARCHAR(40), phone VARCHAR(40), address VARCHAR(40), city VARCHAR(40), state VARCHAR(2), zip VARCHAR(10))";
 	$QueryResult = @mysqli_query($DBConnect, $SQLstring)
 		Or die("<p>Unable to create the divers table.</p>"
 		. "<p>Error code " . mysqli_errno($DBConnect)
 		. ": " . mysqli_error($DBConnect)) . "</p>";

	echo "<p>Successfully created the divers table.</p>";
}

$First = addslashes($_GET['first_name']);
$Last = addslashes($_GET['last_name']);
$Phone = addslashes($_GET['phone']);
$Address = addslashes($_GET['address']);
$City = addslashes($_GET['city']);
$State = addslashes($_GET['state']);
$Zip = addslashes($_GET['zip']);
$Email = addslashes($_GET['email']);
$SQLstring = "INSERT INTO divers VALUES(NULL, '$First', '$Last', '$Phone', '$Address', '$City', '$State', '$Zip')";

$QueryResult = @mysqli_query($DBConnect, $SQLstring)
	Or die("<p>Unable to execute the query.</p>"
 		. "<p>Error code " . mysqli_errno($DBConnect)
 		. ": " . mysqli_error($DBConnect)) . "</p>";

$DiverID = mysqli_insert_id($DBConnect);
mysqli_close($DBConnect);

?>
<p>Thanks <?= $First ?>! Your new diver ID is <strong><?= $DiverID ?></strong>.</p>
<form action="CourseListings.php" method="get">
	<p><input type="submit" value="Register for Classes" />
	<input type="hidden" name="diverID" value="<?= $DiverID ?>" /></p>
</form>
</body>
</html>