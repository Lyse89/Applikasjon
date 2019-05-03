<?php
if ($_SESSION['rolle'] != 'Admin') {
    session_destroy();
    header("Location:../../default.php");
}
?>
