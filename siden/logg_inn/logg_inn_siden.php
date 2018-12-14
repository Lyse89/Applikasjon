<!-- Denne siden er utviklet av William Rastad og Kristoffer Sorensen, siste gang endret 14.12.2018 -->
<!-- Denne siden er kontrollert av William Rastad og Kristoffer Sorensen, siste gang 14.12.2018 -->

<?php

    // For aa faa variabelen $salt $dbBrukernavn $dbPassord
    include_once("../includes/init.php");

    // Maa endres til vaar server / localhost for lokal jobbing
    $dsn = "mysql:host=localhost;dbname=alumni05";

    // Maa endres fra innocent, finne ut hva disse gjor
    $db = new PDO($dsn,"$dbBrukernavn","$dbPassord");

    $Melding = "";
    if (isSet($_POST['Logginn']) and $_POST['Logginn'] == "Logg inn") {

        if ($_POST['brukernavn'] == "" or $_POST['passord'] == "") {
            $Melding = "Angi bruker og passord f�r du fors�ker � logge inn.";
        } else {

            if (!$db) {die("Kunne ikke connecte til Databasen");}

            //  PDO prepared metode
            $sql = "select * from bruker where brukerNavn=:br and passord=:po";
            $sth = $db->prepare($sql);

            // Dobbel saltet og hashet passord
            $passord = sha1($salt.sha1($salt.$_POST['passord']));

            $sth->bindValue(':br', $_POST['brukernavn']);
            $sth->bindValue(':po', $passord);
            $sth->execute();
            $res = $sth->fetchAll();

            if ($res) {
                session_start();
                // Denne parameteren (sessionId) skal endres til loggetInn
                $_SESSION['sessionId'] = 'sessionIdEtellerannet';

                header("Location: ../innlogget_forside/innlogget_forside2.php");


            } else {
                // Login Failed
                echo("Innlogging mislykket");
                // header("Location: logg_inn_siden.php");
            }
        }
    }
?>
<html>
<head>
<meta http-equiv="Content-Language" content="no-bok">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Logg inn</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<style>
input[type=password], input[type=text]{
	width: 20%;
	padding: 10px;
	margin: 4px 0px 10px 10px;
	display: inline-block;
	border: 1;
	background: #f1f1f1;
}
</style>
</head>


<body>
<nav>
	<a class="bilde" href="../default.php">
	  <img class="logo-navHeaderForsiden" src="../img/logo.png" alt="Logoen til USN" width="84" height="42">
	</a>
</nav>

<!-- Action post log_inn.php-->
<form method="post" id="form1" action="logg_inn_siden.php">
<h1 align="center">Logg inn her</h1>
	<table border="0" cellpadding="3" cellspacing="0" style="border-collapse: collapse" width="100%" id="table1">
		<tr>
			<td align="center" valign="top">
        <input type="text" id="Bruker" name="brukernavn" placeholder="Brukernavn" autofocus></td>
		</tr>

		<tr>
			<td align="center" valign="top">
        <input type="password" id="Passord" name="passord" placeholder="Passord"></td>
		</tr>
	</table>
	<p align="center"><input type="submit" value="Logg inn" name="Logginn" id="Logginn"></p>
</form>
<span ID="Melding"><?php echo($Melding); ?></span>
</body>
</html>
