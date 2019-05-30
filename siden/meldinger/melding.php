<?php
//DOCTYPE
//Denne siden er utviklet av Simen Lyse, siste gang endret 02.05.2019
//Denne siden er kontrollert av Simen Lyse, siste gang 02.05.2019

// Sjekk for om brukeren er innlogget og videresending til innlogget forside
include_once('../includes/ikke_logget_inn.inc.php');
include_once('../includes/init.php');

$bruker = $_SESSION['brukernavn'];
?>


<html lang="en" dir="ltr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta charset="utf-8">
    <title>Meldinger</title>
    <style>

    .innboks {
      border-style: solid;
      box-shadow: 10px 10px 8px #c0c0c0;
      margin: 50px 5% 0 5%;
      padding: 5px 5px 5px 5px;
    }

    .melding {
      border: solid;
      border-style: none double double;
      padding: 0px 0px 2px 5px;
    }

    h2 {
      margin: 0px 0px 0px 0px;
    }

    </style>
</head>

<body>
<?php
include_once("../includes/init.php");
include_once('../includes/header_innlogget.php');
?>

<form class="sendMelding" action="send.inc.php" method="POST" onsubmit="sjekkSubmit();">
  <fieldset>
      <input type="text" placeholder="Til" name="til" id="til" class="inputBoks" onchange="sjekkFelt()" autofocus>
      <input type="text" placeholder="Titel" name="subj" id="subj" class="inputTitel" onchange="sjekkFelt()">
      <textarea type="text" placeholder="Tekst...." name="meld" id="meld" class="inputText"></textarea>
      <input type="submit" value="Send" name="send" id="send" class="sndBtn">
  </fieldset>
</form>

<div class="innboks">
<h1>Innboks</h1>
<?php
    $stmt = $db->query("SELECT meldinger.avsender, meldinger.melding, meldinger.tittel FROM innutboks, meldinger WHERE meldinger.meldingID = innutboks.meldingID AND bruker = '$bruker' AND innut = 'inn';");

        if($stmt->rowCount()){
            while ($row = $stmt->fetch()){
              echo '<div class="melding">';
              echo '<h2>', 'Emne:  ', $row['tittel'], '</h2>';
              echo 'Fra:  ', $row['avsender'], '<br>';
              echo $row['melding'];
              echo '<br>';
              echo '</div>';
            }
        }
    ?>
</div>


<!-- Footer -->
<footer class ="footer"></footer>

</body>
</html>
