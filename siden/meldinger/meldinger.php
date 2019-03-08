<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" type="text/css" href="../css/style.css">
  <head>
    <meta charset="utf-8">
    <title>Meldinger</title>
    <style media="screen">
      input[type=text] {
        width: 240px;
        margin: 5px 5px 5px 5px;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        position: relative;
      }

      input[type=submit] {
        width: 140px;
        position: relative;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }

      input[type=submit]:hover {
        background-color: #45a049;
      }

      textarea {
        margin-top: 10px;
        margin-bottom: 10px;
        position: relative;
      }

    </style>
    <?php
    include_once('../includes/header_innlogget.php');
    include_once('../includes/ikke_logget_inn.inc.php');
    ?>
  </head>
  <body>
    <form class="sende" action="sendmeldigner.inc.php" method="post">
      <input type="text" name="mottaker" value="mottaker" placeholder="Mottaker">
      <textarea name="name" rows="12" cols="200"></textarea>
      <input type="submit" name="sendMelding" id="sendMelding">
    </form>

  </body>
</html>
