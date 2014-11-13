<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Hit Counter</title>
</head>

<body>

<?php
	$CounterFile = "hitcount.txt";
	
	if (file_exists($CounterFile)) {
		$Hits = file_get_contents($CounterFile);
		++$Hits;
	} else{
		$Hits = 1;
	}
	
	echo "<hl>There have been $Hits hits to this page!</hl>";
	
	if(file_put_contents($CounterFile, $Hits)){
		echo "<p>The counter file has been updated.</p>";
	}

?>
</body>
</html>