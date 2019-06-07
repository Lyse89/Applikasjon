<?php
// Denne include-siden er utviklet av Simen Lyse siste gang endret 01.06.2019
// Kontrollert og testet av Kristoffer Sorensen, William Rastad, Simen Lyse , siste gang endret 01.06.2019

  ini_set("SMTP","s120.hbv.no");
  ini_set("smtp_port","25");
	date_default_timezone_set("Europe/Oslo");
	$til = $_POST['til'];
	$fra = 'admin@alumni.no';
	$subject = $_POST['subj'];
	$melding = $_POST['meld'];
	$headers = "From: " . $fra . "\r\n" .
				'X-Mailer: PHP/' . phpversion() . "\r\n" .
				"MIME-Version: 1.0\r\n" .
				"Content-Type: text/html; charset=utf-8\r\n" .
				"Content-Transfer-Encoding: 8bit\r\n\r\n";

?>
