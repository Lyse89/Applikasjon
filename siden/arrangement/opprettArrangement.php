<?php
//Denne siden er utviklet av Kristoffer Sorensen, siste gang endret 04.06.2019
//Denne include-siden er kontrollert av Kristoffer Sorensen, siste gang 04.06.2019
include_once('../includes/ikke_logget_inn.inc.php');

//if (isset($_POST['opprettArrangment'])) {

    // koble til databasen
    include('../includes/logg_inn_db.inc.php');

    // Henter verdier
    $brukernavn = $_SESSION['brukernavn'];
    $tittel = $_POST['tittel'];
    $lokasjon = $_POST['lokasjon'];
    $beskrivelse = $_POST['beskrivelse'];

    $fraDato = strtotime($_POST['tilDato']);
    $fraDato = date('Y-m-d H:i:s', $fraDato);

    $tilDato = strtotime($_POST['fraDato']);
    $tilDato = date('Y-m-d H:i:s', $tilDato);

    // 
    $sql = "insert into arrangement(tittel, vert, lokasjon, startTid, sluttTid, Beskrivelse)";
    $sql .= "values (:tittel, :brukernavn, :lokasjon, :fraDato, :tilDato, :beskrivelse);";

    // Prepared statemens
    $stmt =  $db->prepare($sql);
    $stmt->bindParam(':tittel', $tittel);
    $stmt->bindParam(':brukernavn', $brukernavn);
    $stmt->bindParam(':lokasjon', $lokasjon);
    $stmt->bindParam(':fraDato', $fraDato);
    $stmt->bindParam(':tilDato', $tilDato);
    $stmt->bindParam(':beskrivelse', $beskrivelse);

    // Kjører sql query
    $stmt->execute();

//}
//header('Location: arrangementer.php');
?>
