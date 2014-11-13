<?php

$TournamentBowlers = "Blair, Dennis\r\n";
$TournamentBowlers .= "Hernandez, Louis\r\n";
$TournamentBowlers .= "Miller, Erica\r\n";
$TournamentBowlers .= "Morinaga, Scott\r\n";
$TournamentBowlers .= "Picard, Raymond\r\n";
$BowlersFile = "bowlers.txt";

if (file_put_contents($BowlersFile, $TournamentBowlers) > 0)
	echo "<p>Data was successfully written to the $BowlersFile file.</p>";
else
	echo "<p>No data was written to the $BowlersFile file.</p>";

?>