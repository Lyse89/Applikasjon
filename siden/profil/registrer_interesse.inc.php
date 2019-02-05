<?php
// Denne include-siden er utviklet av William Rastad, siste gang endret 05.02.2019
// Includes og Connection
include_once("../includes/init.php");
$db = new PDO($dsn,$dbBrukernavn,$dbPassord);

// SQL query og values
$sql = "insert into interesser (brukerNavn,interesse)";
$sql.= "values (:studentid,:interesser)";

// Prepared statemens
$stmt = $db->prepare($sql);
$stmt->bindParam(':studentid',$bstudentid);
$stmt->bindParam(':interesser',$binteresse);

// Henter verdier
$bstudentid = '123456';
$binteresse = $_POST['interesser'];

// Kjører sql query
$stmt->execute();

?>
