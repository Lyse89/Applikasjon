<?php
// Denne include-siden er utviklet av William Rastad, siste gang endret 10.04.2019
// Includes og Connection
include_once("../includes/init.php");
include_once('../includes/ikke_logget_inn.inc.php');

$db = new PDO($dsn,$dbBrukernavn,$dbPassord);

// SQL query og values
$sql1 = "insert into studier (studie)";
$sql1.= "values (:registrer_studie)";
$sql = "insert into studiekobling (brukerNavn,studie)";
$sql.= "values (:studentid,:registrer_studie)";

$brukernavn = $_SESSION['brukernavn'];
// Prepared statemens
$stmt1 =  $db->prepare($sql1);
$stmt1->bindParam(':registrer_studie', $bstudie);

$stmt = $db->prepare($sql);
$stmt->bindParam(':studentid',$bstudentid);
$stmt->bindParam(':registrer_studie',$bstudie);
// Henter verdier

$bstudentid = $brukernavn;
$bstudie = $_POST['registrer_studie'];

// Kjører sql query
$stmt1->execute();
$stmt->execute();
header("Location: profil.php");
?>
