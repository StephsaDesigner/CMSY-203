<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Perfect Palindrome</title>
</head>

<body>
<?php

	if (isset($_GET['palindrome'])){
		$testWord = $_GET['palindrome'];
		$reverseWord = strrev($testWord);
		
		if ($testWord == $reverseWord)
		{
			echo "<p>{$testWord} is a palindrome</p>";
		} else{
			echo "<p>{$testWord} is not a palindrome</p>";
		}	
	}
	else{
		echo "<p>Please enter a word to see if it's a perfect palindrome</p>";
	}

?>

<form action="PerfectPalindrome.php" method="get">
<p><input type="text" name="palindrome" /></p>
<p><input type="submit" value="Submit" /></p>
</form>

</body>
</html>