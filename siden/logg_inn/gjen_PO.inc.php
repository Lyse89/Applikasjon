<?php
// Denne include-siden er kontrollert av Simen Lyse, siste gang 05.05.2019 -->
// Denne include-siden er utviklet av Simen Lyse , siste gang endret 05.05.2019

include_once('../includes/ikke_logget_inn.inc.php');

if(isset($_POST["btnGjenPO"])) {
  $epost = $_POST["epost"]

  $sql = $db->query("select * from bruker where ePost = '$epost'");
  $resultat = $sql->fetch()

  if($resultat == $epost) {
    
  }

 ?>
