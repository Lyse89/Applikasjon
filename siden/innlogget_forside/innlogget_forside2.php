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
    margin: 50px 5% 0 5%;
    padding: 0 2% 0 2%;
    width: 86%;
    background-color: white;
    float: left;
}

.center h2 {
    color: #303030;
    font-size: 25px;
    margin-bottom: 7px;
    padding: 0 0 0 20px;
}


.flex-container {
    width:100%;
    margin: 20px 0 0 0;
    padding-bottom: 25px;
    display: flex;
    flex-wrap: wrap;
    align-items: stretch;
    background-color: white;
    border-top: solid #e9e9e9 3px;

}
.flex-container a{
    color: #303030;

}

.flex-container img {
    width: 100%;
    height: 200px;
    object-fit: cover;

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
    color: #303030;
}

.flex-bildeboks {
    float: left;
    clear: both;
    width:100%;
    margin: 50px 0 0 0;
    padding-bottom: 25px;
    display: flex;
    flex-wrap: wrap;
    align-items: stretch;
    background-color: #aeadad;
    /* border-top: solid #e9e9e9 3px; */

    justify-content: center;
}
.flex-bildeboks a{
    color: #303030;

}

.flex-bildeboks img {
    width: 100%;
    height: 200px;
    object-fit: cover;

    background-color: #dddddd;}

.flex-bildeboks > div {
    /* box-shadow: 10px 10px 8px #c0c0c0; */
    background-color: white;
    color: black;
    width: 350px;
    padding: 15px;
    margin: 15px;
    line-height: 10px;
    font-size: 15px;
}
.flex-bildeboks p {
    line-height: 15px;
    color: #303030;
}

.topp-nyhets-boks {
    border-bottom: solid #9985ad 20px;
	/* #666699 #6699cc #9985ad   */
    background-color: white;
    min-height: 250px;
    width: 100%;
    margin: 0;
    overflow: auto;
}
.topp-nyhets-boks h1{
	padding: 50px 0 0 0;
	margin: 0px 0px 0px 30% ;
	font-size: 25px;
}
.topp-nyhets-boks p{
	line-height:1.5;
	padding: 20px 0 0 0;
	margin: 0px 0px 0px 31% ;

}

/* Brukt for aa fjerne global-meldingsboks
 */
.topp-nyhets-boks {
    display: none;
    visibility: hidden;
}

</style>
</head>

<body>

  <?php
  include('../includes/header_innlogget.php');
  include_once('../includes/rollesjekk.inc.php');
  ?>
<section class ="topp-nyhets-boks">
	<h1>Global melding</h1>
	<p>Et quia saepe et rerum hic suscipit. Sequi eligendi consequuntur delectus. <br>In ipsum praesentium est voluptas laudantium quo. Quisquam et enim<br> aspernatur fuga ea error. Est error enim eos mollitia voluptas et est exercitationem.<br>Sequi est quo nulla qui ipsam fuga magnam.</p>
</section>


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
<!-- <div class="center"> -->
<!-- <h2>Arrangement</h2> -->
<div class="flex-bildeboks">
    <?php

        $stmt = $db->query('SELECT * FROM arrangement ORDER BY startTid DESC LIMIT 4');

        if($stmt->rowCount()){
            while ($row = $stmt->fetch()){

                $beskrivelse = substr($row['Beskrivelse'], 0, 120);
                echo '<div>';

                $bildesti = '<img src=\'' . '../arrangement/bilder/' . $row['arrangementId'] . '.png\' >';
                echo '<a class=\'headerlink\' href=\'../arrangement/arrangement.php?id='. $row['arrangementId'] . '\'' .'><h3>', $row['tittel'],'</h3>'.$bildesti.'</a>';
                
                echo '<p>'.$beskrivelse.'</p>';
                echo '</div>';
            }
        }
    ?>
</div>
<!-- </div> -->
<?php
  include_once('../includes/footer.php');
?>
</body>
</html>
