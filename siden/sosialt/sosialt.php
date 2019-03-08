<!-- Denne include-siden er utviklet av Kristoffer Sorensen, siste gang endret 08.03.2019
// Denne include-siden er kontrollert av Kristoffer Sorensen, siste gang 08.03.2019-->
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
    
    .arrangementNy {
        float: right;
        margin: 50px 7.5% 0 2.5%;
        background-color: white;
        height: 600px;
        width: 40%;
        

    }

</style>

</head>

<body>
    <?php
    include_once('../includes/header_innlogget.php');
    include_once('../includes/ikke_logget_inn.inc.php');
    ?>
    <a href="arrangement.php">Midlertidig link til et arrangement</a>

<div class="arrangementListe">
    <h1>Kommende arrangement</h1>
    <div class="arrangementListeBoks">
        <h2>Tittel for arrangement</h2>
        <p>Dato : yyyy.mm.dd</p>
        <p>Sted : lokasjon for arrangement</p>
    </div>

    <div class="arrangementListeBoks">
        <h2>Tittel for arrangement</h2>
        <p>Dato : yyyy.mm.dd</p>
        <p>Sted : lokasjon for arrangement</p>
    </div>

    <div class="arrangementListeBoks">
        <h2>Tittel for arrangement</h2>
        <p>Dato : yyyy.mm.dd</p>
        <p>Sted : lokasjon for arrangement</p>
    </div>
</div>
<div class="arrangementNy">

</div>

</body>
</html>
