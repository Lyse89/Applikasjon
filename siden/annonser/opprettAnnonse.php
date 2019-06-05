<?php
//Denne siden er utviklet av Kristoffer Sorensen, siste gang endret 04.06.2019
//Denne include-siden er kontrollert av Kristoffer Sorensen, siste gang 04.06.2019

// Sjekk for at bruker maa vaere logget inn for aa ha tilgang til fil
include_once('../includes/ikke_logget_inn.inc.php');

if (isset($_POST['opprettAnnonse'])) {

    // koble til databasen
    include('../includes/logg_inn_db.inc.php');

    // Henter verdier
    $tittel = $_POST['tittel'];
    $brukernavn = $_SESSION['brukernavn'];
    $beskrivelse = $_POST['beskrivelse'];
    $url = $_POST['url'];
    $stilling = $_POST['stilling'];

    // 
    $sql = "insert into jobbAnnonse(tittel, stilling, forfatter, beskrivelse, url, lagtTil)";
    $sql .= "values (:tittel, :stilling, :brukernavn, :beskrivelse, :url, now())";

    // Prepared statemens
    $stmt =  $db->prepare($sql);
    $stmt->bindParam(':tittel', $tittel);
    $stmt->bindParam(':stilling', $stilling);
    $stmt->bindParam(':brukernavn', $brukernavn);
    $stmt->bindParam(':beskrivelse', $beskrivelse);
    $stmt->bindParam(':url', $url);


    // Kjører sql query
    $stmt->execute();

}
header('Location: annonser.php');
?>
