// Denne include-siden er utviklet av William Rastad og Kristoffer Sorensen , siste gang endret 14.12.2018
// Kontrollert og testet av William Rastad og Kristoffer Sorensen
<?php
if(isset($_POST['btnSignup_form'])) {
   include_once("../includes/init.php");

   // Maa endres fra innocent, finne ut hva disse gjor
   $db = new PDO($dsn,$dbBrukernavn,$dbPassord);

   $loginnTeller = 0;

   $sql = "insert into bruker (brukerNavn,passord,fornavn,etternavn,ePost,feilLoginnTeller)";
   $sql.= "values (:brukernavn,:passord,:fornavn,:etternavn,:epost,$loginnTeller)";

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

  mkdir("../brukere/$bbrukernavn", 0700);


   $stmt->execute();

    } else {
    }
    header("Location: ../../default.php");


?>
