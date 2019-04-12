<?php
    //Denne siden er utviklet av Kristoffer Sorensen, siste gang endret 12.04.2019
    //Denne include-siden er kontrollert av Kristoffer Sorensen, siste gang 12.04.2019
    include("logg_inn_db.inc.php");

    $stmt = $db->query('SELECT rolle FROM bruker WHERE brukerNavn ='.$_SESSION['brukernavn'].';')

    if($stmt->rowCount()){
        $row = $stmt->fetch();
        $_SESSION['rolle'] = $row['rolle'];
    } else {$_SESSION['rolle'] = '';}
?>
