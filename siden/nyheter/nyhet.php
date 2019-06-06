<?php
//Denne include-siden er utviklet av Kristoffer Sorensen, siste gang endret 30.04.2019
// Denne include-siden er kontrollert av Kristoffer Sorensen, siste gang 30.04.2019
include_once('../includes/ikke_logget_inn.inc.php');
include('../includes/logg_inn_db.inc.php');
include_once('../includes/rollesjekk.inc.php');

if(isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
    header("Location:../404.php");
}
?>

<!DOCTYPE html>
<html lang="en" >
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
    .nyhetSeksjon {
        max-width: 1080px;
        background-color: white;
        margin-top: 50px;
        padding: 0 50px 70px 50px;
    }
    .flex-boks {
        display: flex;
        justify-content: center;
    }
    .flex-boks > article{
        background-color: white;
        width: 70%;
        padding: 20px;
        line-height: 10px;
    }
    article h1 {font-size: 30px;}

</style>

<body>
<?php
    include_once('../includes/header_innlogget.php');
?>

<section class="flex-boks">
<?php

    $stmt = $db->query('SELECT * FROM nyheter WHERE nyhetsid = \''. $id . '\';');

        if($stmt->rowCount()){
        while ($row = $stmt->fetch()){
            echo '<section class = "nyhetSeksjon">';
            echo '<article>';
            echo '<h1>' . $row['tittel'] . '</h1>';
            echo '<p>' . $row['beskrivelse'] . '</p>';
            echo '</article>';
            echo '</section>';
        }
    }
?>
</section>

<?php
  include_once('../includes/footer.php');
?>

</body>
</html>
