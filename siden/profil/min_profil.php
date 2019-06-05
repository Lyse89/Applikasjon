<?php
include_once('../includes/ikke_logget_inn.inc.php');
include_once('../includes/init.php');
$id = $_SESSION['brukernavn'];
?>
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
    #MinProfil{
        margin-top: 3%;
        margin-left: 20%;
        margin-right: 20%;
        width:60%;
        text-align: center;
    }
    /*ProfilBilde Box*/
    #MinProfil .Profilbilde{
        width: 38%;
        margin-right: 2%;
        float:left;
        text-align: right;
    }
    /*Bio Box*/
    #MinProfil .Bio{
        width:60%;
        float:left;
        text-align: center;
    }
    /*Bio Tekst Box*/
    #MinProfil .biotekst{
        width: 100%;
        text-align: left;
        font-size: 13px;
    }
    /* studie*/

    /*Interesser Box*/
    #MinProfil .Interesser, .StudieSection{
        margin-top: 3%;
        width: 99%;
        float:left;
        text-align: center;
        border-style: ridge;
    }

    #MinProfil .Interessernr, .StudieDiv{
        margin-left: 21%;
        width: 60%;
        text-align: left;
        font-size: 13px;
    }

    /*Legge til ny interesse box*/
    #MinProfil .Leggtilnyinteresse{
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
    #MinProfil .Events{
        margin-top: 3%;
        width: 99%;
        float:left;
        text-align: center;
        border-style: ridge;
    }

    /* Responsiv */
    @media (min-width: 769px) and (max-width: 1080px) {
        #MinProfil .Profilbilde,
        #MinProfil .Bio,
        #MinProfil .biotekst{
            width: 100%;
            text-align: center;

        }
    }
    @media (min-width: 320px) and (max-width: 768px) {
        #MinProfil .Profilbilde,
        #MinProfil .Bio,
        #MinProfil .biotekst{
            width:100%;
            text-align: center;
        }
    }

    </style>
</head>

<body>
    <?php
    include_once('../includes/header_innlogget.php');
    include_once('../includes/rollesjekk.inc.php');
    ?>

    <article id="MinProfil">
        <?php
        include('../includes/logg_inn_db.inc.php');
        $stmt = $db->query("SELECT fornavn, etternavn FROM bruker WHERE brukerNavn LIKE '$id'");

        if($stmt->rowCount()){
            while ($row = $stmt->fetch()){
                echo "<h1>{$row['fornavn']} {$row['etternavn']} <a href='../brukerInstillinger/profil.php'><img src='../img/settings.png' width='18px' height='18px'></a></h1>";
            }
        }
        ?>

        <section class="Profilbilde">
            <br>
            <?php
              include('../includes/logg_inn_db.inc.php');
                $stmt = $db->query("SELECT bilde FROM bruker WHERE brukerNavn = '$id'");
                if($stmt->rowCount()){
                    while ($row = $stmt->fetch()){
                        echo '<img src="', $row['bilde'], '" style="width:250px;height:250px;">';
                      }
                    }
            ?>

        </section>

        <section class="Bio">
            <div class="biotekst">
                <?php
                include('../includes/logg_inn_db.inc.php');
                $stmt = $db->query("SELECT bio FROM bio WHERE brukerNavn = '$id'");
                echo "<h2> Bio:";
                if($stmt->rowCount()){
                    echo "<br>";

                    $count = 0;
                    while ($row = $stmt->fetch())
                    {
                        echo $row['bio'];
                    }
                }
                ?>
            </div>
        </section>
        <section class="StudieSection">
            <div class="StudieDiv">
                <?php
                include('../includes/logg_inn_db.inc.php');
                $stmt = $db->query("SELECT studier.studie FROM studier INNER JOIN studiekobling ON studiekobling.studie = studier.studie AND studiekobling.brukernavn = '$id'");
                echo "<h2> Studie: ";
                if($stmt->rowCount()){
                    $count=0;
                    while ($row = $stmt->fetch())
                    {
                        echo $row['studie'];
                        if ($count <= 39 ) {
                            echo ", ";
                        }
                        if ($count == 5 OR $count == 10 OR $count == 15 OR
                            $count == 20 OR $count == 25 OR $count == 30 OR
                            $count == 35 OR $count == 40){
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
        <section class="Interesser">
            <div class="Interessernr">
            <?php
            include('../includes/logg_inn_db.inc.php');
            $stmt = $db->query("SELECT interesser.interesse FROM interesser INNER JOIN interessekobling ON interessekobling.interesse = interesser.interesse AND interessekobling.brukernavn = '$id'");
            echo "<h2> Interesser:";
            if($stmt->rowCount()){
                echo "<br>";

                $count = 0;
                while ($row = $stmt->fetch())
                {
                    $count ++;
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
            <form class="presentasjon" action="leggTilInteresse.inc.php" method="POST">
              <input type="text" name="interesser" id=interesse placeholder="Skriv en Interesse"><br>
              <input type="submit" name="registrerInt" id="registrerInt" value="Registrer Interesse">
            </form>
        </section>

        <section class="Events">
            <h1>Events</h1>
        </section>
    </article>

    <?php
      include_once('../includes/footer.php');
    ?>

</body>

</html>
