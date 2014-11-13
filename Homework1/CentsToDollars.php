<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Cents to Dollars Results</title>
</head>

<body>
<?php
	$Cents = $_POST["cents"];
	
	if (is_numeric($Cents)) 
	{
       $Dollars = $Cents/100;
	   
	   echo "You have \$$Dollars"; 
		
    } 
	else
	{
       echo "Please enter a number";
    }

?>
</body>
</html>