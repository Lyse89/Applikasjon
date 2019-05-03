<?php
$Mappe = "..siden/brukere/";
$Navn = $_SESSION['brukernavn'];

if(isset($_POST["submitProfilBilde"])) {
    $Fil = $Mappe . basename($_FILES["lasteOppProfilBilde"][$Navn]);
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
    if (move_uploaded_file($_FILES["lasteOppProfilBilde"]["tmp_name"], $Fil)) {
        $CookieMelding = "Filen ". basename( $_FILES["lasteOppProfilBilde"]["name"]). " har blitt lastet opp.";
        header("Location: profil.php?bilde=suksess");
        exit();
    }
}

 header("Location: profil.php");
?>
