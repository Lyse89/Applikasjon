<?php

  $regel0 = $_POST['regel0'];
  $regel1 = $_POST['regel1'];
  $regel2 = $_POST['regel2'];
  $regel3 = $_POST['regel3'];
  $regel4 = $_POST['regel4'];
  $regel5 = $_POST['regel5'];
  $regel6 = $_POST['regel6'];
  $regel7 = $_POST['regel7'];
  $regel8 = $_POST['regel8'];
  $regel9 = $_POST['regel9'];



  $handle = fopen("../regler/regler.html",'w');
  fwrite($handle,"<html><head><title>Regler</title></head>");
  fwrite($handle,"<body><p>1. ", "'$regel0';", "</p>");
  fwrite($handle,"<p>2." , "'$regel1';", "</p>");
  fwrite($handle,"<p>3." , "'$regel2';", "</p>");
  fwrite($handle,"<p>4." , "'$regel3';", "</p>");
  fwrite($handle,"<p>5." , "'$regel4';", "</p>");
  fwrite($handle,"<p>6." , "'$regel5';", "</p>");
  fwrite($handle,"<p>7." , "'$regel6';", "</p>");
  fwrite($handle,"<p>8." , "'$regel7';", "</p>");
  fwrite($handle,"<p>9." , "'$regel8';", "</p>");
  fwrite($handle,"<p>10." ,"'$regel9';", "</p>");
  fwrite($handle,"</body></html>");
  fclose($handle);


  header("Location: admin_hovedside.php");
?>
