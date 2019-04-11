<?php
//Denne siden er utviklet av Kristoffer Sorensen, siste gang endret 10.04.2018
//Denne siden er kontrollert av Kristoffer Sorensen, siste gang 10.04.2018


session_start();
// Denne parameteren (sessionId) skal endres til loggetInn
$_SESSION['sessionId'] = true;
$_SESSION['brukernavn'] = $_POST['brukernavn'];

?>
