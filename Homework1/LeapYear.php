<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>LeapYear</title>
</head>

<body>
<?php
	$Year = $_POST["year"];
	
	if (is_numeric($Year)) 
	{
	
		if ((($Year % 4) == 0) && (($Year % 100) != 0) || (($Year % 400) == 0))
		{
			echo "<p>$Year is a leap year</p>";
		} 
		else
		{
			echo "<p>$Year is not a leap year</p>";	
		}
	}	
	else
	{
       echo "Please enter a number";
    }
	
?>
</body>
</html>