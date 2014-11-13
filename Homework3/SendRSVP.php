<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	if(empty($_GET['name']) || !isset($_GET['attendance'])){
		echo "<p>You must enter name and specify whether you will attend! Click your browser’s Back button to return to the RSVP form. </p>";
	} else{
		if($_GET['attendance'] == "yes"){
			$YesFile = "attending.txt";
			if (file_put_contents($YesFile, addslashes($_GET['name']) . ", " . $_GET['guests'] . "\n", FILE_APPEND)){
				echo "<p>Thanks for RSVP’ing! Were looking forward to seeing you!</p>";
			} else{
				echo "<p>Cannot save to the $YesFile file.</p>";
			}	
		}
		
		if($_GET['attendance'] == "no"){
			$NoFile = "notattanding.txt";
			if (file_put_contents($NoFile, addslashes($_GET['name']) .", " . $_GET['guests'] . "\n", FILE_APPEND)){
				echo "<p>Thanks for RSVP’ing! Sorry you can't come.</p>";
			} else{ 
				echo "<p>Cannot save to the $NoFile file.</p>";
			}
		}
	
	}

?>
</body>
</html>