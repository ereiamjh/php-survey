<?php
if ( isset($_POST["userid"]) ){
	session_start();
	$userid = $_POST["userid"];
	$passid = $_POST["passid"];
	$file = "benutzer.csv";
	$handle = fopen ($file, "r");
	while($row = fgetcsv($handle)) {
		if( $row[0] == $userid ){
			if( $row[1] == md5($passid)){
				$_SESSION["logged_in"] = $userid;
				header( 'Location: index.php');
			} else{
				header( 'Location: login.php');
			}
		fclose($handle);
		}
	}
}
?>
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
            <form name='registration' onSubmit="return true /*formValidation();*/" method="post">
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
                        <input type="submit" name="submit" value="senden" />
                    </li>
                </ul>
            </form>
        </body>
    </html>

