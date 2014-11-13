<html>
<head>
	<title>Great Explorers Quiz</title>
	<link rel="stylesheet" href="php_styles.css" type="text/css" />
</head>
<body>
<h1>Quiz Results</h1>
<?php
	echo "<p>Question 1: ", $_GET["question1"], "</p>";
	echo "<p>Question 2: ", $_GET["question2"], "</p>";
	echo "<p>Question 3: ", $_GET["question3"], "</p>";
	echo "<p>Question 4: ", $_GET["question4"], "</p>";
	echo "<p>Question 5: ", $_GET["question5"], "</p>"; 
?>
</body>
</html>