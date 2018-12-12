<?php
// setter cookien til en time over utgangs datoen
session_start();
session_destroy();
header("Location: ../default.php");
?>
