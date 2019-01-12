<!-- Denne include-siden er utviklet av Simen A. Lyse og Kristoffer Sorensen , siste gang endret 14.12.2018
// Denne include-siden er kontrollert av Simen A. Lyse, siste gang 12.01.2019 -->

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
          echo '<form method="post" id="form1" action="logg_inn_siden.php">
                <input type="text" id="Bruker" name="br" placeholder="Brukernavn" autofocus>
                <input type="password" id="Passord" name="po" placeholder="Passord">
                <button type="submit">Login</button><br />
                <label class="loggincookie">Forbli innlogget?
                <input type="checkbox" checked="checked">
                <span class="sjekkmerke"></span>
                </label>
                </form>';
        }
    ?>
  </div>
</nav>
