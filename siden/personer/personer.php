<!-- Denne siden er utviklet av William Rastad siste gang endret 14.01.2019 -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" type="text/css" href="../css/style.css">
 <head>
    <meta charset="utf-8">
    <title>Personer</title>
    <style>

    .SøkPersonerBox{
        margin:5% 20% 0.1% 20%;
        background-color: ;
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
        background-color:;
        text-align: center;
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
    <table style="width:100%">
    <h2> Resultater:
        <tr>
            <th>Fornavn</th>
            <th>Etternavn</th>
            <th>Interesse</th>
        </tr>
        <tr>
            <td>William</td>
            <td>Rastad</td>
            <td>Java</td>
        </tr>
        <tr>
            <td>William</td>
            <td>Rastad</td>
            <td>Java</td>
        </tr>
        <tr>
            <td>William</td>
            <td>Rastad</td>
            <td>Java</td>
        </tr>
        <tr>
            <td>William</td>
            <td>Rastad</td>
            <td>Java</td>
        </tr>
        <tr>
            <td>William</td>
            <td>Rastad</td>
            <td>Java</td>
        </tr>
        <tr>
            <td>William</td>
            <td>Rastad</td>
            <td>Java</td>
        </tr>
    </table>
</div>
</body>
</html>
