<!-- Denne include-siden er utviklet av Simen A. Lyse , siste gang endret 14.12.2018
// Denne include-siden er kontrollert av Simen A. Lyse, siste gang 14.12.2018 -->

<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" type="text/css" href="../css/style.css">
  <head>
    <meta charset="utf-8">
    <title>Profil</title>
  </head>
  <body>
    <?php
    include_once('../includes/header_innlogget.php');
    include_once('../includes/ikke_logget_inn.inc.php');
    ?>

    <h2>Last Opp Profil Bilde</h2>
    <form action="lastebilde.inc.php" method="POST" enctype="multipart/form-data">
      Velg et profil bilde:<br>

      <input type="file" name="lasteOppProfilBilde" id="lasteOppProfilBilde"><br>
      <input type="submit" value="Last Opp Bilde" name="submitProfilBilde">
    </form>

    <h2>Redigere Din Presentasjon<h2>
    <form class="presentasjon" action="/presentasjon.inc.php" method="POST">
      <textarea>
      </textarea><br>
      <input type="submit" name="submitPres" id="skrivPres" value="Redigere">
    </form>

    <h2>Registrere interesser</h2>
    <form class="presentasjon" action="/interesser.inc.php" method="POST">
      <input type="text" name="interesser" id=interesser placeholder="Skriv en Interesse"><br>
      <input type="submit" name="registrerInt" id="registrerInt">
    </form>

    <h2>Bytte Passord</h2>
    <form class="byttePO" action="/bytt_passord.inc.php" method="POST">
        <input type="password" name="gamlePO" id=gamlePO placeholder="Gamle Passordet"><br>
        <input type="password" name="nyePO" id=nyePO placeholder="Nye Passordet"><br>
        <input type="password" name="nyePO_sjekk" placeholder="Gjenta ny Passordet"><br>
        <input type="submit" name="submitByttePO" id="byttePO" value="Bytt Passord">
    </form>

    <h2>Bytte E-post</h2>
    <form class="BytteEpost" action="/bytteEpost.inc.php" method="POST">
      <input type="email" name="epost" placeholder="Skriv nye Epost"><br>
      <input type="password" name="passord" placeholder="Passord"><br>
      <input type="submit" name="submitBytteEpost" id="bytteEpost" value="Bytte Epost">
    </form>


  </body>
</html>
