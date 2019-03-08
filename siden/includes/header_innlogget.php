<!-- Denne include-siden er utviklet av Simen A. Lyse , siste gang endret 14.12.2018
// Denne include-siden er kontrollert av Simen A. Lyse, siste gang 14.12.2018 -->

<nav>
  <a class="bilde" href="../../default.php">
    <img class="logo-navHeaderForsiden" src="../img/logo.png" alt="Logoen til USN" width="84" height="42">
  </a>
  <div id="linker">
    <a href="../anonser/anonser.php">Annonser</a>
    <a href="../sosialt/sosialt.php">Eventer</a>
    <a href="../nyheter/nyheter.php">IT nyheter</a>
    <a href="../personer/personer.php">Søk Interesser</a>
    <a href="../min_profil/min_profil.php">Min Profil</a>
    <a href="../meldinger/meldinger.php">Meldinger</a>
    <a href="../profil/profil.php">Instillinger</a>
    <div class="Loggin">
      <form action="../includes/loggut.inc.php" method="POST">
      <button type="submit" name="submit">Logout</button>
      </form>
    </div>
  </div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
  <span class="hamburger">
    <i class="fa fa-bars"></i>
  </span> Menu
  </a>
</nav>

<script>
function myFunction() {
  var x = document.getElementById("linker");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>
