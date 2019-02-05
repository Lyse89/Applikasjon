<?php
// Denne include-siden er utviklet av William Rastad, siste gang endret 05.02.2019
// Includes og Connection
include_once("../includes/init.php");
$db = new PDO($dsn,$dbBrukernavn,$dbPassord);

// SQL query og values
$sql = "insert into bio (brukerNavn,bio)";
$sql.= "values (:studentid,:bio)";

// Prepared statemens
$stmt = $db->prepare($sql);
$stmt->bindParam(':studentid',$bstudentid);
$stmt->bindParam(':bio',$bbio);

// Henter verdier
session_start();
$bstudentid = '654321';
$bbio = $_POST['bio'];

// Kjører sql query
$stmt->execute();
?>
