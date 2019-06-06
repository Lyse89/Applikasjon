<?php
// Denne filen er utviklet av Kristoffer Sorensen, siste gang endret 06.06.2019
// Denne filen er kontrollert av Kristoffer Sorensen, siste gang 06.06.2019

include('../includes/ikke_logget_inn.inc.php');
include("../includes/init.php");
include('../includes/logg_inn_db.inc.php');

$arrangementid = $_POST['arrangementid'];
$brukernavn = $_POST['brukernavn'];

// trygg mot sql injection ettersom at id er en int og at brukernavn
// er vasket for escape chars ved registrering
$sql = "delete from arrangementDeltagelse where arrangementId = '" .
		$arrangementid . "' and deltager = '" . $brukernavn . "';";

$stmt =  $db->prepare($sql);
$stmt->execute();

$arrangementside = 'Location: arrangement.php?id=' . $arrangementid;
header($arrangementside);
?>
