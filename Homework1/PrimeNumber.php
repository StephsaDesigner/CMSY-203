<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Prime Number Result</title>
</head>

<body>
<?php 
	$Number = $_POST["number"];

	if (is_numeric($Number)) 
	{
     	if($Number == 1 || $Number <= 999){

				for ($Count = 2; $Count < $Number; $Count++) {
        			if ($Number % $Count == 0 && $Count != $Number) {
						echo "$Number is not prime";
    			}
				else
				{
    				echo "$Number is prime";
				}
				}
	}
	else
	{
		echo "Please enter a number between 1 and 999";
	}
  	} 
	else
	{
       echo "Please enter a number";
    }
	
?>
</body>
</html>