<?php

// Denne include-siden er utviklet av Simen Lyse , siste gang endret 04.05.2019
// Kontrollert og testet av Simen Lyse , siste gang endret 04.05.2019
include('../includes/logg_inn_db.inc.php');
session_start();

if(isset($_POST['send'])) {

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
      /*date_default_timezone_set('Europe/Oslo');
      $sendtTid = (date('m-d-Y h:i:s', time()));*/
      $tittel = $_POST['subj'];
      $melding = $_POST['meld'];

      $stmt->execute();

      innboks($db);
      utboks($db);

      header("Location: melding.php");

}

function innboks($db) {

      $sqlID = $db->prepare("SELECT meldingID FROM meldinger ORDER BY meldingID DESC LIMIT 1");
      $sqlID->execute();

      $id = $sqlID->fetchColumn();

      $sql = "insert into innutboks (meldingID, bruker, innut)";
      $sql.= "values (:id, :bruker, :innut)";

      $stmt = $db->prepare($sql);

      $stmt->bindParam(':id',$id);
      $stmt->bindParam(':bruker',$bruker);
      $stmt->bindParam(':innut',$innut);
      
      $bruker = $_POST['til'];
      $innut = 'inn';

      $stmt->execute();
}

function utboks($db) {

      $sqlID = $db->prepare("SELECT meldingID FROM meldinger ORDER BY meldingID DESC LIMIT 1");
      $sqlID->execute();

      $id = $sqlID->fetchColumn();

      $sql = "insert into innutboks (meldingID, bruker, innut)";
      $sql.= "values (:id, :bruker, :innut)";

      $stmt = $db->prepare($sql);

      $stmt->bindParam(':id',$id);
      $stmt->bindParam(':bruker',$bruker);
      $stmt->bindParam(':innut',$innut);
    
      $bruker = $_SESSION['brukernavn'];
      $innut = 'ut';

      $stmt->execute();

}




?>
