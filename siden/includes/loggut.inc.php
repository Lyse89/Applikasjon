<?php
//Skrevet av Simen A. Lyse og William Rastad
// setter cookien til en time over utgangs datoen
<<<<<<< HEAD
// setcookie("CookieID", "CookieValue", time() - 3600);


session_abort();

=======
session_start();
session_destroy();
>>>>>>> 92ad7d643e279d0f8ca8cca440587d5d3e5792e7
header("Location: ../default.php");
?>
