<?php
/* DOCTYPE
Denne siden er utviklet av Simen Lyse, siste gang endret 05.06.2019
Denne siden er kontrollert av Simen Lyse, siste gang 05.06.2019 */


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

    .boks1 {
      border-style: solid;
      box-shadow: 10px 10px 8px #c0c0c0;
      margin: 50px 4% 0 4%;
    }

    .boks2 {
      border-style: solid;
      box-shadow: 10px 10px 8px #c0c0c0;
      margin: 50px 4% 0 4%;
    }

    .melding {
      border: solid;
      border-style: none double double;
      padding: 0px 0px 2px 5px;
    }

    h2 {
      margin: 0px 0px 0px 0px;
    }

    textarea {
      margin: 2px 2px 2px 2px;
      border: 1px solid;
      height: 100px;
      width: 80%;
    }

    .sendMelding {
      background-color: #c0c0c0;
      margin: 0 5% 0 5%;
    }

    .sndBtn {
        float: right;
        margin-right: 12.5%;
        background: #f1f1f1;
        font-size: 17px;
        border: none;
        cursor: pointer;
        margin-top: 10px;
    }

    @media screen and (min-width: 768px) {


      .boks1 {
        float: left;
        width: 40%;
      }

      .boks2 {
        float: right;
        width: 40%;
      }

    }


    </style>
</head>

<body>
  <?php
  include_once('../includes/header_innlogget.php');
  ?>

  <script type="text/javascript">
    function sjekkFelt() {
      var error = "";
      if (document.getElementById('til').value == "") {
        error += "Skriv in mottaker \n";
        document.getElementById('til').style.border = "1px solid red";
      }
      if (document.getElementById('subj').value == "") {
        error += "Skriv in Tittel \n";
        document.getElementById('subj').style.border = "1px solid red";
      }
      if (document.getElementById('meld').value == "") {
        error += "Skriv in en Melding \n";
        document.getElementById('meld').style.borderColor = "red";
      }
      if (error != "") {
        alert(error);
        return false;
      }
    }
  </script>

<form class="sendMelding" action="send.inc.php" method="POST" onsubmit="return sjekkFelt();">
  <fieldset>
      <input type="text" placeholder="Til (brukernavn)" name="til" id="til" class="inputBoks" autofocus>
      <input type="text" placeholder="Tittel" name="subj" id="subj" class="inputTitel">
      <textarea type="text" placeholder="Tekst (2000 tegn)" name="meld" id="meld" class="inputText"></textarea><br>
      <input type="submit" value="Send" name="send" id="send" class="sndBtn">
  </fieldset>
</form>

<div class="sammler">
<div class="boks1">
<h1>Innboks</h1>
<?php
    $stmt = $db->query("SELECT meldinger.sendtTid, meldinger.avsender, meldinger.melding, meldinger.tittel FROM innutboks, meldinger WHERE meldinger.meldingID = innutboks.meldingID AND bruker = '$bruker' AND innut = 'inn' ORDER BY meldinger.meldingID DESC;");

        if($stmt->rowCount()){
            while ($row = $stmt->fetch()){
              echo '<div class="melding">';
              echo '<h2>', 'Emne:  ', $row['tittel'], '</h2>';
              echo 'Fra:  <b>', $row['avsender'], '</b> Tid sendt:<b>  ', $row['sendtTid'], '</b><br><br>';
              echo $row['melding'];
              echo '<br>';
              echo '</div>';
            }
        }
  ?>
</div>

<div class="boks2">
<h1>Utboks</h1>
<?php
    $stmt = $db->query("SELECT meldinger.sendtTid, meldinger.mottaker, meldinger.melding, meldinger.tittel FROM innutboks, meldinger WHERE meldinger.meldingID = innutboks.meldingID AND bruker = '$bruker' AND innut = 'ut' ORDER BY meldinger.meldingID DESC;");

        if($stmt->rowCount()){
            while ($row = $stmt->fetch()){
              echo '<div class="melding">';
              echo '<h2>', 'Emne:  ', $row['tittel'], '</h2>';
              echo 'Til:  <b>', $row['mottaker'], '</b> Tid sendt:<b>  ', $row['sendtTid'], '</b><br><br>';
              echo $row['melding'];
              echo '<br>';
              echo '</div>';
            }
        }
  ?>
</div>
</div>

<!-- Footer -->
<?php
  include_once('../includes/footer.php');
?>

</body>
</html>
