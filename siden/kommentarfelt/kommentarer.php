<!-- Denne siden er utviklet av Kristoffer Sorensen, siste gang endret 02.10.2018-->

<form class="nyKommentarBoks" action="../kommentarfelt/leggTilKommentar.php" method="POST">
    <label for="nyKommentar">Skriv en ny kommentar</label>
    <?php echo '<input type="hidden" name="arrangementId" value="' . $id .'">'; ?>
    <?php echo '<input type="hidden" name="brukernavn" value="' . $_SESSION['brukernavn'] . '">' ?>
    <textarea name="kommentar" placeholder="Kommentar"></textarea>
    <input type="submit" name="submit" id="leggTilKommentarKnapp" value="Legg til">
</form>

<?php 
// hentes fra db
$stmt = $db->query('SELECT kommentarid, kommentar, tid, kommentar.brukernavn, bruker.fornavn, bruker.etternavn, bruker.bilde FROM kommentar, bruker WHERE arrangementId = \'' . $id . '\' AND kommentar.brukernavn = bruker.brukerNavn ORDER BY tid DESC;');

if($stmt->rowCount()){
    while ($row = $stmt->fetch()){
        echo '<div class="KommentarContainer">';
            echo '<div class="Kommentar">';

                echo '<div class="KommentarBildeBoks">';
                    echo '<img src="' . $row['bilde'] . '" alt="profil-bilde" width="100px">';
                echo '</div>';

                echo '<div class="KommentarTekst">';
                    echo '<ol>';
                        echo '<li class="kommentarNavn"><h3>' . $row['fornavn']. ' ' .$row['etternavn'] . '</h3><li>';
                        echo '<li class="kommentarDato">' . $row['tid'] . '<li>';
                    echo '</ol>';

                    echo '<p>' . $row['kommentar'] . '</p>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
}
?>
