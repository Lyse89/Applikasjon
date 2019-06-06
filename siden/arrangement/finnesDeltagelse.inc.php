<?php
// Denne filen er utviklet av Kristoffer Sorensen, siste gang endret 06.06.2019
// Denne filen er kontrollert av Kristoffer Sorensen, siste gang 06.06.2019

function deltar($brukernavn, $arrangementid) {
    include('../includes/logg_inn_db.inc.php');

    $sql = "select deltager from arrangementDeltagelse where deltager ='".$brukernavn."' and  arrangementId = '" . $arrangementid . "';";

    $stmt =  $db->prepare($sql);
    $stmt->execute();


    if($stmt->rowCount()){
        return true;
    } else {
        return false;
    }
}
?>

