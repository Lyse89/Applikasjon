<?php
    include_once('../includes/ikke_logget_inn.inc.php');
    include_once('../includes/rollesjekk.inc.php');
?>
<!-- Denne include-siden er utviklet av Simen A. Lyse , siste gang endret 14.12.2018
// Denne include-siden er kontrollert av Simen A. Lyse, siste gang 14.12.2018 -->

<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <head>
    <meta charset="utf-8">
    <title>Instillinger</title>
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
<?php
include_once('../includes/header_innlogget.php');
?>

<div class="center">
        <h1>Instillinger</h1>
    <div class="flex-container">
        <div class="instillinger-boks">
                <form action="lastebilde.inc.php" method="POST" enctype="multipart/form-data">
                  <h2 id="lastoppbilde">Last Opp Profil Bilde</h2>
                  Velg et profil bilde:<br>
                  <?php
                      $url ="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                      if (strpos($url, "bilde=suksess") == true) {
                        echo "<p class='suksess'>Bilde lastet opp</p>";
                      }

                      if (strpos($url, "bilde=feiltype") == true) {
                        echo "<p class='error'>Bilde kan bare være jpg, png, og jpeg</p>";
                      }

                      if (strpos($url, "bilde=storfil") == true) {
                        echo "<p class='error'>Bilde må være under 500000 byte</p>";
                      }

                  ?>
                  <input type="file" name="lasteOppProfilBilde" id="lasteOppProfilBilde"><br>
                  <input type="submit" value="Last Opp Bilde" name="submitProfilBilde">
                </form>
        </div>

        <div class="instillinger-boks">
              <form class="presentasjon" action="../brukerInstillinger/registrer_interesse.inc.php" method="POST">
                <h2 id="registInt">Registrere Interesser</h2>
                <input type="text" name="interesser" id=interesse placeholder="Skriv en Interesse"><br>
                <input type="submit" name="registrerInt" id="registrerInt">
              </form>
        </div>

        <div class="instillinger-boks">
              <form class="presentasjon" action="../brukerInstillinger/slett_interesse.inc.php" method="POST">
                <h2 id="registInt">Slett Interesse</h2>
                <input type="text" name="slett_interesser" id=slett_interesse placeholder="Skriv en interesse"><br>
                <input type="submit" name="SlettInt" id="SlettInt">
              </form>
        </div>

        <div class="instillinger-boks">
              <form class="presentasjon" action="../brukerInstillinger/reg_studie.inc.php" method="POST">
                <h2 id="registStu">Registrer Studie</h2>
                <input type="text" name="registrer_studie" id=registrer_studie placeholder="Skriv ditt studie"><br>
                <input type="submit" name="regstu" id="Regstu">
              </form>
        </div>

        <div class="instillinger-boks">
              <form class="presentasjon" action="../brukerInstillinger/slett_studie.inc.php" method="POST">
                <h2 id="slettStu">Slett Studie</h2>
                <input type="text" name="slett_studie" id=slettStu placeholder="Skriv studie"><br>
                <input type="submit" name="slettstu" id="slettestu">
              </form>
        </div>

        <div class="instillinger-boks">
              <form class="presentasjon" action="presentasjon.inc.php" method="POST">
                <h2 id="redigerePres">Redigere Presentasjon</h2>
                    <textarea name="bio" placeholder="Skriv din bio(maks 255 tegn) "rows="6" cols="70" minlength="0" maxlength="255"></textarea><br>
                <input type="submit" name="submitPres" id="skrivPres" value="Redigere">
              </form>
        </div>


    </div>
    <div class="flex-container">

        <div class="instillinger-boks">
              <form class="byttePO" action="/bytt_passord.inc.php" method="POST">
                <h2 id="byttePass">Bytte Passord</h2>
                  <input type="password" name="gamlePO" id=gamlePO placeholder="Gamle Passordet"><br>
                  <input type="password" name="nyePO" id=nyePO placeholder="Nye Passordet"><br>
                  <input type="password" name="nyePO_sjekk" placeholder="Gjenta ny Passordet"><br>
                  <input type="submit" name="submitByttePO" id="byttePO" value="Bytt Passord">
                </form>
        </div>

        <div class="instillinger-boks">
              <form class="BytteEpost" action="/bytteEpost.inc.php" method="POST">
                  <h2 id="bytteEpost">Bytte E-post</h2>
                <input type="email" name="epost" placeholder="Skriv nye Epost"><br>
                <input type="password" name="passord" placeholder="Passord"><br>
                <input type="submit" name="submitBytteEpost" id="bytteEpost" value="Bytte Epost">
              </form>
        </div>
    </div>
</div>
</body>
</html>
