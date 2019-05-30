<?php
// Denne include-siden er kontrollert av William Rastad, siste gang 29.05.2019 -->
// Denne include-siden er utviklet av William Rastad , siste gang endret 29.05.2019
include_once('../includes/ikke_logget_inn.inc.php');
include_once('../includes/rollesjekk.inc.php');
include_once("../includes/init.php");

$db = new PDO($dsn,"$dbBrukernavn","$dbPassord");

//  PDO prepared metode
$melding = "";
$sql = "select * from bruker where brukerNavn=:br and passord=:po";
$sth = $db->prepare($sql);

// Dobbel saltet og hashet passord
$gammeltpassord = sha1($salt.sha1($salt.$_POST['gammeltPassord']));

$sth->bindValue(':br', $_SESSION['brukernavn']);
$sth->bindValue(':po', $gammeltpassord);
$sth->execute();
$res = $sth->fetchAll();

if ($res) {
    $sql1 = "UPDATE bruker SET passord =:npo WHERE brukerNavn =:br";
    $sth1 = $db->prepare($sql1);

    $nyttpassord = sha1($salt.sha1($salt.$_POST['nyttPassord']));

    $sth1->bindValue(':br', $_SESSION['brukernavn']);
    $sth1->bindValue(':npo', $nyttpassord);

    $sth1->execute();
    $res1 = $sth1->fetchAll();
}
header("Location: profil.php");
?>
