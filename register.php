<?php
if ( isset($_POST["userid"])){
	session_start();
	$userid = $_POST["userid"];
	$passid = $_POST["passid"];
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$mail = $_POST["mail"];
	$file = "benutzer.csv";
	$handle = fopen ($file, "a+");
	while($row = fgetcsv($handle)) {
		if( $row[0] == $userid){
			header( 'Location: login.php' );
			exit();
		}
	}
	fputcsv($handle, array($userid, md5($passid), $mail, $firstname, $lastname));
	fclose($handle);
	$_SESSION["logged_in"] = $userid;
	header( 'Location: index.php');
	exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
            <title>Anmeldung</title>
            <meta name="keywords" content="gibb, JavaScript Form Validation, registration form" />
            <meta name="description" content="Dieses Dokument ist Teil von Modul 133" />
            <link rel='stylesheet' href='style.css' type='text/css' />
            <script src="register.js"></script>
        </head>
        <body onLoad="document.registration.userid.focus();">
            <h1>Anmeldung</h1>
            <form name='registration' onSubmit="return true /*formValidation();*/" action="register.php" method="post">
                <ul>
                    <li>
                        <label for="userid">Benutzername:</label>
                    </li>
                    <li>
                        <input type="text" name="userid" size="24" />
                    </li>
                    <li>
                        <label for="passid">Password:</label>
                    </li>
                    <li>
                        <input type="password" name="passid" size="24" />
                    </li>
                    <li>
                        <label for="passid2">wiederholen:</label>
                    </li>
                    <li>
                        <input type="password" name="passid2" size="24" />
                    </li>
                    <li>
                        <label for="firstname">Vorname:</label>
                    <li>
                        <input type="text" name="firstname" size="24" />
                    </li>
                    <li>
                        <label for="lastname">Nachname:</label>
                    <li>
                        <input type="text" name="lastname" size="24" />
                    </li>
                    <li>
                        <label for="mail">E-Mail Adresse:</label>
                    </li>
                    <li>
                        <input type="email" name="mail" size "24" />
                    </li>
                    <li>
                        <input type="submit" name="submit" value="senden" />
                    </li>
                    <li>
                        <input type="reset" name="reset" value="reset">
                    </li>
                </ul>
            </form>
        </body>
    </html>
