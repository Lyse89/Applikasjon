<!-- Denne siden er utviklet av William Rastad siste gang endret 29.01.2019 -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" type="text/css" href="../css/style.css">
 <head>
    <meta charset="utf-8">
    <title>Personer</title>
    <style>

    .SøkPersonerBox{
        margin:5% 20% 0.1% 20%;
        text-align: center;
    }

    /* Søk på Interesser og finn Personer */
    input[type=text]{
        width: 20%;
        padding: 10px;
        margin: 5px 0px 22px 22px;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }

    input[type="submit"]{
        background: #ddd;
        font-size: 20px;
        border: none;
        cursor: pointer;
    }

    /* Søk resultat */
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }
    th, td {
      padding: 5px;
      text-align: left;
    }
    .SøkResultater {
        margin:1% 25% 2% 25%;
        text-align: center;
    }

    #errormsg {
        color:red;
    }
    </style>
 </head>
 <body>

<?php
include_once('../includes/header_innlogget.php');
include_once('../includes/ikke_logget_inn.inc.php');
?>

<div class="SøkPersonerBox">
    <h1> Søk på Interesser </h1>
    <form class="søk-Interesser" action="personer.inc.php" method="POST">
        <input type="text" name="Interesser" id=Interesser placeholder="Interesser">
        <input type="submit" name="SøkPåInteresse" value="Søk" id="SøkPåInteresse">
    </form>
</div>

<div class="SøkResultater">
    <?php
    // DB Connect
    include_once("../includes/init.php");
    $db = new PDO($dsn,"$dbBrukernavn","$dbPassord");
    $søkord = $_POST['Interesser'];
    $stmt = $db->query("SELECT bruker.fornavn, bruker.etternavn, interesser.interesse FROM bruker INNER JOIN interesser ON bruker.brukerNavn = interesser.brukerNavn WHERE interesse LIKE '%$søkord%'");

    if (!$søkord){
        echo "<div id='errormsg'>Skriv inn en interesse</div>";

    }elseif($stmt->rowCount()){
        echo "<table width=100%>";
        echo "<h2> Resultater:";
        echo "<tr><td><b>Fornavn</b></td><td><b>Etternavn</b></td><td><b>Interesse</b></td>";

        while ($row = $stmt->fetch())
        {
            echo "<tr><td>{$row['fornavn']}</td><td>{$row['etternavn']}</td><td>{$row['interesse']}</tr>";
        }
        echo "</table>";
    }else{
        echo "<div id='errormsg'>Søket ga ingen resultat</div>";
    }
    ?>
</div>
</body>
</html>
