<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Default</title>
    <style>

        #DefaultBoxes{
          margin-top:5%;
        }

        #DefaultBoxes .Box{
          float:left;
          text-align: center;
          width:65%;
          padding:10px;
          border-style:solid;
          border-width: 2px;
        }
        #DefaultBoxes .Box1{
          float:left;
          text-align: center;
          width:30%;
          padding:10px;
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
                float:none;

            }
        }


    </style>

 </head>
  <body>
    <!-- Header (Nav) -->
    <nav class="Navbar"></nav>

    <section id="DefaultBoxes">
            <div class="Box"> <!-- Alumni Overskrift (Venstre) -->
                <h1>Alumni</h1>
                <p>USN Ringerike</p>
            </div>
            <div class="Box1"> <!-- Registrerings box -->
                <h2>Registrer deg her</h2>
                <p> ay ay ay ay ay ay ay ay ay ay ay ay ay ay ay ay ay ay ay </p>
            </div>
    </div>

    <!-- Footer -->
    <footer class ="footer"></footer>

  </body>
</html>
