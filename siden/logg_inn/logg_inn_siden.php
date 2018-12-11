<html>
<head>
<meta http-equiv="Content-Language" content="no-bok">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Logg inn</title>
</head>
<body>
<!-- Action maa endres til riktig fil -->
<form method="post" id="form1" action="logg_inn.php">
<h1 align="center">Du må logge inn for å få se den sida!</h1>
	<table border="0" cellpadding="3" cellspacing="0" style="border-collapse: collapse" width="100%" id="table1" bgcolor="#ccFFFF">
		<tr>
			<td width="50%" align="right" style="padding:2 10 2 10;">Bruker:</td>
			<td align="left" valign="top">
        <input type="text" id="Bruker" name="brukernavn" size="20" autofocus></td>
		</tr>
		<tr>
			<td width="50%" align="right" style="padding:2 10 2 10;">Passord:</td>
			<td align="left" valign="top">
        <input type="password" id="Passord" name="passord" size="20"></td>
		</tr>
	</table>
	<p align="center"><input type="submit" value="Logg inn" name="Logginn" id="Logginn"></p>
</form>
<span ID="Melding"><?php echo($Melding); ?></span>
</body>
</html>
