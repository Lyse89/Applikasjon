<?php

//    // For aa faa variabelen $salt
//    include_once("init.php");
//
//    // Maa endres til vaar server / localhost for lokal jobbing
//    $dsn = "mysql:host=158.36.139.21;dbname=innocent";
//
//    // Maa endres fra innocent, finne ut hva disse gjor
//    $db = new PDO($dsn,"Innocent","innocent");
//
//    $Melding = "";
//    if (isSet($_POST['Logginn']) and $_POST['Logginn'] == "Logg inn") {
//
//        if ($_POST['brukernavn'] == "" or $_POST['passord'] == "") {
//            $Melding = "Angi bruker og passord før du forsøker å logge inn.";
//        } else {
//
//            // Denne kan ikke si "Innocent"
//            if (!$db) {die("Kunne ikke connecte til Innocent");}
//
//            //  PDO prepared metode 
//            $sql = "select * from brukere where BrukerID=:br and Passord=:po";
//            $sth = $db->prepare($sql);
//
//            // Dobbel saltet og hashet passord
//            $passord = sha1($salt.sha1($salt.&_POST['passord']));
//
//            $sth->bindValue(':br', $_POST['brukernavn']);
//            $sth->bindValue(':po', $passord);
//            $sth->execute();
//            $res = $sth->fetchAll();
//
//            if ($res) {
//                Header("Location: ..\side_OK.html");
//            } else {
//
//                // Informasjon til bruker om at brukerId ikke finnes
//                $Melding = "<p>Finner ikke BrukerID</p>";
//            }
//        }
//    }
//

?>
<html>
<head>
<meta http-equiv="Content-Language" content="no-bok">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Logg inn</title>
</head>
<body>
<!-- Action maa endres til riktig fil -->
<form method="post" id="form1" action="logginn_PDO_5.php">
<h1 align="center">Du må logge inn for å få se den sida!</h1>
	<table border="0" cellpadding="3" cellspacing="0" style="border-collapse: collapse" width="100%" id="table1" bgcolor="#ccFFFF">
		<tr>
			<td width="50%" align="right" style="padding:2 10 2 10;">Bruker:</td>
			<td align="left" valign="top">
        <input type="text" id="Bruker" name="brukernavn" size="20" autofocus></td>
		</tr>
		<tr>
			<td width="50%" align="right" style="padding:2 10 2 10;">Passord:</td>
			<td align="left" valign="top">
        <input type="password" id="Passord" name="passord" size="20"></td>
		</tr>
	</table>
	<p align="center"><input type="submit" value="Logg inn" name="Logginn" id="Logginn"></p>
</form>
<span ID="Melding"><?php echo($Melding); ?></span>
</body>
</html>
