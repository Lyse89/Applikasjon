<!-- Denne include-siden er utviklet av Simen A. Lyse , siste gang endret 14.12.2018
// Denne include-siden er kontrollert av Simen A. Lyse, siste gang 14.12.2018 -->
<?php
session_start();
if (!isset($_SESSION['sessionId'])) {
    header("Location:../logg_inn/logg_inn_siden.php");
}
?>
