<?php
// Simen
include_once 'db.inc.php';

if(isset($_POST['btnSignup_form']))
{
   $bfornavn = trim($_POST['fornavn']);
   $uetternavn = trim($_POST['etternavn']);
   $epost = trim($_POST['epost']);
   $fødselsdato = trim($_POST['fødselsdato']);
   $passord = trim($_POST['passord']);
   $studentid = trim($_POST['studentid']);

   // Dobbel saltet og hashet passord
   $passord = sha1($salt.sha1($salt.&_POST['passord']));


?>
