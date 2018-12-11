<?php
// Simen

if(isset($_POST['btnSignup_form'])) {
   include_once("../includes/init.php");
   $dsn = "mysql:host=localhost;dbname=alumni05";
   $db = new PDO($dsn,"$dbBrukernavn","$dbPassord");

   $sql = "insert into bruker (brukerNavn,passord,fornavn,etternavn,fødselsdato,ePost)";
   $sql.= " values (:studentid,:passord,:fornavn,:etternavn,:fødselsdato,:epost)";

   $stmt = $db->prepare($sql);

   $stmt->bindParam(':fornavn',$bfornavn);
   $stmt->bindParam(':etternavn',$betternavn);
   $stmt->bindParam(':epost',$bepost);
   $stmt->bindParam(':fødselsdato',$bfødselsdato);
   $stmt->bindParam(':passord',$bpassord);
   $stmt->bindParam(':studentid',$bstudentid);

   $bfornavn = $_POST['fornavn'];
   $betternavn = $_POST['etternavn'];
   $bepost = $_POST['epost'];
   $bfødselsdato = $_POST['fødselsdato'];
   $bpassord = $_POST['passord'];
   $bstudentid = $_POST['studentid'];

   // Dobbel saltet og hashet passord
   $bpassord = sha1($salt.sha1($salt.&_POST['passord']));

   $stmt->execute();


?>
