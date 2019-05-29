<?php
include('../includes/ikke_logget_inn.inc.php');
include("../includes/init.php");
include('../includes/logg_inn_db.inc.php');

$arrangementid = $_POST['arrangementid'];
$brukernavn = $_POST['brukernavn'];

// Trygg mot sql injection ettersom at id er en int og at brukernavn
// er vasket for escape chars ved registrering
$sql = "insert into arrangementDeltagelse values(" .
		$arrangementid . ", '" . $brukernavn . "');";

$stmt =  $db->prepare($sql);
$stmt->execute();

$arrangementside = 'Location: arrangement.php?id=' . $arrangementid;
header($arrangementside);

?>
