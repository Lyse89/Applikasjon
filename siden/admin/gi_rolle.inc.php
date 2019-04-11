<?php
// Denne include-siden er utviklet av William Rastad, siste gang endret 11.04.2019
include_once("../includes/init.php");
include_once('../includes/header_innlogget.php');
include_once('../includes/ikke_logget_inn.inc.php');


$db = new PDO($dsn,$dbBrukernavn,$dbPassord);

// SQL query og values
$brukernavn = $_POST['BrukerNavnGiRolle'];
$rolle = $_POST['Roller'];

$sql = "UPDATE bruker SET bruker.rolle = '$rolle' WHERE bruker.brukerNavn = '$brukernavn'";

$stmt = $db->prepare($sql);
$stmt->bindParam($brukernavn,$bbrukernavn);
$stmt->bindParam($rolle,$brolle);

$bbrukernavn = $brukernavn;
$brolle = $rolle;

$stmt->execute();
header("Location: admin_hovedside.php");
?>
