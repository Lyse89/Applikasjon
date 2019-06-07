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
    arrangmentBilde($db);
    header('Location: arrangementer.php');


function arrangmentBilde($db){
    $Mappe = "../arrangement/bilder/";
    $posttittel = $_POST['tittel'];
    $nyttNavn = $posttittel .'.'. pathinfo($_FILES["lasteOpparrangementlBilde"]["name"] ,PATHINFO_EXTENSION);

    if(isset($_POST["opprettArrangement"])) {
        $Fil = $Mappe . basename($_FILES["lasteOpparrangementlBilde"]["name"]);
        $FileType = strtolower(pathinfo($Fil,PATHINFO_EXTENSION));
    }

    if ($_FILES["lasteOpparrangementlBilde"]["size"] > 500000) {
        //  "Filen er for stor, må være mindre en 500 000 bytes";
        exit();
    }

    if($FileType != "jpg" && $FileType != "png" && $FileType != "jpeg") {
        //  "Bare jpg, png, jpeg og gif er lov å laste opp.";
        exit();
        }


    else {
        if (move_uploaded_file($_FILES["lasteOpparrangementlBilde"]["tmp_name"], $Mappe . $nyttNavn)) {
            $CookieMelding = "Filen ". basename( $_FILES["lasteOpparrangementlBilde"]["name"]). " har blitt lastet opp.";
            try {
              include('../includes/logg_inn_db.inc.php');
              $sql = "UPDATE arrangement SET bilde = '$nyttNavn' where tittel = '$posttittel';";
              $stmt = $db->prepare($sql);
              $stmt->execute();
            } catch(PDOException $e)
              {
              echo $sql . "<br>" . $e->getMessage();
              }

        }
    }
}

?>
