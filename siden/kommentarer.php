<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <style>
            body {
                margin: 0;
                padding: 0;
                background-color: #ddd;
                font-family: arial;
            }

            .nyKommentarBoks {
                width: 80%;
                height: auto;
                overflow: auto;
                margin: 0% 10% 0% 10%;
                background-color: white;
            }

            .nyKommentarBoks label {
                display: block;                
                margin: 20px 0 10px 10%;
            }

            .nyKommentarBoks textarea{
                min-width: 78%;
                max-width: 78%;
                min-height: 50px;
                /* float:left; */
                margin: 0% 10% 0% 10%;
            }

            .nyKommentarBoks button {
                margin: 10px 12% 40px 0;
                clear: both;
                float: right;
            }
/* ##################################################################### */

            .KommentarContainer {
                margin: 30px 20% 20px 20%;
                background-color: white;
                overflow: auto;
            }
            .KommentarTekst {
                margin-left: 30px;
                float:left;
            }
            .Kommentar {
                margin: 20px 50px 30px 50px;
                overflow: auto;
            }
            .Kommentar img {
                float: left;
            }

            .Kommentar ol {
                margin: 0 0 0 0;
                padding: 0 0 0 0;
                list-style-type: none; 
            }

            .Kommentar ol li{
                display: inline-block;
                padding: 0 10px 0 0;
                
            }

        </style>
    </head>
    <body>
        
        <div class="nyKommentarBoks">
            <label for="nyKommentar">Skriv en ny kommentar</label>
            <textarea name="nyKommentar">Tekst...</textarea>
            <button type="submit">Legg til</button>
        </div>

        <div class="KommentarContainer">
            <div class="Kommentar">
                <img src="img/profile-icon.png" alt="profil-bilde" width="100px">
                <div class="KommentarTekst">
                    <ol>
                        <li class="kommentarNavn">Kristoffer Sorensen<li>
                        <li class="kommentarDato">2018-09-28<li>
                    </ol>
<pre>
Her er en preformatert kommentar.
Her er en preformatert kommentar.
Her er en preformatert kommentar.
Her er en preformatert kommentar.
Her er en preformatert kommentar.
Her er en preformatert kommentar.
</pre>
                </div>
            </div>
        </div>
        <div class="KommentarContainer">
            <div class="Kommentar">
                <img src="img/profile-icon.png" alt="profil-bilde" width="100px">
                <div class="KommentarTekst">
                    <ol>
                        <li class="kommentarNavn">Kristoffer Sorensen<li>
                        <li class="kommentarDato">2018-09-28<li>
                    </ol>
<pre>
Her er en preformatert kommentar.
Her er en preformatert kommentar.
Her er en preformatert kommentar.
Her er en preformatert kommentar.
</pre>
                </div>
            </div>
        </div>

    </body>
</html>
