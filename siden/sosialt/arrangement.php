<!-- Denne include-siden er utviklet av Simen A. Lyse , siste gang endret 14.12.2018
// Denne include-siden er kontrollert av Simen A. Lyse, siste gang 14.12.2018 -->
<!DOCTYPE html>
<html lang="no" dir="ltr">
<head>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/kommentarer.css">
    <meta charset="utf-8">
    <title>Sosialt</title>

    <style>

        body {
            margin: 0;
            padding: 0;
            background-color: #ddd;
            font-family: arial;
        }

        .ArrangementBoks {
            box-sizing: border-box;
            width: 70%;
            height: 500px;
            overflow: auto;
            padding: 50px 80px 50px 80px;
            margin: 50px 15% 50px 15%;
            background-color: white;
        }
    </style>
</head>
<body>
    <?php
    include_once('../includes/ikke_logget_inn.inc.php');
    include_once('../includes/header_innlogget.php');
    ?>

    <div class="ArrangementBoks">
    <h1>Tittel for arrangement</h1>
    </div>

    <?php
    include('../includes/kommentarer.php');
    ?>
  </body>
</html>
