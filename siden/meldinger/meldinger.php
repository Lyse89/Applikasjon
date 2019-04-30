<!DOCTYPE html>
<html>
<head>
<title>Meldinger</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta charset="utf-8">
    <style>
      
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

    .inputBoks {
      width: 240px;
      float: left;
      margin: 5px 5px 5px 5px;
    }

    .inputTitel {
      margin: 5px 5px 5px 5px;
      clear: left;
      float: left;
      width: 320px;
    }

    .inputText {
      clear: left;
      float: left;
      margin: 5px 5px 5px 5px;
      height: 80px;
      width: 480px;
    }

    .sndBtn {
      float: left;
      clear: left;
      width: 70px;
      text-align: center;
      margin: 5px 5px 5px 5px;
    }

    fieldset {
      border: none;
    }

    </style>
    <?php
    include_once('../includes/ikke_logget_inn.inc.php');
    include_once('../includes/header_innlogget.php');
    ?>
  </head>
  <body>
    <div class="center">
      <form method="POST" action="form_send.php" onsubmit="sjekkSubmit();">
        <fieldset>
            <input type="email" placeholder="Til" name="til" id="til" class="inputBoks" onchange="sjekkFelt()" autofocus>
            <input type="email" placeholder="Fra" name="fra" id="fra" class="inputBoks" onchange="sjekkFelt()">
            <input type="text" placeholder="Titel" name="subj" id="subj" class="inputTitel" onchange="sjekkFelt()">
            <textarea type="text" placeholder="Tekst...." name="meld" id="meld" class="inputText"></textarea>
             <input type="submit" value="Send" name="send" id="send" class="sndBtn">
        </fieldset>
      </form>
  </div>

  </body>
</html>
