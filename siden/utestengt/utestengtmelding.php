<style>
body{
    color: red;
    text-align: center;
}
</style>

<?php
// Denne include-siden er kontrollert av William Rastad, siste gang 05.03.2019 -->
// Denne include-siden er utviklet av William Rastad , siste gang endret 05.03.2019

include('../includes/ikke_logget_inn.inc.php');
include_once('../includes/init.php');

if ($_SESSION['rolle'] == "Utestengt"){
    echo("<br><h1>Denne brukeren er permanent utestengt</h1><br>");
}

if ($_SESSION['rolle'] == "Karantene"){
    echo("<h1>Denne brukeren er satt i karantene</h1> <br>");
    $søkord = $_SESSION['brukernavn'];
    $db = new PDO($dsn,"$dbBrukernavn","$dbPassord");
    $stmt = $db->query("SELECT karantene.startTid, karantene.sluttTid FROM karantene WHERE brukerNavn = '$søkord' Order By startTid DESC");
    if($stmt->rowCount()){
        $row = $stmt->fetch();
            echo("Start tid: ");
            echo $row['startTid'],'<br>';
            echo("Slutt tid: ");
            echo $row['sluttTid'],'<br><br>';
    }
}
?>

<form action="../includes/loggut.inc.php" method="POST">
<button type="submit" name="submit">Tilbake til innloggingside</button>
</form>
