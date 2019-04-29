<?php
// Denne include-siden er utviklet av Simen A. Lyse , siste gang endret 24.05.2019
// Denne include-siden er kontrollert av Simen A. Lyse, siste gang 24.05.2019
?>
<style>
input:focus {
  outline: 1px solid #6699ff;
  background-color: lightyellow;
}

</style>
<nav>
<a class="bilde" href="default.php">
  <img class="logo-navHeaderForsiden" src="siden/img/logo.png" alt="Logoen til USN" width="84" height="42">
</a>
  <div class="Loggin">
    <?php
        // Må plassere Form action et annet sted (toppen av defaulth ellernoe)
        if (isset($_SESSION['sessionId'])) {
          echo '<form action="siden/includes/loggut.inc.php" method="POST">
          <button type="submit" name="submit">Logout</button>
          </form>';

        } else {
          echo '<form method="post" id="form1" action="default.php">
                <input class="logginBruker" type="text" id="Bruker" name="brukernavn" placeholder="Brukernavn" autofocus>
                <input class="logginPassord" type="password" id="Passord" name="passord" placeholder="Passord">
                <button type="submit" value="Logg inn" name="Logginn">Login</button><br />
                <div class="sjekk">
                <label class="loggincookie">Forbli innlogget?
                <input type="checkbox" name="forbliInnlogget">
                </label>
                </div>
                </form>';
        }
    ?>
  </div>
</nav>

<?php
// For å få variabelene $salt, $dbBrukernavn, $dbPassord, $dsn
include("siden/includes/init.php");

// Kode for innlogging
$db = new PDO($dsn,"$dbBrukernavn","$dbPassord");

$melding = "";
if (isSet($_POST['Logginn']) and $_POST['Logginn'] == "Logg inn") {

    if ($_POST['brukernavn'] == "" or $_POST['passord'] == "") {
        $melding = "Angi bruker og passord foer du forsoeker aa logge inn.";
    } else {

        if (!$db) {die("Kunne ikke connecte til Databasen");}

        //  PDO prepared metode
        $sql = "select * from bruker where brukerNavn=:br and passord=:po";
        $sth = $db->prepare($sql);

        // Dobbel saltet og hashet passord
        $passord = sha1($salt.sha1($salt.$_POST['passord']));

        $sth->bindValue(':br', $_POST['brukernavn']);
        $sth->bindValue(':po', $passord);
        $sth->execute();
        $res = $sth->fetchAll();

        if ($res) {
            session_start();
            // Denne parameteren (sessionId) skal endres til loggetInn
            $_SESSION['sessionId'] = true;
            $_SESSION['brukernavn'] = $_POST['brukernavn'];

            header("Location: siden/innlogget_forside/innlogget_forside2.php");


        } else {
            // Login Failed
            header("Location: siden/logg_inn/logg_inn_siden.php");
            // $melding = "Innlogging mislykket, prøv igjen";

        }
    }
}

?>
