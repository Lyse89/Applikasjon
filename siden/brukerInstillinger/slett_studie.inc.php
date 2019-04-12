
<style>
    #errormsg {
        color:red;
    }
</style>
<?php
// Denne include-siden er utviklet av William Rastad, siste gang endret 10.04.2019
include_once('../includes/init.php');
include_once('../includes/header_innlogget.php');
include_once('../includes/ikke_logget_inn.inc.php');
$db = new PDO($dsn,$dbBrukernavn,$dbPassord);

$brukernavn = $_SESSION['brukernavn'];
$søkord = $_POST['slett_studie'];

$sql = "DELETE FROM studiekobling WHERE brukerNavn = '$brukernavn' AND studie LIKE '$søkord'";

$stmt = $db->prepare($sql);
$stmt->bindParam($brukernavn,$bstudentid);
$stmt->bindParam($søkord,$bistudie);

$bstudentid = $brukernavn;
$bistudie = $søkord;
$stmt->execute();

header("Location: profil.php");
?>
