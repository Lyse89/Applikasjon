<?php
// Denne include-siden er utviklet av Simen A. Lyse , siste gang endret 24.05.2019
// Denne include-siden er kontrollert av Simen A. Lyse, siste gang 24.05.2019
?>
<body>

<nav class="topnav" id="minTopnav">
  <form action="../includes/loggut.inc.php" method="POST">
  <a href="../innlogget_forside/innlogget_forside2.php" class="aktiv">USN</a>
  <a href="../annonser/annonser.php">Annonser</a>
  <a href="../arrangement/arrangementer.php">Arrangement</a>
  <a href="../nyheter/nyheter.php">Nyheter</a>
  <a href="../personer/personer.php">Søk</a>
  <a href="../profil/min_profil.php">Min Profil</a>
  <a href="../meldinger/melding.php">Meldinger</a>
  <a href="../brukerInstillinger/profil.php">Instillinger</a>
  <button type="submit" name="submit">Logout</button>
  <?php
    include("settrolle.inc.php");
    if ($_SESSION['rolle'] == "Admin") {
  ?>
      <a href="../admin/admin_hovedside.php" id="Adminknappheader">Admin</a>
        <style>
            #Adminknappheader{
                float:right;
                color:blue;
                border-right: solid;
                margin-right: 5px;
            }

            #Adminknappheader:hover{
                color:darkblue;
                border-color: darkblue;

            }
            @media screen and (max-width: 768px) {
                #Adminknappheader{
                    float:left;
                    border: none;
                }
            }
        </style>
      <?php
      };
     ?>
</form>
  <div class="dropdown">
    <button class="dropbtn">Meny
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="drop-innhold">
      <a href="../annonser/annonser.php">Annonser</a>
      <a href="../arrangement/arrangementer.php">Eventer</a>
      <a href="../nyheter/nyheter.php">IT nyheter</a>
      <a href="../personer/personer.php">Søk Interesser</a>
      <a href="../profil/min_profil.php">Min Profil</a>
      <a href="../meldinger/melding.php">Meldinger</a>
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
