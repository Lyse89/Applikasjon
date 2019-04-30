<?php
//Denne siden er utviklet av Kristoffer Sorensen, siste gang endret 14.12.2018
//Denne include-siden er kontrollert av William, siste gang 14.12.2018
//
//CSS'en skal senere flyttes ut av denne filen
include('../includes/ikke_logget_inn.inc.php');
include('../includes/logg_inn_db.inc.php');

?>
<!DOCTYPE html>
<html>
<head>
<title>USN-Alumni</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/generell.css">
<meta charset="utf-8">

<style>
body {
    font-family:arial;
    background-color:#ddd;
}


/* Endre navnet paa center */
.center {
    box-shadow: 10px 10px 8px #c0c0c0;
    margin: 0 5% 50px 5%;
    padding: 0 2% 0 2%;
    width: 86%;
    /*max-width: 1230px;*/
    background-color: white;
    float: left;
    /*margin-bottom: 50px;*/
}

.center h2 {
    font-size: 40px;
    margin-bottom: 7px;
    padding: 0 0 0 20px;
}


.flex-container {
    width:100%;
    margin: 30px 0 0 0;
    padding-bottom: 25px;
    display: flex;
    flex-wrap: wrap;
    align-items: stretch;
    background-color: white;
    border-top: solid grey 3px;
}

.flex-container img {
    height: 200px;
    background-color: #dddddd;}

.flex-container > div {
    background-color: white;
    color: black;
    width: 350px;
    margin: 25px;
    line-height: 10px;
    font-size: 15px;
}
.flex-container p {
    line-height: 15px;
}

.topp-nyhets-boks {
    border-bottom: solid #9985ad 20px;
	/* #666699 #6699cc #9985ad   */
    background-color: white;
    height: 300px;
    width: 100%;
    margin: 0 0 50px 0;
}
.topp-nyhets-boks h1{
	padding: 50px 0 0 0;
	margin: 0px 0px 0px 30% ;
	font-size: 45px;
}
.topp-nyhets-boks p{
	line-height:1.5;
	padding: 20px 0 0 0;
	margin: 0px 0px 0px 31% ;

}
/*footer {
	margin: 50px 0 0 0;
	float: left;
	height: 300px;
	width: 100%;
	background-color: #aaaaaa;
*/
}
</style>
</head>

<body>

  <?php
  include('../includes/header_innlogget.php');
  ?>
<div class ="topp-nyhets-boks">
	<h1>Lorem Ipsum</h1>
	<p>Et quia saepe et rerum hic suscipit. Sequi eligendi consequuntur delectus. <br>In ipsum praesentium est voluptas laudantium quo. Quisquam et enim<br> aspernatur fuga ea error. Est error enim eos mollitia voluptas et est exercitationem.<br>Sequi est quo nulla qui ipsam fuga magnam.</p>
</div>

<!-- Denne delen vil senere erstattes med data hentet fra db'en -->
<div class="center">
<h2>Nyheter</h2>
<div class="flex-container">
    <?php

        $stmt = $db->query('SELECT * FROM nyheter ORDER BY lagtTil DESC LIMIT 4');

        if($stmt->rowCount()){
            while ($row = $stmt->fetch()){

                $beskrivelse = substr($row['beskrivelse'], 0, 120);
                echo '<div>';
                echo '<a class=\'headerlink\' href=\'../nyheter/nyhet.php?id='. $row['nyhetsid'] . '\'' .'><h3>', $row['tittel'],'</h3></a>';
                echo '<p>'.$beskrivelse.'</p>';
                echo '</div>';
            }
        }
    ?>
</div>
</div>


<div class="center">
<h2>Arrangement</h2>
<div class="flex-container">
    <?php

        $stmt = $db->query('SELECT * FROM arrangement ORDER BY startTid DESC LIMIT 4');

        if($stmt->rowCount()){
            while ($row = $stmt->fetch()){

                $beskrivelse = substr($row['Beskrivelse'], 0, 120);
                echo '<div>';
                echo '<a class=\'headerlink\' href=\'../sosialt/arrangement.php?id='. $row['arrangementId'] . '\'' .'><h3>', $row['tittel'],'</h3></a>';

                echo '<img src="something.png" style="width:100%;">';
                echo '<p>'.$beskrivelse.'</p>';
                echo '</div>';
            }
        }
    ?>
</div>
</div>

<div class="center">
<h2>Jobber</h2>
<div class="flex-container">
    <?php

        $stmt = $db->query('SELECT * FROM jobbAnnonse ORDER BY lagtTil DESC LIMIT 4');

        if($stmt->rowCount()){
            while ($row = $stmt->fetch()){

                $beskrivelse = substr($row['beskrivelse'], 0, 120);
                echo '<div>';
                echo '<a class=\'headerlink\' href=\'../jobber/jobbannonse.php?id='. $row['annonseid'] . '\'' .'><h3>', $row['tittel'],'</h3></a>';
                echo '<p>'.$beskrivelse.'</p>';
                echo '</div>';
            }
        }
    ?>
</div>
</div>
</body>
<?php
  include_once('../includes/footer.php');
?>
</html>
