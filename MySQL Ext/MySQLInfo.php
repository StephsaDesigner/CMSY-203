<html>
<head>
	<title>MySQL Server Information</title>
	<link rel="stylesheet" href="php_styles.css" type="text/css" />
</head>
<body>
<h1>MySQL Database Server Information</h1>

<?php
$DBConnect = mysql_connect("localhost", "root","password");

echo "<p>MySQL client version: " . mysql_get_client_info() . "</p>";

echo "<p>MySQL connection: " . mysql_get_host_info($DBConnect) . "</p>";

echo "<p>MySQL protocol version: " . mysql_get_proto_info($DBConnect) . "</p>";

echo "<p>MySQL server version: " . mysql_get_server_info($DBConnect) . "</p>";

mysql_close($DBConnect);
?>
</body>
</html>
