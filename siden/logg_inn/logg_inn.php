<?php
    // Skrevet av William Rastad, Kristoffer Sorensen sist endret 14.12.2018
    // Kontrollert av William Rastad, Kristoffer Sorensen.

    // For aa faa variabelen $salt $dbBrukernavn $dbPassord
    include_once("../includes/init.php");

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
                $_SESSION['sessionId'] = 'sessionIdEtellerannet';

                header("Location: ../innlogget_forside/innlogget_forside2.php");


            } else {
                // Login Failed
                echo("Logg inn feiler");
                header("Location: logg_inn_siden.php");
            }
        }
    }
?>
