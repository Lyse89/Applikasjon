<!-- Denne include-siden er utviklet av Simen A. Lyse , siste gang endret 09.12.2018
// Denne include-siden er kontrollert av Simen A. Lyse, siste gang 10.12.2018 -->
<nav>
  <img class="logo-navHeaderForsiden" src="img/logo.png" alt="Logoen til USN" width="84" height="42">
  <div class="Loggin">
    <?php
    if (isset($_SESSION['u_id'])) {
      echo '<form action="include/logout.inc.php" method="POST">
      <button type="submit" name="submit">Logout</button>
      </form>';
    } else {
      echo '<button type="submit">Login</button>';
    }
    ?>
  </div>
</nav>
