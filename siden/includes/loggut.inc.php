<?php
//Skrevet av Simen A. Lyse og William Rastad, siste gang endret 14.12.2018
// Denne include-siden er kontrollert av Simen A. Lyse, siste gang 14.12.2018 -->

session_start();
session_destroy();

header("Location: ../default.php");
?>
