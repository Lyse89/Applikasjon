<html>
<!-- Denne siden er utviklet av William Rastad, siste gang endret 14.12.2018 -->
<!-- Denne siden er kontrollert av William Rastad, siste gang 14.12.2018 -->
<head>
<meta http-equiv="Content-Language" content="no-bok">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Logg inn</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<style>
input[type=password], input[type=text]{
	width: 20%;
	padding: 10px;
	margin: 4px 0px 10px 10px;
	display: inline-block;
	border: 1;
	background: #f1f1f1;
}
</style>
</head>


<body>
<nav>
	<a class="bilde" href="../default.php">
	  <img class="logo-navHeaderForsiden" src="../img/logo.png" alt="Logoen til USN" width="84" height="42">
	</a>
</nav>

<!-- Action post log_inn.php-->
<form method="post" id="form1" action="logg_inn.php">
<h1 align="center">Logg inn her</h1>
	<table border="0" cellpadding="3" cellspacing="0" style="border-collapse: collapse" width="100%" id="table1">
		<tr>
			<td align="center" valign="top">
        <input type="text" id="Bruker" name="brukernavn" placeholder="Brukernavn" autofocus></td>
		</tr>

		<tr>
			<td align="center" valign="top">
        <input type="password" id="Passord" name="passord" placeholder="Passord"></td>
		</tr>
	</table>
	<p align="center"><input type="submit" value="Logg inn" name="Logginn" id="Logginn"></p>
</form>
<span ID="Melding"><?php echo($Melding); ?></span>
</body>
</html>
