<?php
// Denne include-siden er utviklet av William Rastad, siste gang endret 05.02.2019
// Includes og Connection
include_once("../includes/init.php");
include_once('../includes/ikke_logget_inn.inc.php');


$db = new PDO($dsn,$dbBrukernavn,$dbPassord);
$brukernavn = $_SESSION['brukernavn'];

// SQL query og values
$sql = "UPDATE bio SET bio = :bio WHERE bio.brukerNavn = :studentid";

// Prepared statemens
$stmt = $db->prepare($sql);
$stmt->bindParam(':studentid',$bstudentid);
$stmt->bindParam(':bio',$bbio);

// Henter verdier
$bstudentid = $brukernavn;
$bbio = $_POST['bio'];

// Kjører sql query
$stmt->execute();
//header("Location: profil.php");
if ($stmt->rowCount() != 0){
    header("Location: profil.php");
}

if ($stmt->rowCount() == 0){
    $sql = "INSERT INTO bio (brukerNavn, bio)";
    $sql.= "VALUES (:studentid,:bio)";

    // Prepared statemens
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':studentid',$bstudentid);
    $stmt->bindParam(':bio',$bbio);
    // Henter verdier
    $bstudentid = $brukernavn;
    $bbio = $_POST['bio'];

    // Kjører sql query
    $stmt->execute();
    header("Location: profil.php");
    }
?>
