<?php
include_once('../includes/ikke_logget_inn.inc.php');
include_once('../includes/rollesjekk.inc.php');
if(isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
    header("Location:../404.php");
}

include('../includes/logg_inn_db.inc.php');

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
    ?>
    <div class="arrangementBoks">
		<h1>Tittel for arrangement</h1>

		<div class="arrangementBeskrivelse">
            <img>
			<h2>Detaljer</h2>
			<p>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
			non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
			<input type="button" value="Delta">
		</div>
		<div class="arrangementDeltagelse">
			<h2>Skal</h2>
			<p>Fornavn Etternavn</p>
			<p>Fornavn Etternavn</p>
			<p>Fornavn Etternavn</p>
			<p>Fornavn Etternavn</p>


		</div>
        <div class = "arrangementInvitasjon">
            <h2>Inviter til arrangementet</h2>
            <input type="text" name="" id="" placeholder="Søk på navn">
        </div>
    </div>

    <?php
    include('../includes/kommentarer.php');
    ?>
  </body>
</html>
