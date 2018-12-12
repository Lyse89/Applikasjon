<!-- Denne include-siden er utviklet av Simen A. Lyse , siste gang endret 09.12.2018
// Denne include-siden er kontrollert av Simen A. Lyse, siste gang 12.12.2018 -->
<nav>
  <img class="logo-navHeaderForsiden" src="img/logo.png" alt="Logoen til USN" width="84" height="42">
  <div class="Loggin">
    <?php
        // Må plassere Form action et annet sted (toppen av defaulth ellernoe)
        if (isset($_SESSION['sessionId'])) {
          echo '<form action="/app/siden/includes/loggut.inc.php" method="POST">
          <button type="submit" name="submit">Logout</button>
          </form>';

        } else {
          echo '<form action="/app/siden/logg_inn/logg_inn_siden.php">
                <button type="submit">Login</button>
                </form>';
        }
    ?>
  </div>
</nav>
