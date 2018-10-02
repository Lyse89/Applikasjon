<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta charset="utf-8">
    <title>Default</title>
    <style>
        #DefaultBoxes{
          margin-top:5%;
        }

        #DefaultBoxes .Box{
          float:left;
          text-align: center;
          width:60%;
          border-style:solid;
          border-width: 2px;

        }
        #DefaultBoxes .Box1{
          margin-left: 2%;
          float:left;
          text-align: left;
          width:30%;
          padding:0px;
          border-style:solid;
          border-width: 2px;
        }

        /* Responsivt Design */
        @media(max-width: 768px){
            #DefaultBoxes .Box,
            #DefaultBoxes .Box1{
                text-align:center;
                width:96%;
                margin-top: 10px;
                margin-left: 0%;
                float:none;

            }
        }


    </style>

 </head>
  <body>
    <!-- Header (Nav) -->
    <?php
    include_once('header.php');
    ?>


    <section id="DefaultBoxes">
            <div class="Box"> <!-- Alumni Overskrift (Venstre) -->
                <h1>Alumni</h1>
                <p>USN Ringerike</p>
            </div>
            <div class="Box1"> <!-- Registrerings box -->
                <h2>Registrer deg her</h2>
                <form>
                    Fornavn: <input type"text" id=Fornavn> Etternavn: <input type"text" id=Etternavn> <br>
                    Email: <input type="email">                               <br>
                    Fødselsdato: <input type="date" id="Fødselsdato">         <br>
                    Passord: <input type="password" id="Passord">              <br>
                    Gjenta Passord: <input type"=password" id="GjentaPassord"> <br>
                    Mann:<input type="radio" name="checked" checked ="checked" value="Mann"> Kvinne:<input type="radio" name="checked" value="Kvinne"> <br>
                    <input type="submit" value="Registrer Deg" id="registrer">

                </form>
            </div>
    </div>
    </section>

    <!-- Footer -->
    <footer class ="footer"></footer>

  </body>
</html>
