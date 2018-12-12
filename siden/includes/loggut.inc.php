<?php
//Skrevet av Simen A. Lyse og William Rastad
// setter cookien til en time over utgangs datoen
// setcookie("CookieID", "CookieValue", time() - 3600);


session_abort();

header("Location: ../default.php");
?>
