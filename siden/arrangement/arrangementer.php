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
    .arrangementListe {
        background-color: white;
        float: left;
        width: 40%;
        margin: 50px 2.5% 0 7.5%;
		box-shadow: 10px 10px 8px #c0c0c0;
    }
    .arrangementListe h1{
        width: 90%;
        margin: 25px 5% 25px 5%;
        border-bottom: 3px solid lightgrey;
    }

    .arrangementListeBoks {
        box-sizing: border-box;
        border-bottom: 2px solid lightgrey;
        padding: 10px 25px 0 25px;
        width: 100%;
        height: 150px;
        background-color: white;
    }
    .arrangementListeBoks h2{
        margin: 0;
        font-size: 18px;
    }
    .arrangementListeBoks a{
		text-decoration: none;
		color: black;
    }
    
    .arrangementListeBoks a:hover{
		color: #9985ad;
    }

    .leggTilNyttArrangement {
        float: right;
        margin: 50px 7.5% 0 2.5%;
        padding-bottom: 20px;
        background-color: white;
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
        font-size: 14px;
        padding: 5px;
        margin: 15px 0 15px 0;
        -webkit-box-sizing:border-box;
        -moz-box-sizing:border-box;
        box-sizing:border-box;
        width: 100%;
        height: 100px;
        background-color: #eeeeee;
        border: none;
    }
    .opprettArrangementBoks {
        padding: 0;
        margin: 25px;
    }
    #registrerArrKnapp {
        float: right;
    }

    @media screen and (max-width: 1079px) {

        .leggTilNyttArrangement {
            width: 90%;
            margin-right: 5%;
            margin-left: 5%;
            float: left;
        }

        .arrangementListe {
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

        .arrangementListe {
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
    <h1>Opprett nytt arrangement</h1>
    <form class="opprettArrangementBoks" action="leggTilInteresse.inc.php" method="POST">
        <input type="text" name="tittel" id="tekstfelt" placeholder="Tittel"><br>
        <input type="text" name="lokasjon" id="tekstfelt" placeholder="Sted"><br>
        <textarea class="stortTekstfelt" name="Beksrivelse" placeholder="Beskrivelse" rows="6" cols="150" minlength="0" maxlength="255"></textarea><br>

        <input type="hidden" name="vert" id="tekstfelt" >
        <input type="submit" name="registrerInt" id="registrerArrKnapp" value="Registrer arrangment">
    </form>
</section>

<section class="arrangementListe">
    <h1>Kommende arrangement</h1>

    <?php
        $db = new PDO($dsn,"$dbBrukernavn","$dbPassord");
        $stmt = $db->query('SELECT * FROM arrangement ORDER BY startTid DESC LIMIT 5');

        if($stmt->rowCount()){
            while ($row = $stmt->fetch()){

                echo '<div class="arrangementListeBoks" >';
                    echo '<h2><a href="arrangement.php?id=' . $row['arrangementId'] .'">', $row['tittel'],'</a></h2>';
                    echo '<p>Dato : ', $row['startTid'], '</p>';
                    echo '<p>Sted : ', $row['lokasjon'], '</p>';
                echo '</div>';
            }
        }
    ?>
</section>
</body>
</html>
