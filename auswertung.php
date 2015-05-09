

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
            <title>Auswertung</title>
        </head>
        <body>
        <?php
		$file = "benutzer.tmp";
		$handle_benutzer = fopen ("benutzer.csv", "r");
		$counter = 1;
		while ($row = fgetcsv($handle_benutzer )) {    
    		$userid = $row[0];
    		$score = $row[6];
		}
		?>
            <h1>Resultat/h1>
                <table>
                	<tr>
                		<th>Benutzer</th>
                		<th>Resultat</th>
                	</tr>
                    <?php
						echo "<tr>";
						echo "<td>$userid</td>";
						echo "<td>$score</td>";
						echo "</tr>";
                    ?>
                </table>
        </body>
    </html
