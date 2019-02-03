<!-- Denne include-siden er utviklet av Simen A. Lyse , siste gang endret 14.12.2018
// Denne include-siden er kontrollert av Simen A. Lyse, siste gang 14.12.2018 -->

<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <head>
    <meta charset="utf-8">
    <title>Profil</title>
  </head>
  <body>
    <?php
    include_once('../includes/header_innlogget.php');
    include_once('../includes/ikke_logget_inn.inc.php');
    ?>

    <section class="navside">
      <a href="#lastoppbilde">Laste opp Bilde</a>
      <a href="#redigerePres">Redigere Presentasjon</a>
      <a href="#registInt">Registrere interesser</a>
      <a href="#byttePass">Bytte passord</a>
      <a href="#bytteEpost">Bytte epost</a>
    </section>

    <section class="siden">
    <h2 id="lastoppbilde">Last Opp Profil Bilde</h2>
    <form action="lastebilde.inc.php" method="POST" enctype="multipart/form-data">
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

    <h2 id="redigerePres">Redigere Din Presentasjon<h2>
    <form class="presentasjon" action="presentasjon.inc.php" method="POST">
      <textarea>
      </textarea><br>
      <input type="submit" name="submitPres" id="skrivPres" value="Redigere">
    </form>

    <h2 id="registInt">Registrere interesser</h2>
    <form class="presentasjon" action="../profil/registrer_interesse.inc.php" method="POST">
      <input type="text" name="interesser" id=interesse placeholder="Skriv en Interesse"><br>
      <input type="submit" name="registrerInt" id="registrerInt">
    </form>

    <h2 id="byttePass">Bytte Passord</h2>
    <form class="byttePO" action="/bytt_passord.inc.php" method="POST">
        <input type="password" name="gamlePO" id=gamlePO placeholder="Gamle Passordet"><br>
        <input type="password" name="nyePO" id=nyePO placeholder="Nye Passordet"><br>
        <input type="password" name="nyePO_sjekk" placeholder="Gjenta ny Passordet"><br>
        <input type="submit" name="submitByttePO" id="byttePO" value="Bytt Passord">
    </form>

    <h2 id="bytteEpost">Bytte E-post</h2>
    <form class="BytteEpost" action="/bytteEpost.inc.php" method="POST">
      <input type="email" name="epost" placeholder="Skriv nye Epost"><br>
      <input type="password" name="passord" placeholder="Passord"><br>
      <input type="submit" name="submitBytteEpost" id="bytteEpost" value="Bytte Epost">
    </form>
  </section>


  </body>
</html>
