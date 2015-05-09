<?php
session_start();
if (!isset($_SESSION["logged_in"])){
	header( 'Location: login.php' );
		exit();
}
$benutzer = $_SESSION["logged_in"];
$file = "fragen.csv";
$handle = fopen ($file, "r");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
            <title>Formular</title>
            <meta name="keywords" content="gibb, JavaScript Form Validation, registration form" />
            <meta name="description" content="Dieses Dokument ist Teil von Modul 133" />
            <link rel='stylesheet' href='style.css' type='text/css' />
            <script src="register.js"></script>
        </head>
        <body>
            <h1>Fragen</h1>
            <form name='registration' onSubmit="return true /*formValidation();*/" action="save.php" method="post">
                <table>
                	<tr>
                		<th>Frage</th>
                		<th>Nein</th>
                		<th>Eher<br>Nein</th>
                		<th>Eher<br>Ja</th>
                		<th>Ja</th>
                		<th>Keine<br>Meinung</th>
                	</tr>
                    <?php
                    $counter = 0;
                    while (($frage = fgets($handle)) !== false) {
						echo "<tr>";
						echo "<td>$frage</td>";
						echo "<td><input type='radio' name='frage[$counter]' value='0'></td>";
						echo "<td><input type='radio' name='frage[$counter]' value='25'></td>";
						echo "<td><input type='radio' name='frage[$counter]' value='75'></td>";
						echo "<td><input type='radio' name='frage[$counter]' value='100'></td>";
						echo "<td><input type='radio' name='frage[$counter]' value='50'></td>";
						echo "</tr>";
						$counter++;
                    }
                    ?>
                </table>
                <input type="submit" name="submit" value="senden" />
            </form>
        </body>
    </html