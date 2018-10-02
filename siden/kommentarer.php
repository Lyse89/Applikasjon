<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <style>
            body {
                margin: 0;
                padding: 0;
                background-color: #ddd;
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

        </style>
    </head>
    <body>
        
        <div class="nyKommentarBoks">
            <label for="nyKommentar">Skriv en ny kommentar</label>
            <textarea name="nyKommentar">Tekst...</textarea>
            <button type="submit">Legg til</button>
        </div>

        <div class="Kommentar">
        </div>
    </body>
</html>
