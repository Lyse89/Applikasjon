<!DOCTYPE HTML>
<html>
<head>
	<title>Regler</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta charset="utf-8">
	<style>
    </style>
</head>


<body>
<?php
  include_once('../includes/header_innlogget.php');
  include_once('../includes/ikke_logget_inn.inc.php');
  include_once('../includes/rollesjekk.inc.php');
?>

<?php
include_once("../includes/init.php");
$db = new PDO($dsn,"$dbBrukernavn","$dbPassord");
$stmt = $db->query("SELECT bruker.brukerNavn, COUNT(anmerkning.brukerNavn) AS AntallAnmerkninger
FROM anmerkning, bruker
WHERE anmerkning.brukerNavn = bruker.brukerNavn
GROUP BY brukerNavn;");

$stmt->rowCount();
    echo "<table width=100%>";
    echo "<h2> Anmerkninger: </h2>";


    while ($row = $stmt->fetch())
    {
        echo "<tr><td>{$row['brukerNavn']}</td><td>{$row['AntallAnmerkninger']}</tr>";
    }
    echo "</table>";
?>

</body>

</html>
