<?php
//DOCTYPE
//Denne siden er utviklet av Simen Lyse, siste gang endret 02.05.2019
//Denne siden er kontrollert av Simen Lyse, siste gang 02.05.2019

// Sjekk for om brukeren er innlogget og videresending til innlogget forside
    include_once('../includes/ikke_logget_inn.inc.php');
?>

<html lang="en" dir="ltr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="siden/css/style.css">
    <meta charset="utf-8">
    <title>Meldinger</title>
    <style>

    </style>
</head>

<body>
<?php
include_once("../includes/init.php");
include_once('../includes/header_innlogget.php');
?>

<form class="sendMelding" action="send.inc.php" method="POST" onsubmit="sjekkSubmit();">
  <fieldset>
      <input type="email" placeholder="Til" name="til" id="til" class="inputBoks" onchange="sjekkFelt()" autofocus>
      <input type="email" placeholder="Fra" name="fra" id="fra" class="inputBoks" onchange="sjekkFelt()">
      <input type="text" placeholder="Titel" name="subj" id="subj" class="inputTitel" onchange="sjekkFelt()">
      <textarea type="text" placeholder="Tekst...." name="meld" id="meld" class="inputText"></textarea>
      <input type="submit" value="Send" name="send" id="send" class="sndBtn">
  </fieldset>
</form>


<!-- Footer -->
<footer class ="footer"></footer>

</body>
</html>
