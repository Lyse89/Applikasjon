<!-- All kode skrevet av Kristoffer Sorensen 216387-->
<!-- CSS'en skal senere flyttes ut av denne filen -->
<!DOCTYPE html>
<html>
<head>

<title>USN-Alumni</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/style.css">
<meta charset="utf-8">

<style>
body {
    font-family:arial;
    background-color:#ddd;
}
/* Endre navnet paa center */
.center {
    max-width: 1230px;
    background-color: white;
    float: left;
    margin-bottom: 50px;
}

.center h2 {
    font-size: 40px;
    margin-bottom: 7px;
    padding: 0 0 0 20px;
}


.flex-container {
    margin: 30px;
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
    margin: 20px;
    line-height: 10px;
    font-size: 15px;
}
</style>
</head>

<body>

<?php
include_once('header-innlogget.php')
?>

<!-- Denne delen vil senere erstattes med data hentet fra db'en -->
<div class="center">
<h2>Nyheter</h2>
<div class="flex-container">
    <div>
        <h3>Nyhets-overskrift1</h3>
        <p>Some text here, yes indeed some text</p>
        <p>Some text here, yes indeed some text</p>
    </div>
    <div>
        <h3>Nyhets-overskrift2</h3>
        <p>Some text here, yes indeed some text</p>
        <p>Some text here, yes indeed some text</p>
    </div>
    <div>
        <h3>Nyhets-overskrift3</h3>
        <p>Some text here, yes indeed some text</p>
        <p>Some text here, yes indeed some text</p>
    </div>

    <div>
        <h3>Nyhets-overskrift4</h3>
        <p>Some text here, yes indeed some text</p>
        <p>Some text here, yes indeed some text</p>
    </div>
    <div>
        <h3>Nyhets-overskrift5</h3>
        <p>Some text here, yes indeed some text</p>
        <p>Some text here, yes indeed some text</p>
    </div>
    <div>
        <h3>Nyhets-overskrift6</h3>
        <p>Some text here, yes indeed some text</p>
        <p>Some text here, yes indeed some text</p>
    </div>
</div>
</div>

<div class="center">
<h2>Events</h2>
<div class="flex-container">
    <div>
        <h3>Event-overskrift1</h3>
        <img src="something.png" style="width:100%;">
        <p>Some text here, yes indeed some text</p>
        <p>Some text here, yes indeed some text</p>
    </div>
    <div>
        <h3>Event-overskrift2</h3>
        <img src="something.png" style="width:100%;">
        <p>Some text here, yes indeed some text</p>
        <p>Some text here, yes indeed some text</p>
    </div>
    <div>
        <h3>Event-overskrift3</h3>
        <img src="something.png" style="width:100%;">
        <p>Some text here, yes indeed some text</p>
        <p>Some text here, yes indeed some text</p>
    </div>
</div>
</div>

<div class="center">
<h2>Jobber</h2>
<div class="flex-container">
    <div>
        <h3>Jobb-overskrift1</h3>
        <p>Some text here, yes indeed some text</p>
        <p>Some text here, yes indeed some text</p>
    </div>
    <div>
        <h3>Jobb-overskrift2</h3>
        <p>Some text here, yes indeed some text</p>
        <p>Some text here, yes indeed some text</p>
    </div>
    <div>
        <h3>Jobb-overskrift3</h3>
        <p>Some text here, yes indeed some text</p>
        <p>Some text here, yes indeed some text</p>
    </div>
</div>
</div>
</body>
</html>
