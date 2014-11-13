<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Standard Palindrome</title>
</head>

<body>
<?php

	if (isset($_GET['palindrome'])){
		$pal = $_GET['palindrome'];
		
		function palindrome($phrase){
			$testPhrase = strtolower(preg_replace('/[^a-z]+/i', '', $phrase));
		
			if($testPhrase == strrev($testPhrase)){
				echo "<p>{$phrase} is a palindrome</p>";
			} else{
				echo "<p>{$phrase} is not a palindrome</p>";
			}
		}
		
		palindrome($pal);
		
	}
	else{
		echo "<p>Please enter a phrase to see if it's a standard palindrome</p>";
	}

?>

<form action="StandardPalindrome.php" method="get">
<p><input type="text" name="palindrome" /></p>
<p><input type="submit" value="Submit" /></p>
</form>
</body>
</html>