<?php
    // Skrevet av William Rastad, Christoffer Sørensen og Simen .A Lyse.
    // Kontrollert av William Rastad og Christoffer Sørensen.

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
                // Login succesfull
                $cookie_name = $_POST["brukernavn"];
                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 dag
                header("Location: ../innlogget_forside/innlogget_forside2.php");
            } else {
                // Login Failed
                header("Location: logg_inn_siden.php");
            }
        }
    }
?>
