<?php
include_once("../includes/init.php");
$db = new PDO($dsn,$dbBrukernavn,$dbPassord);

$sql = "insert into interessekobling (brukerNavn,interesse)";
$sql.= "values (:studentid,:interesser)";

?>
