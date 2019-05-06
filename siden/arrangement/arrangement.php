<?php
include_once('../includes/ikke_logget_inn.inc.php');
include_once('../includes/rollesjekk.inc.php');
include('../includes/logg_inn_db.inc.php');

if(isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
    header("Location:../404.php");
}


// Sjekk for om eventen finnes her ----------------------------------------------------------


    //header("Location:../404.php");
// ------------------------------------------------------------------------------------------

?>
<!-- Denne include-siden er utviklet av Kristoffer Sorensen, siste gang endret 08.03.2019
// Denne include-siden er kontrollert av Kristoffer Sorensen, siste gang 08.03.2019-->
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

        .arrangementBoks {
            box-sizing: border-box;
            width: 70%;
            min-height: 400px;
            overflow: auto;
            padding: 50px 80px 50px 80px;
            margin: 50px 15% 0 15%;
            background-color: white;
        }
		.arrangementBoks h1 {
			padding-bottom: 5px;
			border-bottom: 4px solid lightgrey;
		}
		.arrangementBoks h2 {
			margin-top: 0;
			font-size: 18px;
		}
		.arrangementBoks img {
            margin-bottom: 25px;
            background-color: lightgrey;
            width: 100%;
            height: 200px;
        }
		.arrangementBeskrivelse {
			width: 50%;
			float: left;
			margin: 0 10% 25px 0;
		}
		.arrangementDeltagelse {
			margin: 0 0 25px 0;
            min-height: 200px;
			width: 40%;
			float: right;
		}
		.arrangementInvitasjon {
            clear: right;

		}

    </style>
</head>
<body>
    <?php
    include_once('../includes/header_innlogget.php');

    $stmt = $db->query('SELECT * FROM arrangement WHERE arrangementid =\''. $id . '\';');
    if($stmt->rowCount()){
        while ($row = $stmt->fetch()){
            $beskrivelse = $row['Beskrivelse'];
            $tittel = $row['tittel'];
        }
    }


    ?>
    <div class="arrangementBoks">
		<h1><?php echo $tittel; ?></h1>

		<div class="arrangementBeskrivelse">
            <img>
			<h2>Detaljer</h2>
            <p><?php echo $beskrivelse; ?></p>

            <?php 
            echo '<form action="settDeltagelse.inc.php" method="POST">
			<input type="hidden" name="brukernavn" value="' . $_SESSION['brukernavn'] .'">
			<input type="hidden" name="arrangementid" value="'. $id .'">
            <button type="submit" name="submit">Delta</button>
            </form>';
            ?>

		</div>
		<div class="arrangementDeltagelse">
			<h2>Skal</h2>

            <?php
            // Finner brukere som er satt til aa delta paa prosjektet
            $stmt2 = $db->query('select a.*, b.fornavn, b.etternavn from arrangementDeltagelse as a,'.
                                'bruker as b where arrangementId = ' . $id . ' and a.deltager = b.brukerNavn;');
            
            //$stmt2 = $db->query('select a.*, b.fornavn, b.etternavn from arrangementDeltagelse as a,'.
            //                    'bruker as b where arrangementId = '. $id .'and a.deltager = b.brukerNavn;');
            if($stmt2->rowCount()){
                while ($row2 = $stmt2->fetch()){
                    $fornavn = $row2['fornavn'];
                    $etternavn = $row2['etternavn'];
                    $brukernavn = $row2['deltager'];

                    echo '<p><a href=\'../profil/bruker.php?id='. $brukernavn . '\'>' . $fornavn . ' ' . $etternavn . '</a></p>';
                }
            }
            ?>

		</div>
        <div class = "arrangementInvitasjon">
            <h2>Inviter til arrangementet</h2>
            <input type="text" name="" id="" placeholder="Søk på navn">
        </div>
    </div>

    <?php
    include('../kommentarfelt/kommentarer.php');
    ?>
  </body>
</html>
