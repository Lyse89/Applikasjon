<?php
//Skrevet av Simen A. Lyse og William Rastad

session_start();
session_destroy();

header("Location: /app/siden/default.php");
?>
