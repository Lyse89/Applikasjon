<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="signup-form" action="/bytt_passord.inc.php" method="POST">
        <input type="password" name="gamlePO" id=gamlePO placeholder="Gamle Passordet">
        <input type="password" name="nyePO" id=nyePO placeholder="Nye Passordet"><br>
        <input type="password" name="nyePO_sjekk" placeholder="Gjenta ny Passordet"><br>
        <input type="submit" name="byttePO_form" value="Bytt Passord" id="byttePO">
    </form>

  </body>
</html>