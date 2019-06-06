<?php
//DOCTYPE
//Denne siden er utviklet av William Rastad, siste gang endret 09.12.2018
//Denne siden er kontrollert av William Rastad, siste gang 10.12.2018

    // Sjekk for om brukeren er innlogget og videresending til innlogget forside
    session_start();
    if (isset($_SESSION['sessionId'])) {
        header("Location:siden/innlogget_forside/innlogget_forside2.php");
    }

?>

<html lang="en" dir="ltr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="siden/css/style.css">
    <meta charset="utf-8">
    <title>Default</title>

    <style>



    </style>

</head>

 <body>
   <!-- Header (Nav) -->
   <?php
   include_once('siden/forsiden/header.php');
   ?>
    <div id="DefaultBoxes">
        <div class="Box"> <!-- Alumni Overskrift (Venstre) -->
            <h1 style="font-size: 50px;">Alumni</h1>
            <p>Et nettverk for samarbeid og kunnskapsdeling mellom nåværende og tidligere studenter innen IT på usn. Deling av informasjon relatert til arrangementer, jobb og generelt nytt om hva som skjer på campus.</p>
        </div>

        <script type="text/javascript">
          function sjekkFelt() {
            var error = "";
            if (document.getElementById('Fornavn').value == "") {
              error += "Skriv in Fornavn \n";
              document.getElementById('Fornavn').style.border = "1px solid red";
            }
            if (document.getElementById('Etternavn').value == "") {
              error += "Skriv in Etternavn \n";
              document.getElementById('Etternavn').style.border = "1px solid red";
            }
            if (document.getElementById('epost').value == "") {
              error += "Skriv in epost \n";
              document.getElementById('epost').style.border = "1px solid red";
            }
            if (document.getElementById('brukernavn').value == "") {
              error += "Skriv in en brukernavn \n";
              document.getElementById('brukernavn').style.border = "1px solid red";
            }
            if (document.getElementById('Passord').value == "") {
              error += "Skriv in en Passord \n";
              document.getElementById('Passord').style.border = "1px solid red";
            }
            if (document.getElementById('GjentaPassord').value == "") {
              error += "Skriv in en GjentaPassord \n";
              document.getElementById('GjentaPassord').style.border = "1px solid red";
            }
            if (document.getElementById('brukernavn').value == "") {
              error += "Skriv in en brukernavn \n";
              document.getElementById('brukernavn').style.border = "1px solid red";
            }
            if (error != "") {
              alert(error);
              return false;
            }
          }
        </script>

        <div class="Box1"> <!-- Registrerings box -->
            <h2>Opprett en ny konto</h2>
            <form class="signup-form" action="siden/forsiden/registrering.inc.php" method="POST" onsubmit="return sjekkFelt();">
                <input type="text" name="fornavn" id=Fornavn placeholder="Fornavn">
                <input type="text" name="etternavn" id=Etternavn placeholder="Etternavn"><br>
                <input type="email" name="epost" placeholder="E-post" id="epost"><br>
                <input type="password" name="forstePassord" id="Passord" placeholder="Passord" minlength=8><br>
                <?php
                    $url ="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    if (strpos($url, "reg=kortpo") == true) {
                      echo "<p class='error'>For kort passord</p>";
                    }
                  ?>
                <input type="password" name="passord" id="GjentaPassord" placeholder="Gjenta Passord"><br>
                <input type="text" name="brukernavn" id="brukernavn" placeholder="Bruker Navn"> <br>
                <input type="submit" name="btnSignup_form" value="Registrer Deg" id="registrer" onclick="Validate()">
            </form>
        </div>
    </div>
    <!-- Footer -->
    <?php
      include_once('siden/includes/footer.php');
    ?>

  </body>
</html>
