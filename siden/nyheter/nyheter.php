<?php
//Denne include-siden er utviklet av Kristoffer Sorensen, siste gang endret 30.04.2019
// Denne include-siden er kontrollert av Kristoffer Sorensen, siste gang 30.04.2019
include_once('../includes/ikke_logget_inn.inc.php');
include_once('../includes/rollesjekk.inc.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <head>
    <meta charset="utf-8">
    <title>Instillinger</title>
  </head>
  <style media="screen">
    body {
      margin: 0;
      padding: 0;
      background-color: #ddd;
    }
    h2{
        font-size: 18px;

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

    .flex-container {
        width:100%;
        margin: 30px 0 30px 0;
        padding-bottom: 25px;
        display: flex;
        flex-wrap: wrap;
        align-items: stretch;
        background-color: white;
        border-top: solid grey 3px;
    }

    .flex-container img {
        height: 200px;
        background-color: #dddddd;
    }

    .instillinger-boks {
        width: 260px;
        padding: 30px;
    }
    .instillinger-boks {

    }

</style>

<body>
<?php
include_once('../includes/header_innlogget.php');
?>

<div class="center">
    <h1>Alle nyheter</h1>
    <div class="flex-container">

    </div>
</body>
</html>
