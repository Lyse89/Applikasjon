<?php
$Mappe = "profilBilde/";
$LastseOpp = 1;

if(isset($_POST["submitProfilBilde"])) {
    $Fil = $Mappe . basename($_FILES["lasteOppProfilBilde"]["name"]);
    $FileType = strtolower(pathinfo($Fil,PATHINFO_EXTENSION));
    $Sjekk = getimagesize($_FILES["lasteOppProfilBilde"]["tmp_name"]);
    if($Sjekk !== false) {
        $Melding =  "File is an image - " . $Sjekk["mime"] . ".";
        $LastseOpp = 1;
    } else {
        $Melding =  "Filen er ikke et bilde";
        $LastseOpp = 0;
    }
}

if ($_FILES["lasteOppProfilBilde"]["size"] > 500000) {
    $Melding =  "Filen er for stor, må være mindre en 500 000 bytes";
    $LastseOpp = 0;
}

if($FileType != "jpg" && $FileType != "png" && $FileType != "jpeg"
&& $FileType != "gif" ) {
    $Melding =  "Bare jpg, png, jpeg og gif er lov å laste opp.";
    $LastseOpp = 0;
}

if ($LastseOpp == 0) {
    $Melding = " Filen kunne ikke bli lastet opp.";

} else {
    if (move_uploaded_file($_FILES["lasteOppProfilBilde"]["tmp_name"], $Fil)) {
        $Melding = "Filen ". basename( $_FILES["lasteOppProfilBilde"]["name"]). " har blitt lastet opp.";
    } else {
        $Melding =  "En ukjent feil skjede når du prøvde å laste opp, kontak eier av siden vis det ikke funker";
    }
}

 header("Location: profil.php");
?>
