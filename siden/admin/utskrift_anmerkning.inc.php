<!DOCTYPE HTML>
<html>
<!-- Denne include-siden er utviklet av William Rastad, siste gang endret 01.06.2019 -->
<head>
	<title>Utskrift anmerkning</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta charset="utf-8">
    <style>
        h1, h2{
            text-align: center;

        }
        /* Søk resultat */
        table {
            table-layout: fixed;
            width: 100%;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            word-wrap: break-word;
            overflow-wrap: break-word;

        }
        th, td {
            padding: 5px;
            text-align: left;
        }
        .SøkResultater {
            width: 98%;
            margin:1% 1% 1% 1%;
            background-color:;
            text-align: center;
        }
        input[type="submit"]{
            margin-left: 1%;
            padding: 5px 5px 5px 5px;
            width: 10%;
        }
    </style>
</head>


<body>
<?php
include('../includes/ikke_logget_inn.inc.php');
include('../includes/adminsjekk.inc.php');
include_once('../includes/rollesjekk.inc.php');
include_once('../includes/header_innlogget.php');
include_once("../includes/init.php");
?>
<h1>Anmerkninger for en bruker</h1>
<h2>Sortert etter brukernavn og dato</h2>

<?php
$db = new PDO($dsn,$dbBrukernavn,$dbPassord);
$brukernavn = $_POST['BrukerNavnUtskriftAnmerkning'];

$sql = ("SELECT * FROM anmerkning WHERE brukerNavn = :brukernavn GROUP BY brukerNavn DESC, tid DESC;");
// Prepared statemens
$stmt = $db->prepare($sql);
$stmt->bindParam(':brukernavn',$bbrukernavn);

// Henter verdier
$bbrukernavn = $brukernavn;

// Kjører sql query
$stmt->execute();


$stmt->rowCount();
    echo "<div class='SøkResultater'>";
    echo "<table width=100%>";
    echo "<tr><td><b>Brukernavn</b></td><td><b>Hvem ga anmerkningen</b></td><td><b>Dato</b></td><td><b>Forklaring</b></td></tr>";
    while ($row = $stmt->fetch())
    {
        echo "<tr><td>{$row['brukerNavn']}</td><td>{$row['gittAv']}</td><td>{$row['tid']}</td><td>{$row['forklaring']}</td></tr>";
    }
    echo "</table>";
    echo "</div>";

?>
<form action="admin_hovedside.php">
    <input type="submit" value="Tilbake til Admin hovedsiden" />
</form>
</body>
</html>
