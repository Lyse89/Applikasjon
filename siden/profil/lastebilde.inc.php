<?php
$target_dir = "temp";
$target_file = $target_dir . basename($_FILES["lasteOppProfilBilde"]["navn"])
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

//Sjekke om filen er et Bilde
if(isset($_POST["submitProfilBilde"])) {
  $check = getimagesize($_FILES["lasteOppProfilBilde"]["tmp_navn"]);
  if($check !== false) {
    echo "Filen er et bilde - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "Filen er ikke et bilde.";
    $uploadOk = 0;
  }
}
 ?>
