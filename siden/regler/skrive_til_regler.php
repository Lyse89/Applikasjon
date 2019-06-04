<?php
$handle = fopen("regler.html",'w');
fwrite($handle,"<html><head><title>Tatt imot!</title></head>");
fwrite($handle,"<body>Denne fil er produsert fra en php fil:");
fwrite($handle,"</body></html>");
fclose($handle); ?>
