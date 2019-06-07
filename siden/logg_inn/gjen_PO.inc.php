<?php
// Denne include-siden er kontrollert av Simen Lyse, siste gang 05.06.2019 -->
// Denne include-siden er utviklet av Simen Lyse , siste gang endret 05.06.2019

include_once('../includes/ikke_logget_inn.inc.php');

if(isset($_POST["btnGjenPO"])) {
  $epost = $_POST["epost"]

  $sql = $db->query("select * from bruker where ePost = '$epost'");
  $resultat = $sql->fetch()

  if($resultat == $epost) {
    $nyttPO = bin2hex(openssl_random_pseudo_bytes(5));

    ini_set("SMTP","s120.hbv.no");
    ini_set("smtp_port","25");
    date_default_timezone_set("Europe/Oslo");
    $til = $_POST['epost'];
    $fra = 'admin@alumni.no';
    $subject = 'Gjennoppreting av passord';
    $melding = 'Dit nye passord er'. $nyttPO . 'vær så snill å bytt passord så for som mulig, hvis du ikke ba om nytt passord kontakt en administrator';
    $headers = "From: " . $fra . "\r\n" .
          'X-Mailer: PHP/' . phpversion() . "\r\n" .
          "MIME-Version: 1.0\r\n" .
          "Content-Type: text/html; charset=utf-8\r\n" .
          "Content-Transfer-Encoding: 8bit\r\n\r\n";

    $hashPO = sha1($salt.sha1($salt.$nyttPO));

    try {
      $sql = "UPDATE bruker SET passord = '$hashPO' where ePost = '$epost';";
      $stmt = $db->prepare($sql);
      $stmt->execute();
    } catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
    
  }

  header("Location: logg_inn_siden.php");

 ?>
