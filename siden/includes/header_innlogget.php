<?php
// Denne include-siden er utviklet av Simen A. Lyse , siste gang endret 24.05.2019
// Denne include-siden er kontrollert av Simen A. Lyse, siste gang 24.05.2019
?>
<body>

<nav class="topnav" id="minTopnav">
  <form action="../includes/loggut.inc.php" method="POST">
  <a href="../innlogget_forside/innlogget_forside2.php" class="aktiv">USN</a>
  <a href="../anonser/anonser.php">Annonser</a>
  <a href="../sosialt/sosialt.php">Eventer</a>
  <a href="../nyheter/nyheter.php">IT nyheter</a>
  <a href="../personer/personer.php">Søk Interesser</a>
  <a href="../min_profil/min_profil.php">Min Profil</a>
  <a href="../meldinger/meldinger.php">Meldinger</a>
  <a href="../brukerInstillinger/profil.php">Instillinger</a>
  <?php
    include("settrolle.inc.php");
    if ($_SESSION['rolle'] == "Admin") {
  ?>
      <a href="../admin/admin_hovedside.php">Admin</a>
        <style>
            nav{
                background-color: red;
            }
        </style>
      <?php
      };
     ?>
  <button type="submit" name="submit">Logout</button>
</form>
  <div class="dropdown">
    <button class="dropbtn">Meny
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="drop-innhold">
      <a href="../anonser/anonser.php">Annonser</a>
      <a href="../sosialt/sosialt.php">Eventer</a>
      <a href="../nyheter/nyheter.php">IT nyheter</a>
      <a href="../personer/personer.php">Søk Interesser</a>
      <a href="../min_profil/min_profil.php">Min Profil</a>
      <a href="../meldinger/meldinger.php">Meldinger</a>
      <a href="../brukerInstillinger/profil.php">Instillinger</a>
    </div>
  </div>
  <a href="javascript:void(0);" style="font-size:15px;" class="ikon" onclick="myFunction()">&#9776;</a>
</nav>

<script>
function myFunction() {
  var x = document.getElementById("minTopnav");
  if (x.className === "topnav") {
    x.className += " responsiv";
  } else {
    x.className = "topnav";
  }
}
</script>
