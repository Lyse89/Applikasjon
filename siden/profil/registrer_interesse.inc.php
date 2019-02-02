
<?php

include_once("../includes/init.php");



$db = new PDO($dsn,$dbBrukernavn,$dbPassord);


$sql = "insert into interesser (idbruker,interesse)";
$sql.= "values (:studentid,:interesse)";


$stmt = $db->prepare($sql);

$stmt->bindParam(':studentid',$bstudentid);
$stmt->bindParam(':interesse',$binteresse);

$bstudentid = '1';
$binteresse = $_POST['interesse'];

$stmt->execute();

?>
