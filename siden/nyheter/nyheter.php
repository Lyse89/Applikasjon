<?php
    include_once('../includes/ikke_logget_inn.inc.php');
    //Denne include-siden er utviklet av Kristoffer Sorensen, siste gang endret 27.03.2019
    // Denne include-siden er kontrollert av Kristoffer Sorensen, siste gang 27.03.2019
?>
<!DOCTYPE html>
<html lang="no" dir="ltr">
<link rel="stylesheet" type="text/css" href="../css/style.css">

<head>
    <meta charset="utf-8">
    <title>IT Nyheter</title>
<style>

    body {
        margin: 0;
        padding: 0;
        background-color:#ddd;

    }
    /* Endret til liste fra */
    .liste {
        background-color: white;
        float: left;
        width: 40%;
        margin: 50px 2.5% 0 7.5%;
		box-shadow: 10px 10px 8px #c0c0c0;
    }
    .liste h1{
        width: 90%;
        margin: 25px 5% 25px 5%;
        border-bottom: 3px solid lightgrey;
    }
    /* spesifikk for denne siden */
    .liste p{
        margin: 7px 0 7px 0;
    }
    .datoTekst {
        color: grey;
    }
    /* */

    .nyhetsListeBoks {
        box-sizing: border-box;
        border-bottom: 2px solid lightgrey;
        padding: 10px 25px 0 25px;
        width: 100%;
        height: 100px;
        background-color: white;
    }
    .nyhetsListeBoks h2{
        margin: 0;
        font-size: 18px;
    }
    .nyhetsListeBoks a{
		text-decoration: none;
		color: black;
    }
    
    .nyhetsListeBoks a:hover{
		color: #9985ad;
    }

    .leggTilNyttArrangement {
        float: right;
        margin: 50px 7.5% 0 2.5%;
        background-color: white;
        padding-bottom: 20px;
        /* height: 600px; */
        width: 40%;
		box-shadow: 10px 10px 8px #c0c0c0;
    }

    .leggTilNyttArrangement h1{
        width: 90%;
        margin: 25px 5% 25px 5%;
        border-bottom: 3px solid lightgrey;
    }
    .tekstfelt {
        width: 15px;

    }

    .stortTekstfelt {
        /* Lagt til annen hoyde for boksen i nyhetsside */
        font-size: 14px;
        padding: 5px;
        margin: 15px 0 15px 0;
        -webkit-box-sizing:border-box;
        -moz-box-sizing:border-box;
        box-sizing:border-box;
        width: 100%;
        height: 350px;
        background-color: #eeeeee;
        border: none;
    }
    .opprettArrangementBoks {
        padding: 0;
        margin: 25px;
    }
    #opprettNyhetKnapp {
        float: right;
    }

    @media screen and (max-width: 1079px) {

        .leggTilNyttArrangement {
            width: 90%;
            margin-right: 5%;
            margin-left: 5%;
            float: left;
        }

        .liste {
            width: 90%;
            margin-right: 5%;
            margin-left: 5%;
            float: left;
    
            clear: both;
        }

    }
    @media screen and (max-width: 767px) {
        .leggTilNyttArrangement {
            width: 100%;
            margin-right: 0;
            margin-left: 0;
            float: left;
        }

        .liste {
            width: 100%;
            margin-right: 0;
            margin-left: 0;
            float: left;
    
            clear: both;
        }
    }
</style>

</head>

<body>
    <?php
    include_once('../includes/header_innlogget.php');
    include_once('../includes/init.php');
    ?>

<section class="leggTilNyttArrangement">
    <h1>Opprett nyhet</h1>

    <form class="opprettArrangementBoks" action="opprettNyhet.php" method="POST">
        <input type="text" name="tittel" id="tekstfelt" placeholder="Tittel"><br>
        <textarea class="stortTekstfelt" name="beskrivelse" placeholder="Beskrivelse"></textarea><br>
        <input type="submit" name="opprettNyhet" id="opprettNyhetKnapp" value="Legg til">
    </form>

</section>


<section class="liste">
    <h1>Nyheter</h1>

    <?php
        $db = new PDO($dsn,"$dbBrukernavn","$dbPassord");
        $stmt = $db->query('SELECT * FROM nyheter ORDER BY lagtTil DESC LIMIT 7');

        if($stmt->rowCount()){
            while ($row = $stmt->fetch()){

                echo '<div class="nyhetsListeBoks" >';
                    echo '<h2><a href="nyhet.php?id=' . $row['nyhetsid'] .'">', $row['tittel'],'</a></h2>';
                    echo '<p class=\'datoTekst\'>', $row['lagtTil'], '</p>';
                    echo '<p>', $row['forfatter'], '</p>';
                echo '</div>';
            }
        }
    ?>
</section>

</body>
</html>
<?php
