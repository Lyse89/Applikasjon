<?php
// setter cookien til en time over utgangs datoen
setcookie(brukernavn, "", time() - 3600);
header("Location: ../default.php");
?>
