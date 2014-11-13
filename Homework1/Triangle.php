<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Triangle</title>
</head>

<body>
<?php
	$Side1 = $_GET["side1"];
	$Side2 = $_GET["side2"];
	$Side3 = $_GET["side3"];
	
	if (is_numeric($Side1) && is_numeric($Side2) && is_numeric($Side3))
	{
		$Sum1 = $Side1 + $Side2;
		$Sum2 = $Side2 + $Side3;
		$Sum3 = $Side1 + $Side3;
	
		if ( $Sum1 > $Side3 && $Sum2 > $Side1 && $Sum3 > $Side2)
		{
			echo "<p>These sides form a triangle!</p>";
		}
		else
		{
			echo "<p>These sides can not form a triangle!</p>";
		}
	}
	else
	{
       echo "Please enter a number";
    }

?>
</body>
</html>