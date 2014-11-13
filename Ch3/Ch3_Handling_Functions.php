<html>
<head>
<title>Demo Code for Handling String Functions</title>
</head>
<?php

$StringLength = "Dear Students: This class has total of 14 students.";

echo "=======================================<br>";
echo $StringLength;
//Use the strlen(string) function to display the length of the string
echo '<p>The string "$StringLength" contains ' . strlen($StringLength) . ' characters.</p>';

//Use the str_word_count(string) function to display the word count in this string
echo '<p>The string "$StringLength" contains ' . str_word_count($StringLength) . ' words.</p>';

$Email = "JRajani@HowardCC.edu";

echo "=======================================<br>";
echo $Email;
//Use the strpos(string, search_string[, start_postion]) to display the first occurence of @ sign
//The following returns 7 (since the index begins from 0)
echo "<p>The @ sign is present at " . strpos($Email, "@") . " location in the given string.</p>";

//To check whether the email address has a @ sign...
//Use the strict operator to compare 
if (strpos($Email, '@') !== FALSE)
	echo "<p>Yes, the email address does contain @ sign.</p>";
else
	echo "<p>Oooops, the email address does NOT contain @ sign.</p>";

//Use substr(string, start_position[, length]) to extract portion of a string 
//when begin location and number of characters you want to extract are known
//The following returns the email id from the email address
//Should return JRajani
$NameEnd = strpos($Email, "@");  //returns 7
echo "<p>The email id from the address is: " . substr($Email, 0, $NameEnd) . ".</p>";


//Use combination of substr() and strpos() functions to get the domain name portion
//Should get you HowardCC
$DomainBegin = strpos($Email, "@") + 1;
$DomainEnd = strpos($Email, ".") - $DomainBegin;
echo "<p>The domain name portion of the email address is: " . substr($Email, $DomainBegin, $DomainEnd) . ".</p>";

//Use the strchr(string, search_string) to extract a portion of the string
//should return edu
echo "<p>The domain identifier of the email address is " . strchr($Email, ".") . ".</p>";


echo "<p>=======================================</p>";

//Use str_replace(search_string, replacement_string, string) to replace 
//All occurences of characters within a string
$Email = "President.VicePresident@HowardCC.edu";
echo $Email;

$NewEmail = str_replace("President", "Chairman", $Email);
echo "<p>The new email address is: " . $NewEmail . "</p>";

//Use substr_replace(search_string, replacement_string, string) to replace 
//Characters within a specified portion of a string
$Email = "President.VicePresident@HowardCC.edu";
echo $Email;

$NameEnd = strpos($Email, ".");
$NewEmail = substr_replace($Email, "Chairman", 0, $NameEnd);
echo "<p>" . $NewEmail . "</p>";

echo "=======================================";

//Use strtok(string, separators) function to break a string into smaller strings

echo "<br>";
$Presidents = "George W. Bush;William Clinton; George H. W. Bush; Ronald Reagan; Jimmy Carter";
$President = strtok($Presidents, ";");
while ($President != NULL)
{
	echo "$President <br>";
	$President = strtok(";");
}

echo "=======================================";

//Use explode(separators, string) function to split a string into an indexed array at a specified operator
echo "<br>";
$Presidents = "George W. Bush;William Clinton; George H. W. Bush; Ronald Reagan; Jimmy Carter";
$PresidentArray = explode(";", $Presidents);
foreach ($PresidentArray as $President)
{
	echo "$President<br>";
}

echo "=======================================";

//Use implode(separators, array) function to combine an array's elements into a single string, separated by specified characters

echo "<br>";
$PresidentsArray = array("George W. Bush", "William Clinton", "George H. W. Bush", "Ronald Reagan", "Jimmy Carter");
$Presidents = implode(", ", $PresidentsArray);
echo "$Presidents<br>";

?>
<body>
</body>
</html>
