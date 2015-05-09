<?php
session_start();
if (isset($_SESSION["logged_in"])){
        $userid = $_SESSION["logged_in"];
} else {
        exit();
}

$handle_benutzer_check = fopen ("benutzer.csv", "r");
while ($row = fgetcsv($handle_benutzer_check)) {
        if ($row[0] == $userid) {
                if (isset($row[5]) && $row[5] == "bewertet"){
                        echo 'schon beantwortet'; // Sollte nie angezeigt werden. Da man nicht zweimal submit drücken kann.
                        header ('Location: auswertung.php' );
                } else {
                        break;
                }
        }
}

$fragen = $_POST["frage"];
$score = array_sum($fragen);
$handle_antworten = fopen("antworten.csv", "a");
array_unshift($fragen, md5($userid));
fputcsv($handle_antworten, $fragen);


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
        header('Location: auswertung.php' );
}


rename("benutzer.tmp", "benutzer.csv");
 
//fclose($benutzer_handle);
 
?>