<?php
//Denne siden er utviklet av Kristoffer Sorensen, siste gang endret 04.06.2019
//Denne include-siden er kontrollert av Kristoffer Sorensen, siste gang 04.06.2019
include_once('../includes/ikke_logget_inn.inc.php');
if (isset($_POST['inviterBruker'])) {

    // koble til databasen
    include('../includes/logg_inn_db.inc.php');

    // Henter verdier
    $tittel = $_POST['tittel'];
    $tilBruker = $_POST['tilBruker'];
    $fraBruker = $_SESSION['tilBruker'];
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

}
header('Location: nyheter.php');
?>
