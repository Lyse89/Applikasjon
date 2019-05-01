<?php
if ($_SESSION['rolle'] == 'Utestengt') {
    header("location:../utestengt/utestengtmelding.php");
}

if ($_SESSION['rolle'] == "Karantene") {
    $søkord = $_SESSION['brukernavn'];
    $db = new PDO($dsn,"$dbBrukernavn","$dbPassord");
    $stmt = $db->query("SELECT karantene.startTid, karantene.sluttTid FROM karantene WHERE brukerNavn = '$søkord' Order By startTid DESC");
    $stmt1 = $db->query("SELECT CURRENT_TIMESTAMP");
    $date = date('Y-m-d H:i:s');

    if ($row['sluttTid'] > $date) {
        $stmt2 = $db->query("UPDATE bruker SET bruker.rolle = 'Bruker' WHERE bruker.brukerNavn = '$søkord'");
        header("Location: ../innlogget_forside/innlogget_forside2.php");
    }
    else{
        header("location:../utestengt/utestengtmelding.php");
    }
}
?>
