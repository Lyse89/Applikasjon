<?php
// Denne include-siden er utviklet av William Rastad og Kristoffer Sorensen , siste gang endret 14.12.2018
// Kontrollert og testet av William Rastad og Kristoffer Sorensen
include("../includes/init.php");

if(isset($_POST['btnSignup_form'])) {
    include_once("../includes/init.php");

    $posjekk = $_POST['passord'];
    if(strlen($posjekk) < 8) {
      $regsjekk = 0;
      header("Location: ../../default.php?reg=kortpo");
      exit();
    } else {
      $regsjekk = 1;
    }
    $emailsjekk = $_POST['epost'];
    if(substr($emailsjekk, -6) == 'usn.no') {
      $regsjekk = 1;
    } else {
      $regsjekk = 0;
      header("Location: ../../default.php?reg=ikkeusn");
      exit();
    }

    // Maa endres fra innocent, finne ut hva disse gjor
    $db = new PDO($dsn,$dbBrukernavn,$dbPassord);

    if ($regsjekk == 1) {

      $loginnTeller = 0;

      $sql = "insert into bruker (brukernavn,passord,fornavn,etternavn,ePost,feilLoginnTeller, bilde)";
      $sql.= "values (:brukernavn,:passord,:fornavn,:etternavn,:epost,$loginnTeller, '../brukere/default/profil.png')";

      $stmt = $db->prepare($sql);

      $stmt->bindParam(':fornavn',$bfornavn);
      $stmt->bindParam(':etternavn',$betternavn);
      $stmt->bindParam(':epost',$bepost);
      $stmt->bindParam(':passord',$bpassord);
      $stmt->bindParam(':brukernavn',$bbrukernavn);



      $bfornavn = $_POST['fornavn'];
      $betternavn = $_POST['etternavn'];
      $bepost = $_POST['epost'];
      $bpassord = sha1($salt.sha1($salt.$_POST['passord']));
      $bbrukernavn = $_POST['brukernavn'];


      // Sjekk for om registrering er vellykket

      $stmt->execute();


      $brukernavn2 = $_POST['brukernavn'];
      $passord2 = $_POST['passord'];
      include("../includes/logginnfunksjon.inc.php");
      logginnFunksjon($brukernavn2, $passord2);

    }

    header("Location: ../../default.php");
}
?>
