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

   if($bfornavn=="") {
      $error[] = "Legg til fornavn !";
   }
   else if($uetternavn=="") {
      $error[] = "Legg til etternavn !";
   }
   else if(!filter_var($epost, FILTER_VALIDATE_EMAIL)) {
      $error[] = 'Skriv en godkjent emial !';
   }
   else if($fødselsdato=="") {
      $error[] = "Legg til fødselsdato !";
   }
   else if($passord=="") {
      $error[] = "Legg til passord !";
   }
   else if($studentid=="") {
      $error[] = "Legg til StudentID !";
   }
   {
      try
   }

?>
