<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Passenger Train</title>
</head>

<body>
<?php
	$milesTraveled = $_GET['miles'];
	$numberOfStops = $_GET['stops'];
	$weatherConditions = $_GET['weather'];
	
	//is set
	if (isset($milesTraveled, $numberOfStops, $weatherConditions)){
		//is numeric
		if (is_numeric($milesTraveled, $numberOfStops)){
		
		/***Begin program***/
		
		//weather is set to good
		if ($weatherConditions == "good")
		{
			$destinationTime = (($milesTraveled/50)*60) + (5*$numberOfStops);
			//echo "<p>The train will get to it's desination in ", floor($destinationTime), " minutes</p>";
			if ($destinationTime >= 60){
				$destinationTime = $destinationTime/60;
				echo "<p>The train will get to it's desination in ", round($destinationTime, 2), " hours and ", $destinationTime%60, " minutes</p>";
			} else{
				echo "<p>The train will get to it's desination in ", floor($destinationTime), " minutes</p>";
			}
			//weather is set to bad
			} else{
				$destinationTime = (($milesTraveled/40)*60) + (5*$numberOfStops);
				if ($destinationTime >= 60){
					$destinationTime = $destinationTime/60;
					echo "<p>The train will get to it's desination in ", floor($destinationTime), " hours and ", $destinationTime%60, " minutes</p>";
				} else{
					echo "<p>The train will get to it's desination in ", floor($destinationTime), " minutes</p>";
				}
			
			} //end waether is set to bad
		}//end is_numeric
		else{
			echo "<p>Please enter a number</p>";
		}
	}//end isset
	else{
		echo "<p>Please fill out the information below:</p>";
	}

?>

<form action="PassengerTrain.php" method="get">
	<p>Please enter the miles the train is traveling<br />
	<input type="text" name="miles" /></p>
	<p>Please input the number of stops the train will make<br />
	<input type="text" name="stops" /></p>
	<p>Please select one weather condition<br />
	<input type="radio" name="weather" value="good"/>Good<br />
	<input type="radio" name="weather" value="bad"/>Bad</p> 
	<p><input type="submit" value="Submit" /></p>
</form>

</body>
</html>