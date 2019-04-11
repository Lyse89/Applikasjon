<!-- Denne siden er utviklet av William Rastad siste gang endret 14.01.2019 -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" type="text/css" href="../css/style.css">
 <head>
    <meta charset="utf-8">
    <title>Personer</title>
    <style>

    .søkPersonerBox{
        width: 40%;
        margin: 30px 0 30px 0;
        padding-bottom: 25px;
        display:inline-block;
        margin-right:10px;
        margin-left: 10px;
        position: center;
    }

        .center {
        box-shadow: 10px 10px 8px #c0c0c0;
        margin: 0 5% 50px 5%;
        margin-top: 50px;
        padding: 0 2% 0 2%;
        width: 86%;
        /*max-width: 1230px;*/
        background-color: white;
        float: left;
        /*margin-bottom: 50px;*/
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
        background-color:;
        text-align: center;
    }

    .top10interesser {
        text-align: left;
        margin:1% 20% 3% 46%;
        font-size: 18px;
    }
    h1{
        text-align: center;
    }

    .instillinger-boks {
        width: 260px;
        padding: 30px;
    }

    </style>
 </head>
 <body>
<?php
include_once("../includes/init.php");
include_once('../includes/header_innlogget.php');
include_once('../includes/ikke_logget_inn.inc.php');
?>
    <h1> Top 10 Interesser </h1>
<div class = "top10interesser">
    <?php
    $db = new PDO($dsn,"$dbBrukernavn","$dbPassord");
    $stmt = $db->query('SELECT interesse FROM interessekobling GROUP BY interesse ORDER BY COUNT(*) DESC LIMIT 10;');
    $count = 0;
    if($stmt->rowCount()){
        while ($row = $stmt->fetch()){
            $count ++;
            echo $count, ': ', $row['interesse'];
            echo "<br>";
        }
    }
    ?>
</div>

<div class="søkPersonerBox">
    <h2> Søk på Interesser </h2>
    <form class="søk-Interesser" action="personer.php" method="POST">
        <input type="text" name="Interesser" id=Interesser placeholder="Interesser">
        <input type="submit" name="søkPåInteresse" value="Søk" id="søkPåInteresse">
    </form>
    <div class="SøkResultater">
    <?php
    if (isset($_POST['søkPåInteresse']))
    {
        søkInteresse();
    }
    function søkInteresse() {
        // DB Connect
        include("../includes/init.php");
        $db = new PDO($dsn,"$dbBrukernavn","$dbPassord");
        $søkord = $_POST['Interesser'];
        $stmt = $db->query("SELECT bruker.fornavn, bruker.etternavn, interessekobling.interesse FROM bruker INNER JOIN interessekobling ON bruker.brukerNavn = interessekobling.brukerNavn WHERE interesse LIKE '%$søkord%'");

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
    
    }
    ?>
</div>
</div>
<div class="søkPersonerBox">
    <h2> Søk på person </h2>
    <form class="søk-person" action="personer.php" method="POST">
        <input type="text" name="brukernavn" id=brukernavn placeholder="Brukernavn">
        <input type="submit" name="søkBrukernavn" value="søkBrukernavn" id="søkBrukernavn">
    </form>
    <?php
    if (isset($_POST['søkBrukernavn']))
    {
        søkPerson();
    }
    function søkPerson() {
        // DB Connect
        include("../includes/init.php");
        $db = new PDO($dsn,"$dbBrukernavn","$dbPassord");
        $søkord = $_POST['brukernavn'];
        $stmt = $db->query("SELECT * FROM bruker
        WHERE brukerNavn LIKE '%$søkord%'");

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
    
    }
    ?>
</div>

</body>
</html>
