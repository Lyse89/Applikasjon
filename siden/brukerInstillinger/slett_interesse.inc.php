<style>
    #errormsg {
        color:red;
    }
</style>
<?php
include_once('../includes/init.php');
include_once('../includes/header_innlogget.php');
include_once('../includes/ikke_logget_inn.inc.php');
$db = new PDO($dsn,$dbBrukernavn,$dbPassord);

$brukernavn = $_SESSION['brukernavn'];
$søkord = $_POST['slett_interesser'];

$sql = "DELETE FROM interessekobling WHERE brukerNavn = '$brukernavn' AND interesse LIKE '$søkord'";

$stmt = $db->prepare($sql);
$stmt->bindParam($brukernavn,$bstudentid);
$stmt->bindParam($søkord,$binteresse);

$bstudentid = $brukernavn;
$binteresse = $søkord;
$stmt->execute();

header("Location: profil.php");
?>
