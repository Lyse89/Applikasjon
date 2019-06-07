<?php
// Denne include-siden er utviklet av Kirstoffer Sorensen siste gang endret 01.06.2019
// Kontrollert og testet av Kristoffer Sorensen, William Rastad, Simen Lyse , siste gang endret 01.06.2019
include('../includes/ikke_logget_inn.inc.php');
include("../includes/init.php");
include('../includes/logg_inn_db.inc.php');

$kommentar = $_POST['kommentar'];
$brukernavn = $_POST['brukernavn'];
$arrangementId = $_POST['arrangementId'];

// Trygg mot sql injection ettersom at id er en int og at brukernavn
// er vasket for escape chars ved registrering

$sql = "insert into kommentar(kommentar, tid, brukernavn, arrangementId)";
$sql .= "values (:kommentar, now(), :brukernavn, :arrangementId)";

$stmt =  $db->prepare($sql);

$stmt->bindParam(':kommentar', $kommentar);
$stmt->bindParam(':brukernavn', $brukernavn);
$stmt->bindParam(':arrangementId', $arrangementId);

$stmt->execute();

$arrangementside = 'Location: ../arrangement/arrangement.php?id=' . $arrangementId;
header($arrangementside);

?>
