<?php
if(isset($_POST["submitProfilBilde"])) {
  if( empty($_FILES["lasteOppProfilBilde"]["name"])) {
  die ("<p>Ingen fil er valgt</p>");
  } else {
    $temp_fil = $_FILES["lasteOppProfilBilde"]["temp_name"];
    $filnavn = "profilBilde/" . $_FILES["lasteOppProfilBilde"]["name"];
    move_uploaded_file($temp_fil, $filnavn)
      //echo "bilde lastet opp";
      or die ("Mislykket med å laste opp bilde");

    $filtype = $_FILES["lasteOppProfilBilde"]["type"];
    $størrelse = $_FILES["lasteOppProfilBilde"]["size"];
    }
}

//Sjekke om filen er et Bilde

// Sjekker fil størelse

 ?>
