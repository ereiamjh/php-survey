<?php
session_start();
if (isset($_SESSION["logged_in"])){
	$userid = $_SESSION["logged_in"];
} else {
	exit();
}



$fragen = $_POST["frage"];
$score = array_sum($fragen);
$handle_antworten = fopen("antworten.csv", "a");
fputcsv($handle_antworten, array(md5($userid), $fragen));


//bereich um zu überprüfen, ob fragen von benutzer bereits beantwortet
$file = "benutzer.tmp";
$handle_benutzer = fopen ($file, "r+");
$handle_benutzer_tmp = fopen ($file, "r+");
while($row = fgetcsv($handle_benutzer_tmp)) {
		if( $row[0] == $userid){
			$row[] = "bewertet";
			$row[] = $score;
			fputcsv($handle_benutzer_tmp, $row[]);
		}
}


rename("benutzer.tmp", "benutzer.csv");

//fclose($benutzer_handle);

?>