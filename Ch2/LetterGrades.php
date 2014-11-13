<html>
<head>
<title>Letter Grades</title>
</head>
<body>
<?php
function checkGrade($Grade) {
	switch ($Grade) {
		case "A":
			print "Your grade is excellent.";
			break;
		case "B":
			print "Your grade is good.";
			break;
		case "C":
			print "Your grade is fair.";
			break;
		case "D":
			print "You are barely passing.";
			break;
		case "F":
			print "You failed.";
			break;
		default:
			print "You did not enter a valid letter grade";
	}
}
checkGrade($_POST["grade"]);
?>
</body>
</html>
