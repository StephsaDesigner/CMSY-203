<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Sign Guest Book</title>
</head>

<body>
<?php

	if(empty($_GET['first_name']) || empty($_GET['last_name'])){
		echo "<p>You must enter name and specify whether you will attend! Click your browser’s Back button to return to the RSVP form. </p>";
	} else {
		$FirstName = addslashes($_GET['first_name']);
		$LastName =	addslashes($_GET['last_name']);
		$GuestBook = fopen( "guestbook.txt", "a");
		
		if (is_writable("guestbook.txt")) {
			if (fwrite($GuestBook, $LastName . "," . $FirstName . "\n")){
				echo "<p>Thank you for signing our guest book!</p>";
			} else {
				echo "<p>Cannot add your name to the guest book.</p>";
			}
		} else{
			echo "<p>Cannot write to the file.</p>";
			fclose($GuestBook);
		}
	}
	

?>
</body>
</html>