<?php
session_start();
if (isset($_SESSION["logged_in"])){
	$userid = $_SESSION["logged_in"];
} else {
	exit();
}

$handle_benutzer_check = fopen ("benutzer.csv", "r");
while ($row = fgetcsv($handle_benutzer_check)) {
		if ($row[0] == $userid){
			if ($row[6] == "bewertet"){
				exit;
			}
		} else {
			break;
		}


$fragen = $_POST["frage"];
$score = array_sum($fragen);
$handle_antworten = fopen("antworten.csv", "a");
fputcsv($handle_antworten, array(md5($userid), $fragen));


//fügt dem benutzer "bewertet" und die summe der antworten hinzu
$file = "benutzer.tmp";
$handle_benutzer = fopen ("benutzer.csv", "r");
$handle_benutzer_tmp = fopen ("benutzer.tmp", "w");
while ($row = fgetcsv($handle_benutzer )) {
		if ($row[0] == $userid){
			$row[] = "bewertet";
			$row[] = $score;
		}
fputcsv($handle_benutzer_tmp, $row);
}


rename("benutzer.tmp", "benutzer.csv");

//fclose($benutzer_handle);

?>