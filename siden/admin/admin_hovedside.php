<?php
//Denne include-siden er utviklet av Simen A. Lyse, William Rastad og Christoffer Sørensen siste gang endret 14.12.2018
// Denne include-siden er kontrollert av Simen A. Lyse, siste gang 14.12.2018
include('../includes/ikke_logget_inn.inc.php');
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
                <p>Bruker:  <input type="text" name="BrukerNavnGiRolle" id="BrukerNavnGiRolle" placeholder="BrukerNavn"> </p>
                <p>Rolle:   <select name="Roller"> </p>
                                <option value="Admin">Admin</option>
                                <option value="Bruker">Bruker</option>
                                <option value="Avregistrert">Avregistrert</option>
                            </select>
                            <br>
                <input type="submit" name="btnGiRolle" value="Gi Rolle" id="GiRolleButton">
            </form>
        </div>

        <div class="instillinger-boks">
            <h2>Gi bruker en straff</h2>
            <form class="GiStraff-form" action="gi_straff.inc.php" method="POST">
                <p>Bruker:  <input type="text" name="BrukerNavnGiStraff" id="BrukerNavnGiStraff" placeholder="BrukerNavn"> </p>
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
                    <textarea name="anmerkningForklaring" placeholder="Skriv forklaring på anmerkningen (Maks 255 tegn)"rows="6" cols="70" minlength="0" maxlength="255"></textarea>
                </div>
                <input type="submit" name="btnGiStraff" value="Gi Straff" id="GiStraffButton">
            </form>
        </div>

        <div class="instillinger-boks">
        </div>

        <div class="instillinger-boks">
        </div>

        <div class="instillinger-boks">
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
</body>
</html>
