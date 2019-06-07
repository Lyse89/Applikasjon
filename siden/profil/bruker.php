<?php
// Denne include-siden er utviklet av Kristoffer Sorensen siste gang endret 01.06.2019
// Kontrollert og testet av Kristoffer Sorensen, William Rastad, Simen Lyse , siste gang endret 01.06.2019
include_once('../includes/ikke_logget_inn.inc.php');
include_once('../includes/init.php');

if(isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
    header('Location: ../404.php');
}
?>
<!DOCTYPE html>
<html>
<!-- Denne siden er utviklet av William Rastad, siste gang endret 06.02.2019 -->

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta charset="utf-8">
    <title>Min Profil</title>

    <style>
    /*Min Profil Box*/
    #MinProfil{
        margin-top: 3%;
        margin-left: 20%;
        margin-right: 20%;
        width:60%;
        text-align: center;
    }
    /*ProfilBilde Box*/
    #MinProfil .Profilbilde{
        width: 38%;
        margin-right: 2%;
        float:left;
        text-align: right;
    }

    .Profilbilde img {
        width: 250px;
        height: 250px;
        object-fit: cover;

    }

    /*Bio Box*/
    #MinProfil .Bio{
        width:60%;
        float:left;
        text-align: center;
    }
    /*Bio Tekst Box*/
    #MinProfil .biotekst{
        width: 100%;
        text-align: left;
        font-size: 13px;
    }
    /* studie*/

    /*Interesser Box*/
    #MinProfil .Interesser, .StudieSection{
        margin-top: 3%;
        width: 99%;
        float:left;
        text-align: center;
        border-style: ridge;
    }

    #MinProfil .Interessernr, .StudieDiv{
        margin-left: 21%;
        width: 60%;
        text-align: left;
        font-size: 13px;
    }

    /*Legge til ny interesse box*/
    #MinProfil .Leggtilnyinteresse{
        margin-top: 3%;
        width: 99%;
        float:left;
        text-align: center;
        border-style: ridge;
    }
    /*Legge til ny interesse styling*/
    input[type=text]{
        width: 50%;
        padding: 10px;
        margin: 5px 0px 22px 22px;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }
    input[type="submit"]{
        background: #f1f1f1;
        font-size: 17px;
        border: none;
        cursor: pointer;
        margin-bottom: 1%;
    }

    /*Event box*/
    #MinProfil .Events{
        margin-top: 3%;
        width: 99%;
        float:left;
        text-align: center;
        border-style: ridge;
    }
	.flex-bildeboks {
        text-align: left;
	    float: left;
	    clear: both;
	    width:100%;
	    margin: 50px 0 0 0;
	    padding-bottom: 25px;
	    display: flex;
	    flex-wrap: wrap;
	    align-items: stretch;
	    /* border-top: solid #e9e9e9 3px; */

	    justify-content: center;
	}
	.flex-bildeboks a{
        text-align: center;
        text-decoration: none;
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

    /* Responsiv */
    @media (min-width: 769px) and (max-width: 1080px) {
        #MinProfil .Profilbilde,
        #MinProfil .Bio,
        #MinProfil .biotekst{
            width: 100%;
            text-align: center;

        }
    }
    @media (min-width: 320px) and (max-width: 768px) {
        #MinProfil .Profilbilde,
        #MinProfil .Bio,
        #MinProfil .biotekst{
            width:100%;
            text-align: center;
        }
    }

    </style>
</head>

<body>
    <?php
    include_once('../includes/header_innlogget.php');
    include_once('../includes/rollesjekk.inc.php');
    ?>

    <article id="MinProfil">
        <?php
        $db = new PDO($dsn,"$dbBrukernavn","$dbPassord");
        $stmt = $db->query("SELECT fornavn, etternavn, bilde FROM bruker WHERE brukerNavn LIKE '$id'");

        if($stmt->rowCount()){
            while ($row = $stmt->fetch()){
                echo "<h1>{$row['fornavn']} {$row['etternavn']}</h1>";
                $bildesti = $row['bilde'];
            }
        }
        ?>

        <section class="Profilbilde">
            <br>
        <?php
            echo '<img src="' . $bildesti .'">';
        ?>
        </section>

        <section class="Bio">
            <div class="biotekst">
                <?php
                $db = new PDO($dsn,"$dbBrukernavn","$dbPassord");
                $stmt = $db->query("SELECT bio FROM bio WHERE brukerNavn = '$id'");
                echo "<h2>";
                if($stmt->rowCount()){
                    echo "<br>";

                    $count = 0;
                    while ($row = $stmt->fetch())
                    {
                        echo $row['bio'];
                    }
                }
                ?>
            </div>
        </section>
        <section class="StudieSection">
            <div class="StudieDiv">
                <?php
                $db = new PDO($dsn,"$dbBrukernavn","$dbPassord");
                $stmt = $db->query("SELECT studier.studie FROM studier INNER JOIN studiekobling ON studiekobling.studie = studier.studie AND studiekobling.brukernavn = '$id'");
                echo "<h2> Studie: ";
                if($stmt->rowCount()){
                    $count=0;
                    while ($row = $stmt->fetch())
                    {
                        echo $row['studie'];
                        if ($count <= 39 ) {
                            echo ", ";
                        }
                        if ($count == 5 OR $count == 10 OR $count == 15 OR
                            $count == 20 OR $count == 25 OR $count == 30 OR
                            $count == 35 OR $count == 40){
                            echo "<br>";
                        }
                        if ($count >= 40) {
                            break;
                        }
                    }
                }
                ?>
            </div>
        </section>
        <section class="Interesser">
            <div class="Interessernr">
            <?php
            $db = new PDO($dsn,"$dbBrukernavn","$dbPassord");
            $stmt = $db->query("SELECT interesser.interesse FROM interesser INNER JOIN interessekobling ON interessekobling.interesse = interesser.interesse AND interessekobling.brukernavn = '$id'");
            echo "<h2> Interesser:";
            if($stmt->rowCount()){
                echo "<br>";

                $count = 0;
                while ($row = $stmt->fetch())
                {
                    $count ++;
                    echo $row['interesse'];
                    if ($count <= 39 ) {
                        echo ", ";
                    }
                    if ($count == 5 OR $count == 10 OR $count == 15 OR $count == 20 OR $count == 25 OR $count == 30 OR $count == 35 OR $count == 40){
                        echo "<br>";
                    }
                    if ($count >= 40) {
                        break;
                    }
                }
            }
            ?>
            </div>
        </section>
		<section class="flex-bildeboks">
            <?php
				echo "<h2 style='width: 100%; text-align:center;'>arrangementer</h2>";
                $stmt = $db->query("SELECT * FROM arrangement JOIN arrangementDeltagelse ON arrangement.arrangementId = arrangementDeltagelse.arrangementId AND arrangementDeltagelse.deltager = '$id' ORDER BY startTid DESC LIMIT 3;");

                if($stmt->rowCount()){
                    while ($row = $stmt->fetch()){

                        $beskrivelse = substr($row['Beskrivelse'], 0, 120);
                        echo '<div>';

                        $bildesti = '<img src=\'' . '../arrangement/bilder/' . $row['bilde'] . '\' >';
                        echo '<a class=\'headerlink\' href=\'../arrangement/arrangement.php?id='. $row['arrangementId'] . '\'' .'><h3>', $row['tittel'],'</h3>'.$bildesti.'</a>';

                        echo '<p>'.$beskrivelse.'</p>';
                        echo '</div>';
                    }
                }
            ?>
        </section>
    </article>
		<?php
		  include_once('../includes/footer.php');
		?>

</body>

</html>
