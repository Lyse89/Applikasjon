<?php
include_once('../includes/ikke_logget_inn.inc.php');
$Mappe = "../brukere/";
$bruker = $_SESSION['brukernavn'];
$nyttNavn = $Mappe . $bruker .'.'. pathinfo($_FILES["lasteOppProfilBilde"]["name"] ,PATHINFO_EXTENSION);

if(isset($_POST["submitProfilBilde"])) {
    $Fil = $Mappe . basename($_FILES["lasteOppProfilBilde"]["name"]);
    $FileType = strtolower(pathinfo($Fil,PATHINFO_EXTENSION));
}

if ($_FILES["lasteOppProfilBilde"]["size"] > 500000) {
    //  "Filen er for stor, må være mindre en 500 000 bytes";
    header("Location: profil.php?bilde=storfil");
    exit();
}

if($FileType != "jpg" && $FileType != "png" && $FileType != "jpeg") {
    //  "Bare jpg, png, jpeg og gif er lov å laste opp.";
    header("Location: profil.php?bilde=feiltype");
    exit();
    }


else {
    if (move_uploaded_file($_FILES["lasteOppProfilBilde"]["tmp_name"], $nyttNavn)) {
        $CookieMelding = "Filen ". basename( $_FILES["lasteOppProfilBilde"]["name"]). " har blitt lastet opp.";
        header("Location: profil.php?bilde=suksess");
        try {
          include('../includes/logg_inn_db.inc.php');
          $sql = "UPDATE Bruker SET bilde = '$nyttNavn' where brukerNavn = '$bruker'";
          $stmt = $db->prepare($sql);
          $stmt->execute();
        } catch(PDOException $e)
          {
          echo $sql . "<br>" . $e->getMessage();
          }
        exit();
    }
}

 header("Location: profil.php");
?>
