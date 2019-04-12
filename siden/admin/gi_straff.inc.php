<?php
// Denne include-siden er utviklet av William Rastad, siste gang endret 12.04.2019
include_once("../includes/init.php");
include_once('../includes/header_innlogget.php');
include_once('../includes/ikke_logget_inn.inc.php');

// Variabler
$db = new PDO($dsn,$dbBrukernavn,$dbPassord);
$brukernavn = $_POST['BrukerNavnGiStraff'];
$straff = $_POST['Straff'];
$brukernavnAdmin = $_SESSION['brukernavn'];


// Iftest for å sjekke hvilken straff som blir gitt
// If Utestengt (permanent)
if ($_POST['Straff'] === 'Utestengt') {
    $sql = "UPDATE bruker SET bruker.rolle = '$straff' WHERE bruker.brukerNavn = '$brukernavn'";

    $sql1 ="INSERT INTO utestengt (brukerNavn, gittAv, tid)";
    $sql1.="VALUES('$brukernavn', '$brukernavnAdmin', now())";

    $stmt1 = $db->prepare($sql);
    $stmt = $db->prepare($sql);

    $stmt1->bindParam($brukernavn,$bbrukernavn);
    $stmt1->bindParam($brukernavnAdmin,$bbrukernavnAdmin);

    $stmt->bindParam($brukernavn,$bbrukernavn);
    $stmt->bindParam($straff,$bstraff);

    $bbrukernavn = $brukernavn;
    $bstraff = $straff;
    $bbrukernavnAdmin = $brukernavnAdmin;

    $stmt1->execute();
    $stmt->execute();
}
// If Karantene (1 dag, 1 uke eller 1 måned)
elseif ( $_POST['Straff'] === 'Karantene' ) {
    $karanteneTid = $_POST['KaranteneVarighet'];

    $sql = "INSERT INTO karantene (brukerNavn, gittAv, startTid, sluttTid) VALUES";
    $sql.= "('$brukernavn','$brukernavnAdmin', now(), $karanteneTid)";

    $sql1 = "UPDATE bruker SET bruker.rolle = '$straff' WHERE bruker.brukerNavn = '$brukernavn'";

    $stmt = $db->prepare($sql);
    $stmt1 = $db->prepare($sql1);

    $stmt->bindParam($brukernavn,$bbrukernavn);
    $stmt->bindParam($karanteneTid,$bkaranteneTid);
    $stmt->bindParam($brukernavnAdmin,$bbrukernavnAdmin);
    $stmt1->bindParam($straff,$bstraff);

    $bbrukernavn = $brukernavn;
    $bkaranteneTid = $karanteneTid;
    $bbrukernavnAdmin = $brukernavnAdmin;
    $bstraff = $straff;

    $stmt->execute();
    $stmt1->execute();
}
elseif ( $_POST['Straff'] === 'Anmerkning' ) {
    $anmerkningforklaring = $_POST['anmerkningForklaring'];

    $sql = "INSERT INTO anmerkning (brukerNavn, gittAv, tid, forklaring) VALUES";
    $sql.= "('$brukernavn','$brukernavnAdmin' now(), '$anmerkningforklaring')";

    $stmt = $db->prepare($sql);

    $stmt->bindParam($brukernavn,$bbrukernavn);
    $stmt->bindParam($anmerkningforklaring,$banmerkningforklaring);
    $stmt->bindParam($brukernavnAdmin,$bbrukernavnAdmin);


    $bbrukernavn = $brukernavn;
    $banmerkningforklaring = $anmerkningforklaring;
    $bbrukernavnAdmin = $brukernavnAdmin;

    $stmt->execute();
}
header("Location: admin_hovedside.php");
?>
