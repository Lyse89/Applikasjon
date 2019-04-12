<?php
//Denne siden er utviklet av Kristoffer Sorensen, siste gang endret 12.04.2019
//Denne include-siden er kontrollert av Kristoffer Sorensen, siste gang 12.04.2019
//
//include("logg_inn_db.inc.php");
include("../includes/init.php");
include("../includes/logg_inn_db.inc.php");
$db = new PDO($dsn,"$dbBrukernavn","$dbPassord");

$sporring = 'SELECT * FROM bruker WHERE brukerNavn =\''.$_SESSION['brukernavn'].'\';';
$stmt = $db->query($sporring);

if($stmt->rowCount()){
    while($row = $stmt->fetch()){
        $_SESSION['rolle'] = $row['rolle'];
    }
} else {$_SESSION['rolle'] = '';}
?>
