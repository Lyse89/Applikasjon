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
        font-size: 20px;
    }
    .arrangementListeBoks a{
		text-decoration: none;
		color: black;
    }
    
    .arrangementListeBoks a:hover{
		color: #9985ad;
    }

    .arrangementNy {
        float: right;
        margin: 50px 7.5% 0 2.5%;
        background-color: white;
        height: 600px;
        width: 40%;
		box-shadow: 10px 10px 8px #c0c0c0;
    }

    .arrangementNy h1{
        width: 90%;
        margin: 25px 5% 25px 5%;
        border-bottom: 3px solid lightgrey;
    }

</style>

</head>

<body>
    <?php
    include_once('../includes/header_innlogget.php');
    include_once('../includes/init.php');
    ?>

<div class="arrangementListe">
    <h1>Kommende arrangement</h1>

    <?php
        $db = new PDO($dsn,"$dbBrukernavn","$dbPassord");
        $stmt = $db->query('SELECT * FROM arrangement ORDER BY startTid DESC LIMIT 5');

        if($stmt->rowCount()){
            while ($row = $stmt->fetch()){

                echo '<div class="arrangementListeBoks" >';
                    echo '<h2><a href="arrangement.php">', $row['tittel'],'</a></h2>';
                    echo '<p>Dato : ', $row['startTid'], '</p>';
                    echo '<p>Sted : ', $row['lokasjon'], '</p>';
                echo '</div>';
            }
        }
    ?>
</div>
<div class="arrangementNy">
    <h1>Opprett nytt arrangement</h1>
</div>

</body>
</html>
