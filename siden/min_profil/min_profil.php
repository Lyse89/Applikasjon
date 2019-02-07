<!DOCTYPE html>
<html>
<!-- Denne siden er utviklet av William Rastad, siste gang endret 06.02.2019 -->

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta charset="utf-8">
    <title>Min Profil</title>

    <style>
    /*Min Profil Box*/
    .MinProfil{
        margin-top: 3%;
        margin-left: 20%;
        margin-right: 20%;
        width:60%;
        text-align: center;
    }
    /*ProfilBilde Box*/
    .Profilbilde{
        width: 38%;
        margin-right: 2%;
        float:left;
        text-align: right;
    }
    /*Bio Box*/
    .Bio{
        width:60%;
        float:left;
        text-align: center;
    }
    /*Bio Tekst Box*/
    .biotekst{
        width: 60%;
        text-align: left;
        font-size: 20px;
    }

    /*Interesser Box*/
    .Interesser{
        margin-top: 3%;
        width: 99%;
        float:left;
        text-align: center;
        border-style: ridge;
    }

    .Interessernr{
        margin-left: 21%;
        width: 60%;
        text-align: left;
        font-size: 13px;
    }

    /*Legge til ny interesse box*/
    .Leggtilnyinteresse{
        margin-top: 3%;
        width: 99%;
        float:left;
        text-align: center;
        border-style: ridge;
    }
    /*Legge til ny interesse styling*/
    input[type=text]{
        width: 50%;
        padding: 10px;
        margin: 5px 0px 22px 22px;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }
    input[type="submit"]{
        background: #f1f1f1;
        font-size: 17px;
        border: none;
        cursor: pointer;
        margin-bottom: 1%;
    }

    /*Event box*/
    .Events{
        margin-top: 3%;
        width: 99%;
        float:left;
        text-align: center;
        border-style: ridge;
    }
    </style>
</head>


<body>
    <?php
    include_once('../includes/header_innlogget.php');
    include_once('../includes/ikke_logget_inn.inc.php');
    ?>

    <article class="MinProfil">
        <h1> Min Profil</h1>
        <section class="Profilbilde">
            <br>
            <img src="../profil/Profilbilde/maxresdefault.jpg" style="width:250px;height:250px;">
        </section>

        <section class="Bio">
            <div class="biotekst">
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            </div>
        </section>






        <section class="Interesser">
            <div class="Interessernr">
            <?php
            // DB Connect
            include_once("../includes/init.php");
            include_once('../includes/ikke_logget_inn.inc.php');
            $dsn = "mysql:host=localhost;dbname=alumni05";
            $db = new PDO($dsn,"$dbBrukernavn","$dbPassord");
            $søkord = $_SESSION['brukernavn'];
            $stmt = $db->query("SELECT interesse FROM interesser WHERE brukerNavn LIKE '$søkord'");

            if($stmt->rowCount()){
                echo "<h2> Interesser:";
                echo "<br>";

                $count = 0;
                while ($row = $stmt->fetch())
                {
                    $count ++;
                    echo $count;
                    echo " ";
                    echo $row['interesse'];
                    if ($count <= 39 ) {
                        echo ", ";
                    }

                    if ($count == 5 OR $count == 10 OR $count == 15 OR $count == 20 OR $count == 25 OR $count == 30 OR $count == 35 OR $count == 40){
                        echo "<br>";
                    }
                    if ($count >= 40) {
                        break;
                    }
                }
            }
            ?>
            </div>
        </section>






        <section class="Leggtilnyinteresse">
            <h1>Legg til en ny interesse</h1>
            <form class="presentasjon" action="min_profil.inc.php" method="POST">
              <input type="text" name="interesser" id=interesse placeholder="Skriv en Interesse"><br>
              <input type="submit" name="registrerInt" id="registrerInt">
            </form>
        </section>

        <section class="Events">
            <h1>Events</h1>
            <h3>Event-overskrift3</h3>
            <img src="something.png" style="width:100%;">
            <p>Some text here, yes indeed some text</p>
            <p>Some text here, yes indeed some text</p>
        </section>
    </article>
</body>

</html>
