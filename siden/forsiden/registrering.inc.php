<?php
// Simen
include_once 'db.inc.php';

if(isset($_POST['btnSignup_form']))
{
   $bfornavn = $_POST['fornavn'];
   $uetternavn = $_POST['etternavn'];
   $epost = $_POST['epost'];
   $fødselsdato = $_POST['fødselsdato'];
   $passord = $_POST['passord'];
   $studentid = $_POST['studentid'];

   // Dobbel saltet og hashet passord
   $passord = sha1($salt.sha1($salt.&_POST['passord']));


?>
