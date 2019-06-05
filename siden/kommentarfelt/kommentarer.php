<!-- Denne siden er utviklet av Kristoffer Sorensen, siste gang endret 02.10.2018-->
<form class="nyKommentarBoks" action="../kommentarfelt/leggTilKommentar.php" method="POST">
    <label for="nyKommentar">Skriv en ny kommentar</label>
    <input type="hidden" name="brukernavn" value="<?php$_SESSION['brukernavn'] ?>">
    <input type="hidden" name="brukernavn" value="<?php$_SESSION['brukernavn'] ?>">
    <textarea name="nyKommentar">Tekst...</textarea>
    <button type="submit" name="submit">Legg til</button>
</form>

<div class="KommentarContainer">
    <div class="Kommentar">

		<div class="KommentarBildeBoks">
			<img src="img/profile-icon.png" alt="profil-bilde" width="100px">
		</div>

        <div class="KommentarTekst">
            <ol>
                <li class="kommentarNavn"><h3>Fornavn Etternavn</h3><li>
                <li class="kommentarDato">2018-09-28<li>
            </ol>

			<!-- Her må det finnes ut en losning for hvordan det blir med tekst i databasen -->
			<p>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
			non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
        </div>
    </div>
</div>

<div class="KommentarContainer">
    <div class="Kommentar">

		<div class="KommentarBildeBoks">
			<img src="img/profile-icon.png" alt="profil-bilde" width="100px">
		</div>

        <div class="KommentarTekst">
            <ol>
                <li class="kommentarNavn"><h3>Fornavn Etternavn</h3><li>
                <li class="kommentarDato">2018-09-28<li>
            </ol>

			<!-- Her må det finnes ut en losning for hvordan det blir med tekst i databasen -->
			<p>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
			non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
        </div>
    </div>
</div>
