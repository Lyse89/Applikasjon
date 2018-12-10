<!DOCTYPE html>
<!-- Denne siden er utviklet av William Rastad, siste gang endret 09.12.2018 -->
<!-- Denne siden er kontrollert av William Rastad, siste gang 10.12.2018 -->
<html lang="en" dir="ltr">
 <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta charset="utf-8">
    <title>Default</title>
    <style>

        /* En container for Tittel og registreringsboks */
        #DefaultBoxes{
          margin-top:5%;
          background-color: white;
        }

        /* Tittel */
        #DefaultBoxes .Box{
          margin-top: 6%;
          float:left;
          text-align: center;
          width:55%;
        }
        /* registreringsboks */
        #DefaultBoxes .Box1{
          margin: 2% 2% 2% 2%;
          float:left;
          text-align: center;
          width:35%;
          padding:10px;
        }

        #DefaultBoxes .Box1 h2{
            padding-left: 22px;
        }

        /* Register form */
        input[type=password], input[type=email], input[type=date], input[type=text]{
            width: 70%;
            padding: 10px;
            margin: 5px 0px 22px 22px;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type="submit"]{
            margin-left: 59%;
        }

        /* Responsivt Design */
        @media(max-width: 768px){
            #DefaultBoxes .Box,
            #DefaultBoxes .Box1{
                text-align:center;
                width:90%;
                margin: 2% 2% 2% 2%;
                float:none;
            }
        }
    </style>

 </head>
  <body>
    <!-- Header (Nav) -->
    <?php
    // Denne include-siden er utviklet av Simen A. Lyse , siste gang endret 09.12.2018
    // Denne include-siden er kontrollert av Simen A. Lyse, siste gang 10.12.2018
    include_once('header.php');
    ?>


    <div id="DefaultBoxes">
            <div class="Box"> <!-- Alumni Overskrift (Venstre) -->
                <h1 style="font-size: 50px;">Alumni</h1>
                <p>USN Ringerike IT</p>
            </div>
            <div class="Box1"> <!-- Registrerings box -->
                <h2>Opprett en ny konto</h2>
                <form class="signup-form" action="include/signeup.inc.php" method="POST">
                    <input type="text" name="fornavn" id=Fornavn placeholder="Fornavn">
                    <input type="text" name="etternavn" id=Etternavn placeholder="Etternavn"> <br>
                    <input type="email" name="epost" placeholder="Email">                                <br>
                    <input type="date" name="fødselsdato" id="Fødselsdato" placeholder="Fødselsdato">          <br>
                    <input type="password" name="passord" id="Passord" placeholder="Passord">              <br>
                    <input type="text" name="studentid" id="StudentID" placeholder="StudentID"> <br>
                    <input type="submit" value="Registrer Deg" id="registrer">
                </form>
            </div>
    </div>


    <!-- Footer -->
    <footer class ="footer"></footer>

  </body>
</html>
