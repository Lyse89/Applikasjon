<?php
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
