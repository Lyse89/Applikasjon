<!DOCTYPE html>
<?php
    //include("cookie_script.php");
?>
<html>
<head>
</head>
<body>
    <p>Her er det litt tekst for aa se at siden laster</p>
<?php
    $tekst = "";
    if($tekst) {
        echo("Inne i if-test");
    }
    $tekst = "abc";
    if($tekst) {
        echo("Inne i if-test2");
    }

?>
</body>
</html>
