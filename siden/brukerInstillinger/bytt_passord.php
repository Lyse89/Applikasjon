<!-- Denne include-siden er utviklet av Simen A. Lyse , siste gang endret 14.12.2018
// Denne include-siden er kontrollert av Simen A. Lyse, siste gang 14.12.2018 -->

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="signup-form" action="/bytt_passord.inc.php" method="POST">

		<!-- Gammelt passord-->
        <input type="password" name="gammeltPassord" id=gamlePO placeholder="Gamle Passordet"><br>

		<!-- Innskrivningsfelt for nytt passord-->
        <input type="password" name="nyttPassord" id="nyttPassord"  placeholder="Nye Passordet"><br>
        <input type="password" name="nyttPassordGjenta" id="nyttPassordGjenta" placeholder="Gjenta ny Passordet"><br>

        <input type="submit" name="byttPassord" id="byttPassord" value="Bytt Passord" >
    </form>

  </body>
</html>

<script type="text/javascript">
	var nyttPassord = document.getElementById("nyttPassord");
	var nyttPassordGjenta = document.getElementById("nyttPassordGjenta");

	function validerPassord(){
	  if(nyttPassord.value != nyttPassordGjenta.value) {
		nyttPassordGjenta.setCustomValidity("Passordene samsvarer ikke");
	  } else {
		nyttPassordGjenta.setCustomValidity('');
	  }
	}

	// 
	nyttPassord.onchange = validerPassord;
	nyttPassordGjenta.onkeyup = validerPassord;
</script>
