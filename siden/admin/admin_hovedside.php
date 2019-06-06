<?php
//Denne include-siden er utviklet William Rastad siste gang endret 14.12.2018
// Denne include-siden er kontrollert av William Rastad, siste gang 01.06.2018
include('../includes/ikke_logget_inn.inc.php');
include('../includes/adminsjekk.inc.php');
include_once('../includes/rollesjekk.inc.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <head>
    <meta charset="utf-8">
    <title>AdminFunksjoner</title>
  </head>
  <style media="screen">
    body {
      margin: 0;
      padding: 0;
      background-color: #ddd;
    }
    h2{
        font-size: 18px;

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

    .flex-container {
        width:100%;
        margin: 30px 0 30px 0;
        padding-bottom: 25px;
        display: flex;
        flex-wrap: wrap;
        align-items: stretch;
        background-color: white;
        border-top: solid grey 3px;
    }

    .flex-container img {
        height: 200px;
        background-color: #dddddd;
    }

    .instillinger-boks {
        width: 260px;
        padding: 30px;
    }
    .instillinger-boks {
    }

    select{
        width: 100%;
    }
    input[type=text]{
        width: 93%;
    }
    input[type="submit"]{
        margin-top: 5px;
        padding: 5px 5px 5px 5px;
        width: 100%;
    }

</style>

<body>
<script type="text/javascript">
    function KaranteneUtestengtCheck(that) {
        if (that.value == "Karantene") {
            document.getElementById("ifKarantene").style.display = "block";
            document.getElementById("ifAnmerkning").style.display = "none";

        } else if (that.value == "Anmerkning") {
            document.getElementById("ifAnmerkning").style.display = "block";
            document.getElementById("ifKarantene").style.display = "none";

        } else {
            document.getElementById("ifKarantene").style.display = "none";
            document.getElementById("ifAnmerkning").style.display = "none";
        }
    }
</script>
<?php
include_once('../includes/header_innlogget.php');
include_once('../includes/ikke_logget_inn.inc.php');
?>

<div class="center">
    <h1>Admin Hovedside</h1>
    <div class="flex-container">

        <div class="instillinger-boks">
            <h2>Gi bruker en rolle</h2>
            <form class="GiRolle-form" action="gi_rolle.inc.php" method="POST">
                <p>Bruker:  <input type="text" name="BrukerNavnGiRolle" id="BrukerNavnGiRolle" placeholder="Brukernavn"> </p>
                <p>Rolle:   <select name="Roller"> </p>
                                <option value="Admin">Admin</option>
                                <option value="Bruker">Bruker</option>
                                <option value="Avregistrert">Avregistrert</option>
                            </select>

                <input type="submit" name="btnGiRolle" value="Gi Rolle" id="GiRolleButton">
            </form>
        </div>

        <div class="instillinger-boks">
            <h2>Gi bruker en straff</h2>
            <form class="GiStraff-form" action="gi_straff.inc.php" method="POST">
                <p>Bruker:  <input type="text" name="BrukerNavnGiStraff" id="BrukerNavnGiStraff" placeholder="Brukernavn"> </p>
                <p>Straff:  <select name="Straff" onchange="KaranteneUtestengtCheck(this);"> </p>
                                <option value="Utestengt">Utestengt(Permanent)</option>
                                <option value="Karantene">Karantene</option>
                                <option value="Anmerkning">Anmerkning</option>
                            </select>
                <div id="ifKarantene" style="display: none;">
                <p>Antall Dager: <select name="KaranteneVarighet"> </p>
                                                <option value="now() + INTERVAL 1 DAY">1 Dag</option>
                                                <option value="now() + INTERVAL 1 WEEK">1 Uke</option>
                                                <option value="now() + INTERVAL 1 MONTH">1 Måned</option>
                                            </select>
                </div>
                <div id="ifAnmerkning" style="display: none;">
                    <textarea name="anmerkningForklaring" placeholder="Skriv forklaring på anmerkningen (Maks 255 tegn)"rows="6" cols="31" minlength="0" maxlength="255"></textarea>
                </div>
                <input type="submit" name="btnGiStraff" value="Gi Straff" id="GiStraffButton">
            </form>
        </div>

        <div class="instillinger-boks">
            <h2>Utskrift av anmerkning</h2>
            <form class="UtskriftAnmerkninger" action="utskrift_anmerkning.inc.php" method="POST">
                <p>Bruker:  <input type="text" name="BrukerNavnUtskriftAnmerkning" id="BrukerNavnUtskriftAnmerkning" placeholder="Brukernavn"> </p>
                <input type="submit" name="btnUtskriftAnmerkning" value="Skriv ut anmerkning for bruker" id="btnSkrivUtAnmerkninger">
            </form>

            <form class="UtksiftAlleAnmerkninger" action="utskrift_alle_anmerkninger.inc.php" method="POST">
                <input type="submit" name="btnUtskriftAlleAnmerkninger" value="Skriv ut alle anmerkninger" id="btnSkrivUtAlleAnmerkninger">
            </form>
        </div>

        <div class="instillinger-boks">
          <h2>Lage regler</h2>
            <form class="lagRegler" action="skrive_til_regler.inc.php" method="post">
              <input type="text" name="regel0" value="" placeholder="Regel 1">
              <input type="text" name="regel1" value="" placeholder="Regel 2">
              <input type="text" name="regel2" value="" placeholder="Regel 3">
              <input type="text" name="regel3" value="" placeholder="Regel 4">
              <input type="text" name="regel4" value="" placeholder="Regel 5">
              <input type="text" name="regel5" value="" placeholder="Regel 6">
              <input type="text" name="regel6" value="" placeholder="Regel 7">
              <input type="text" name="regel7" value="" placeholder="Regel 8">
              <input type="text" name="regel8" value="" placeholder="Regel 9">
              <input type="text" name="regel9" value="" placeholder="Regel 10">
              <input type="submit" name="btnRegel" value="Lag Regel">
            </form>
          </form>
        </div>

        <div class="instillinger-boks">
          <h2>Send email til brukere</h2>
          <form method="POST" action="sendemail.inc.php" onsubmit="sjekkSubmit();">
            <fieldset>
                <input type="email" placeholder="Til" name="til" id="til" class="inputBoks">
                <input type="text" placeholder="Titel" name="subj" id="subj" class="inputTitel">
                <textarea type="text" placeholder="Tekst...." name="meld" id="meld" class="inputText"></textarea>
                 <input type="submit" value="Send" name="send" id="send" class="sndBtn">
            </fieldset>
          </form>
        </div>

        <div class="instillinger-boks">
        </div>

    </div>

    <div class="flex-container">

        <div class="instillinger-boks">
        </div>

        <div class="instillinger-boks">
        </div>

    </div>

</div>

<?php
  include_once('../includes/footer.php');
?>

</body>
</html>
