<?php
//Skrevet av Simen A. Lyse og William Rastad
// setter cookien til en time over utgangs datoen

session_start();
session_destroy();

header("Location: /app/siden/default.php");
?>
