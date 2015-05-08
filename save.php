<?php
session_start();
if (isset($_SESSION["logged_in"])){
	$userid = $_SESSION["logged_in"];
} else {
	exit();
}

//prüfen ob userid in beantwortet.csv
//wenn ja dann exit()

$fragen = $_POST["frage"];
$score = array_sum($fragen);

$handle = fopen("antworten.csv", "a");
fwrite($handle, $antworten);
//wenn nicht geht implode von fragen hier
fputcsv($handle, array(md5($userid), $fragen));

var_dump($antworten);

$benutzer_handle = fopen("beantwortet.csv", "w+");
fputcsv($handle, array($userid, $score));


//fclose($benutzer_handle);

?>