<?php
if ($_SESSION['rolle'] != 'Admin') {
    header("Location:../../default.php");
}
?>
