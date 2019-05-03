<?php

// Denne include-siden er utviklet av Simen Lyse , siste gang endret 04.05.2019
// Kontrollert og testet av Simen Lyse , siste gang endret 04.05.2019
include_once("../includes/init.php");

if(isset($_POST['send'])) {

      $db = new PDO($dsn,$dbBrukernavn,$dbPassord);

      $sql = "insert into meldinger (avsender,mottaker,tittel,sendtTid,melding)";
      $sql.= "values (:avsender,:mottaker,:tittel,:sendtTid,:melding)";

      $stmt = $db->prepare($sql);

      $stmt->bindParam(':avsender',$avsender);
      $stmt->bindParam(':mottaker',$mottaker);
      $stmt->bindParam(':tittel',$tittel);
      $stmt->bindParam(':sendtTid',$sendtTid);
      $stmt->bindParam(':melding',$melding);

      $avsender = $_SESSION['brukernavn'];
      $mottaker = $_POST['til'];
      $tittel = $_POST['subj'];
      $melding = $_POST['meld'];

      $stmt->execute();
}
?>
