<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" type="text/css" href="../css/style.css">
  <head>
    <meta charset="utf-8">
    <title>Meldinger</title>
    <style>
    form {
      margin: 5px 5px 30px 20px;
    }

    body {
      margin: 0;
      padding: 0;
      background-color: #ddd;
    }

    .center {
        box-shadow: 10px 10px 8px #c0c0c0;
        margin: 0 5% 50px 5%;
        margin-top: 50px;
        padding: 0 2% 0 2%;
        width: 86%;
        /*max-width: 1230px;*/
        background-color: white;
        float: left;
        /*margin-bottom: 50px;*/
    }

    .instillinger-boks {
        width: 260px;
        padding: 30px;
    }

    </style>
    <?php
    include_once('../includes/header_innlogget.php');
    include_once('../includes/ikke_logget_inn.inc.php');
    ?>
  </head>
  <body>
    <div class="center">
        <form class="instillinger-boks" action="sendmeldigner.inc.php" method="post">
          <h2>Send en melding</h2>
          <input type="text" name="mottaker" value="mottaker" placeholder="Mottaker">
          <textarea name="name" rows="14" cols="120"></textarea>
          <input type="submit" name="sendMelding" id="sendMelding">
        </form>
  </div>

  </body>
</html>
