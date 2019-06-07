<?php
// Denne include-siden er utviklet av Kristoffer Sorensen siste gang endret 01.06.2019
// Kontrollert og testet av Kristoffer Sorensen, William Rastad, Simen Lyse , siste gang endret 01.06.2019
function logginnFunksjon($brukernavn, $passord){
    include("../includes/init.php");

    $db = new PDO($dsn,$dbBrukernavn,$dbPassord);

    //  PDO prepared metode
    $sql = "select * from bruker where brukerNavn=:br and passord=:po";
    $sth = $db->prepare($sql);

    // Dobbel saltet og hashet passord
    $passord = sha1($salt.sha1($salt.$_POST['passord']));

    $sth->bindValue(':br', $brukernavn);
    $sth->bindValue(':po', $passord);
    $sth->execute();
    $res = $sth->fetchAll();

    if ($res) {
        session_start();
        // Denne parameteren (sessionId) skal endres til loggetInn
        $_SESSION['sessionId'] = true;
        $_SESSION['brukernavn'] = $brukernavn;
    }
}
?>
