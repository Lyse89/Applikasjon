<?php
//-- Denne include-siden er utviklet av Simen A. Lyse , siste gang endret 14.12.2018
// Denne include-siden er kontrollert av Simen A. Lyse, siste gang 14.12.2018 -->

include_once("../includes/init.php");

// Maa endres til vaar server / localhost for lokal jobbing
$dsn = "mysql:host=localhost;dbname=alumni05";

// Maa endres fra innocent, finne ut hva disse gjor
$db = new PDO($dsn,"$dbBrukernavn","$dbPassord");

$Melding = "";
if (isSet($_POST['byttePO_form']) and $_POST['byttePO_form'] == "Bytte passord") {

?>
