<?php
//Denne siden er utviklet av Simen Lyse, Kristoffer Sorensen, siste gang endret 04.06.2019
//Denne include-siden er kontrollert av Simen Lyse, Kristoffer Sorensen, siste gang 04.06.2019
include_once('../includes/ikke_logget_inn.inc.php');
if (isset($_POST['inviterBruker'])) {

    // koble til databasen
    include('../includes/logg_inn_db.inc.php');

    // Henter verdier
    $tittel = $_POST['tittel'];
    $tilBruker = $_POST['tilBruker'];
    $fraBruker = $_SESSION['brukernavn'];
    $arrangementId = $_POST['arrangementId'];

    // 
    $sql = "insert into nyheter(tittel, forfatter, beskrivelse, lagtTil)";
    $sql .= "values (:tittel, :brukernavn, :beskrivelse, now())";

    // Prepared statemens
    $stmt =  $db->prepare($sql);
    $stmt->bindParam(':tittel', $tittel);
    $stmt->bindParam(':brukernavn', $brukernavn);
    $stmt->bindParam(':beskrivelse', $beskrivelse);


    // Kjører sql query
    $stmt->execute();

    sendMelding($db, $tittel, $tilBruker, $fraBruker, $arrangementId);
    innboks($db, $tilBruker);

    header("Location: arragement.php");

}
header('Location: nyheter.php');

function sendMelding($db, $tittel, $tilBruker, $fraBruker, $arrangementId) {

    $sql = "insert into meldinger (avsender,mottaker,tittel,sendtTid,melding)";
    $sql.= "values (:avsender,:mottaker,:tittel,:sendtTid,:melding)";

    $stmt = $db->prepare($sql);

      $stmt->bindParam(':avsender',$fraBruker);
      $stmt->bindParam(':mottaker',$tilBruker);
      $stmt->bindParam(':tittel',$tittel);
      $stmt->bindParam(':sendtTid',$sendtTid);
      $stmt->bindParam(':melding',$melding);

      $sendtTid = date('Y-m-d G:i:s');
      $melding = $fraBruker. 'har invitert deg til ' . '<a href="../arrangement/arrangement.php?id=' . $arrangementId .'">dette arrangementet.</a>';

      $stmt->execute();

}

function innboks($db, $tilBruker) {

    $sqlID = $db->prepare("SELECT meldingID FROM meldinger ORDER BY meldingID DESC LIMIT 1");
    $sqlID->execute();

    $id = $sqlID->fetchColumn();

    $sql = "insert into innutboks (meldingID, bruker, innut)";
    $sql.= "values (:id, :bruker, :innut)";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(':id',$id);
    $stmt->bindParam(':bruker',$bruker);
    $stmt->bindParam(':innut',$innut);

    $bruker = $tilBruker;
    $innut = 'inn';

    $stmt->execute();
}
?>
