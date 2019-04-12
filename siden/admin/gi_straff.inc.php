<?php
// Denne include-siden er utviklet av William Rastad, siste gang endret 12.04.2019
include_once("../includes/init.php");
include_once('../includes/header_innlogget.php');
include_once('../includes/ikke_logget_inn.inc.php');

// Variabler
$db = new PDO($dsn,$dbBrukernavn,$dbPassord);
$brukernavn = $_POST['BrukerNavnGiStraff'];
$straff = $_POST['Straff'];


// Iftest for å sjekke hvilken straff som blir gitt
// If Utestengt (permanent)
if ($_POST['Straff'] === 'Utestengt') {
    $sql = "UPDATE bruker SET bruker.rolle = '$straff' WHERE bruker.brukerNavn = '$brukernavn'";
    $stmt = $db->prepare($sql);

    $stmt->bindParam($brukernavn,$bbrukernavn);
    $stmt->bindParam($straff,$bstraff);

    $bbrukernavn = $brukernavn;
    $bstraff = $straff;

    $stmt->execute();
}
// If Karantene (1 dag, 1 uke eller 1 måned)
elseif ( $_POST['Straff'] === 'Karantene' ) {
    $karanteneTid = $_POST['KaranteneVarighet'];

    $sql = "INSERT INTO karantene (brukerNavn, startTid, sluttTid) VALUES";
    $sql.= "('$brukernavn', now(), $karanteneTid)";

    $stmt = $db->prepare($sql);

    $stmt->bindParam($brukernavn,$bbrukernavn);
    $stmt->bindParam($karanteneTid,$bkaranteneTid);


    $bbrukernavn = $brukernavn;
    $bkaranteneTid = $karanteneTid;

    $stmt->execute();
}
elseif ( $_POST['Straff'] === 'Anmerkning' ) {
    $anmerkningforklaring = $_POST['anmerkningForklaring'];

    $sql = "INSERT INTO anmerkning (brukerNavn, tid, forklaring) VALUES";
    $sql.= "('$brukernavn', now(), '$anmerkningforklaring')";

    $stmt = $db->prepare($sql);

    $stmt->bindParam($brukernavn,$bbrukernavn);
    $stmt->bindParam($straff,$bstraff);
    $stmt->bindParam($anmerkningforklaring,$banmerkningforklaring);


    $bbrukernavn = $brukernavn;
    $bstraff = $straff;
    $banmerkningforklaring = $anmerkningforklaring;

    $stmt->execute();
}
header("Location: admin_hovedside.php");
?>
