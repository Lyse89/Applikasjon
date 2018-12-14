<?php
    // Sjekk for om brukeren er logget inn 
    // Henvisning til innloggingsside dersom brukeren ikke er logget inn
    include_once('../includes/ikke_logget_inn.inc.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" type="text/css" href="../css/style.css">
  <head>
    <meta charset="utf-8">
    <title>Sosialt</title>
  </head>
  <body>
    <?php
    include_once('../includes/header_innlogget.php');
    ?>

    <a href="bytt_passord.php">Bytt passord</a>
    <a href="#LastOppProfilBilde">Last opp profil bilde</a>

  </body>
</html>
