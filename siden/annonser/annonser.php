<?php
    //Denne include-siden er utviklet av Kristoffer Sorensen, siste gang endret 02.06.2019
    // Denne include-siden er kontrollert av Kristoffer Sorensen, siste gang 02.06.2019
    include_once('../includes/ikke_logget_inn.inc.php');
?>
<!DOCTYPE html>
<html lang="no" dir="ltr">

<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta charset="utf-8">
    <title>IT Nyheter</title>
<style>
    body {
        margin: 0;
        padding: 0;
        background-color:#ddd;

    }
    /* Endret til annonseListe fra */
    .annonseListe {
        background-color: white;
        float: left;
        width: 40%;
        margin: 50px 2.5% 0 7.5%;
		box-shadow: 10px 10px 8px #c0c0c0;
    }
    .annonseListe h1{
        width: 90%;
        margin: 25px 5% 25px 5%;
        border-bottom: 3px solid lightgrey;
    }
    .leggTilNyAnnonse h1 {
        font-size: 25px;
    }

    /* spesifikk for denne siden */
    .beskrivelseParagraf {
        margin: 7px 0 25px 0;
    }
/*
    .annonseListe p{
        margin: 7px 0 7px 0;
    }
*/
    .datoTekst {
        color: grey;
    }
    /* */

    .annonseannonseListeBoks {
        box-sizing: border-box;
        border-bottom: 2px solid lightgrey;
        padding: 10px 25px 0 25px;
        width: 100%;
        /*height: 250px;*/
        background-color: white;
    }
    .annonseannonseListeBoks h2{
        margin: 0;
        font-size: 18px;
    }
    .annonseannonseListeBoks a{
		text-decoration: none;
		color: black;
    }
    
    .annonseannonseListeBoks a:hover{
		color: #9985ad;
    }

    .leggTilNyAnnonse {
        float: right;
        margin: 50px 7.5% 0 2.5%;
        padding-bottom: 20px;
        background-color: white;
        width: 40%;
		box-shadow: 10px 10px 8px #c0c0c0;
    }

    .leggTilNyAnnonse h1{
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
    .opprettAnnonseBoks {
        padding: 0;
        margin: 25px;
    }
    #registrerKnapp {
        float: right;
    }

    @media screen and (max-width: 1079px) {

        .leggTilNyAnnonse {
            width: 90%;
            margin-right: 5%;
            margin-left: 5%;
            float: left;
        }

        .annonseListe {
            width: 90%;
            margin-right: 5%;
            margin-left: 5%;
            float: left;
    
            clear: both;
        }

    }
    @media screen and (max-width: 767px) {
        .leggTilNyAnnonse {
            width: 100%;
            margin-right: 0;
            margin-left: 0;
            float: left;
        }

        .annonseListe {
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

<div class="leggTilNyAnnonse">
    <h1>Opprett annonse</h1>
    <form class="opprettAnnonseBoks" action="opprettAnnonse.php" method="POST">

        <input type="text" name="tittel" id="tekstfelt" placeholder="Tittel"><br>
        <input type="text" name="stilling" id="stilling" placeholder="Stilling"><br>
        <input type="text" name="url" id="url" placeholder="Link til annonse"><br>
        <textarea class="stortTekstfelt" name="beskrivelse" placeholder="Beskrivelse"></textarea><br>

        <input type="submit" name="opprettAnnonse" id="registrerKnapp" value="Registrer annonse">
    </form>
</div>

<section class="annonseListe">
    <h1>Annonser</h1>

    <?php
        // koble til database
        include('../includes/logg_inn_db.inc.php');
        $stmt = $db->query('SELECT * FROM jobbAnnonse ORDER BY lagtTil DESC LIMIT 7');

        if($stmt->rowCount()){
            while ($row = $stmt->fetch()){

                echo '<div class="annonseannonseListeBoks" >';
                    echo '<h2><a href="'.$row['url'].'">', $row['tittel'],'</a></h2>';
                    $lagtTil = substr($row['lagtTil'], 0, 16);
                    echo '<p class=\'datoTekst\'>', $lagtTil, '</p>';
                    echo '<p>', $row['forfatter'], '</p>';
                    echo '<p class=\'beskrivelseParagraf\'>', $row['beskrivelse'], '</p>';

                echo '</div>';
            }
        }
    ?>
</section>

<?php
  include_once('../includes/footer.php');
?>

</body>
</html>
