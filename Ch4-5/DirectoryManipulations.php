<html>

<head>
	<title>Weather Service</title>
</head>

<body>
<h1>Weather Service - Demo for using Directories</h1>
<!--

To iterate through the entries in a directory, you open a handle to the directory with the opendir()
function. You can then use the readdir() function to return the file and directory names from the open directory.
Each time you call the readdir() function, it moves a directory pointer to the next entry in the directory.

After the directory pointer reaches the end of the directory, the readdir() function returns a value of false.

The following code demonstrates how to use the readdir() function to print the names of the files in the WINDOWS
program directory. Notice that the readdir() function is included as the conditional expression for the while
statement. As long as the readdir() function does not return a value of false, the while loop continues printing 
the names of the directory entries. Also notice at the end of the code that the directory handle is closed with
the closedir() function.

-->

<?php

$Dir = "C:\\WINDOWS";
$DirOpen = opendir($Dir);
while ($CurFile = readdir($DirOpen)) 
{
	echo $CurFile . "<br />";
}
closedir($DirOpen);

//To create a new directory in a location other than current directory, you can use a relative or an absolute path.
//If you attempt to create a directory that already exists, you receive an error.

//mkdir("E:\\tstPHP");

//You can also use the is_dir() function to check whether a directory exists before attempting to access it.
//The following code demonstrates how to use the is_dir() function before using the scandir() function:

if (is_dir($Dir))
{	
	$DirEntries = scandir($Dir, 0);
	foreach ($DirEntries as $Entry)
	{
		echo "<br />" . $Entry . "<br />";
	}
}
else
	echo "<p>The directory does not exists!</p>";

?>

</body>

</html>