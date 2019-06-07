<?php

// Denne include-siden er utviklet av Simen Lyse siste gang endret 01.06.2019
// Kontrollert og testet av Kristoffer Sorensen, William Rastad, Simen Lyse , siste gang endret 01.06.2019

if(isset($_POST['btnRegel'])) {

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
  fwrite($handle,"<html>\n\t<head><title>Regler</title></head>");
  fwrite($handle,"\t<body><p>1. $regel0 </p> \n");
  fwrite($handle,"\t<p>2. $regel1 </p> \n");
  fwrite($handle,"\t<p>3. $regel2 </p> \n");
  fwrite($handle,"\t<p>4. $regel3 </p> \n");
  fwrite($handle,"\t<p>5. $regel4 </p> \n");
  fwrite($handle,"\t<p>6. $regel5 </p> \n");
  fwrite($handle,"\t<p>7. $regel6 </p> \n");
  fwrite($handle,"\t<p>8. $regel7 </p> \n");
  fwrite($handle,"\t<p>9. $regel8 </p> \n");
  fwrite($handle,"\t<p>10. $regel9 </p> \n");
  fwrite($handle,"\t</body></html>");
  fclose($handle);


  header("Location: admin_hovedside.php");
}
?>
