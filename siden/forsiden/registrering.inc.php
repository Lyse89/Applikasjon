<?php
// Simen

if(isset($_POST['btnSignup_form'])) {
   include_once("../includes/init.php");
   $dsn = "mysql:host=localhost;dbname=alumni05";

   // Maa endres fra innocent, finne ut hva disse gjor
   $db = new PDO($dsn,"root","1234");

   $loginnTeller = 0;

   $sql = "insert into bruker (brukerNavn,passord,fornavn,etternavn,ePost,feilLoginnTeller)";
   $sql.= "values (:studentid,:passord,:fornavn,:etternavn,:epost,$loginnTeller)";

   $stmt = $db->prepare($sql);

   $stmt->bindParam(':fornavn',$bfornavn);
   $stmt->bindParam(':etternavn',$betternavn);
   $stmt->bindParam(':epost',$bepost);
   $stmt->bindParam(':passord',$bpassord);
   $stmt->bindParam(':studentid',$bstudentid);


   $bfornavn = $_POST['fornavn'];
   $betternavn = $_POST['etternavn'];
   $bepost = $_POST['epost'];
   $bpassord = $_POST['passord'];
   $bstudentid = $_POST['studentid'];


   $stmt->execute();

    } else {
    }
   // header("Location: /app/siden/");


?>
