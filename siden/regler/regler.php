<?php
  include_once('../includes/ikke_logget_inn.inc.php');
?>
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
?>

<?php
include_once("../includes/init.php");
$db = new PDO($dsn,"$dbBrukernavn","$dbPassord");
$stmt = $db->query("SELECT * FROM regler");

$stmt->rowCount();
    echo "<table width=100%>";
    echo "<h2> Regler: </h2>";


    while ($row = $stmt->fetch())
    {
        echo "<tr><td>{$row['regelnr']}</td><td>{$row['tekst']}</tr>";
    }
    echo "</table>";
?>

</body>

</html>
