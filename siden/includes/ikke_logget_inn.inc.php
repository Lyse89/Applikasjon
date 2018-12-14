<?php
session_start();
if (!isset($_SESSION['sessionId'])) {
    header("Location:../logg_inn/logg_inn_siden.php");
}
?>
