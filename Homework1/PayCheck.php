<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Pay Check Result</title>
</head>

<body>
<?php
	$Hours = $_GET["hours"];
	$Wage = $_GET["wage"];
	
	if (is_numeric($Hours) && is_numeric($Wage)){
		if ( $Hours <= 40 )
		{
			$PayCheck = $Hours * $Wage;
			echo "<p>Your paycheck this week will be $PayCheck</p>";
		}
	
		if ( $Hours > 40 )
		{
			$PayCheck = ($Hours - 40) * ($Wage * 1.5);
			echo "<p>Your paycheck with over time is $PayCheck</p>";	
		}
	}
	else
	{
       echo "Please enter a number";
    }

?>
</body>
</html>