<?php
// Denne include-siden er utviklet av William Rastad, siste gang endret 05.02.2019
// Includes og Connection
include_once("../includes/init.php");
include_once('../includes/ikke_logget_inn.inc.php');

$db = new PDO($dsn,$dbBrukernavn,$dbPassord);

// SQL query og values
$sql1 = "insert into interesser (interesse)";
$sql1.= "values (:interesser)";
$sql = "insert into interessekobling (brukerNavn,interesse)";
$sql.= "values (:studentid,:interesser)";

$brukernavn = $_SESSION['brukernavn'];
// Prepared statemens
$stmt1 =  $db->prepare($sql1);
$stmt1->bindParam(':interesser', $binteresse);

$stmt = $db->prepare($sql);
$stmt->bindParam(':studentid',$bstudentid);
$stmt->bindParam(':interesser',$binteresse);
// Henter verdier

$bstudentid = $brukernavn;
$binteresse = $_POST['interesser'];

// Kjører sql query
$stmt1->execute();
$stmt->execute();
header("Location: min_profil.php");
?>
