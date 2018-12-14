<!-- Skrevet av Kristoffer Sorensen -->
<!-- Kontrollert av -->
<!-- Mangler styling for logg-inn -->

<?php
    // Kontrollert av William Rastad og Kristoffer Sorensen.

    // Sjekk for om brukeren er logget inn 
    // Henvisning til innloggingsside dersom brukeren ikke er logget inn
    include_once('../includes/ikke_logget_inn.inc.php');


    // For aa faa variabelen $salt $dbBrukernavn $dbPassord
    include_once("../includes/init.php");

    // Maa endres til vaar server / localhost for lokal jobbing
    $dsn = "mysql:host=localhost;dbname=alumni05";

    // Maa endres fra innocent, finne ut hva disse gjor
    $db = new PDO($dsn,"$dbBrukernavn","$dbPassord");

    $Melding = "";
    if (isSet($_POST['Logginn']) and $_POST['Logginn'] == "Logg inn") {

        if ($_POST['brukernavn'] == "" or $_POST['passord'] == "") {
            $Melding = "Angi bruker og passord for du forsoker aa logge inn.";
        } else {

            if (!$db) {die("Kunne ikke connecte til Databasen");}

            //  PDO prepared-metode
            $sql = "select * from bruker where brukerNavn=:br and passord=:po";
            $sth = $db->prepare($sql);

            // Dobbel saltet og hashet passord
            $passord = sha1($salt.sha1($salt.$_POST['passord']));

            $sth->bindValue(':br', $_POST['brukernavn']);
            $sth->bindValue(':po', $passord);
            $sth->execute();
            $res = $sth->fetchAll();

            // Sjekker om det er funnet treff paa brukernavn og passord
            if ($res) {
                session_start();
                $_SESSION['Innlogget'] = true;

                // Sender brukeren til forsiden for innloggede brukere
                header("Location: ../innlogget_forside/innlogget_forside2.php");


            } else {
                // Innlogging feilet
                $Melding = "Innlogging mislyktes";
                // header("Location: logg_inn_siden.php");
            }
        }
    }
?>

<html>
<head>
<title>Innloggingsside - USN Alumni</title>
</head>

<body>
    <form method="post" id="form1" action="logg_inn_siden.php">
        <h1 align="center">Du må logge inn for å få se den sida!</h1>
        <span ID="Melding"><?php echo($Melding); ?></span>

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

</body>
</html>
