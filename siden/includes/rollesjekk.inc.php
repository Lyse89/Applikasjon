<?php
if ($_SESSION['rolle'] == 'Utestengt') {
    header("location:../utestengt/utestengtmelding.php");
}

if ($_SESSION['rolle'] == "Karantene") {
    $søkord = $_SESSION['brukernavn'];
    $db = new PDO($dsn,"$dbBrukernavn","$dbPassord");

    // Karantene sisteTid
    $stmt = $db->query("SELECT karantene.sluttTid FROM karantene WHERE brukerNavn = '$søkord' Order By startTid DESC");
    if($stmt->rowCount()){
        $row = $stmt->fetch();
    }
    $sluttdate = date('m-d-Y h:i:s', strtotime($row['sluttTid']));

    //Nå datetime
    date_default_timezone_set('Europe/Oslo');
    $date = (date('m-d-Y h:i:s', time()));

    if ($sluttdate < $date){
        $stmt2 = $db->query("UPDATE bruker SET bruker.rolle = 'Bruker' WHERE bruker.brukerNavn = '$søkord'");
        header("Location: ../innlogget_forside/innlogget_forside2.php");
    }
    if ($sluttdate > $date){
        header("location:../utestengt/utestengtmelding.php");
    }
}
?>
