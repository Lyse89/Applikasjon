<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Meldinger</title>
    <style media="screen">

    </style>
    <?php
    include_once('../includes/header_innlogget.php');
    include_once('../includes/ikke_logget_inn.inc.php');
    ?>
  </head>
  <body>
    <form class="sende" action="sendmeldigner.inc.php" method="post">
      <input type="text" name="mottaker" value="mottaker" placeholder="Mottaker">
      <textarea name="name" rows="8" cols="80"></textarea>
    </form>

  </body>
</html>
