<?php
session_start();
if (isset($_SESSION["logged_in"])){
	$userid = $_SESSION["logged_in"];
} else {
	exit();
}



$fragen = $_POST["frage"];
$score = array_sum($fragen);
$handle = fopen("antworten.csv", "a");
fputcsv($handle, array(md5($userid), $fragen));


//bereich um zu überprüfen, ob fragen von benutzer bereits beantwortet
$file = "benutzer.csv";
$handle = fopen ($file, "r+");
while($row = fgetcsv($handle)) {
		if( $row[0] == $userid){
			$row[] = bewertet;
			$row[] = $score;
			fputcsv($handle, array($userid, $score));
		}
}

//fclose($benutzer_handle);

?>