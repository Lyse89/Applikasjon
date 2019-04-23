<?php
// Denne include-siden er utviklet av Simen A. Lyse , siste gang endret 14.12.2018
// Denne include-siden er kontrollert av Simen A. Lyse, siste gang 14.12.2018
?>
<style>

nav {
  overflow: hidden;
  background-color: #ddd;
}

nav a {
  float: left;
  display: block;
  color: #0d0d0d;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.aktiv {
  background-color: #595959;
  color: white;
}

nav .ikon {
  display: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 17px;
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.drop-innhold {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.drop-innhold a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.topnav a:hover, .dropdown:hover .dropbtn {
  background-color: #LightGray;
  color: white;
}

.drop-innhold a:hover {
  background-color: #LightGray;
  color: black;
}

.dropdown:hover .drop-innhold {
  display: block;
}

@media screen and (max-width: 768px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.ikon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 768px) {
  .topnav.responsiv {position: relative;}
  .topnav.responsiv .ikon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsiv a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsiv .dropdown {float: none;}
  .topnav.responsiv .drop-innhold {position: relative;}
  .topnav.responsiv .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}

@media screen and (min-width: 76px) {
  .dropdown {
    display: none;
  }
}
</style>
</head>
<body>

<nav class="topnav" id="minTopnav">
  <a href="#home" class="aktiv">USN</a>
  <a href="../anonser/anonser.php">Annonser</a>
  <a href="../sosialt/sosialt.php">Eventer</a>
  <a href="../nyheter/nyheter.php">IT nyheter</a>
  <a href="../personer/personer.php">Søk Interesser</a>
  <a href="../min_profil/min_profil.php">Min Profil</a>
  <a href="../meldinger/meldinger.php">Meldinger</a>
  <a href="../brukerInstillinger/profil.php">Instillinger</a>
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
