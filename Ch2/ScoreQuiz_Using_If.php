<html>
<head>
	<title>Great Explorers Quiz - If Statement</title>
	<link rel="stylesheet" href="php_styles.css" type="text/css" />
</head>
<body>
<h1>Quiz Results using If Statement</h1>
<?php
	function scoreQuestion1()
	{
		echo "Question 1: ", $_GET["question1"];
		if ($_GET["question1"] == "a")
			echo "(Correct)";
		else
			echo "(Incorrect)"; 
		echo "<br>";				
	}
	
	function scoreQuestion2()
	{
		echo "Question 2: ", $_GET["question2"];
		if ($_GET["question2"] == "b")
			echo "(Correct)";
		else
			echo "(Incorrect)"; 	
		echo "<br>";
	}

	function scoreQuestion3()
	{
		echo "Question 3: ", $_GET["question3"];
		if ($_GET["question3"] == "c")
			echo "(Correct)";
		else
			echo "(Incorrect)"; 	
		echo "<br>";			
	}
	
	function scoreQuestion4()
	{
		echo "Question 4: ", $_GET["question4"];
		if ($_GET["question4"] == "d")
			echo "(Correct)";
		else
			echo "(Incorrect)"; 	
		echo "<br>";			
	}

	function scoreQuestion5()
	{
		echo "Question 5: ", $_GET["question5"];
		if ($_GET["question5"] == "a")
			echo "(Correct)";
		else
			echo "(Incorrect)"; 	
		echo "<br>";			
	}
	
if (count($_GET) == 5)
{
	scoreQuestion1();
	scoreQuestion2();
	scoreQuestion3();
	scoreQuestion4();
	scoreQuestion5();
}
else
{
	echo "Please provide selections for all questions";
}	
?>
</body>
</html>