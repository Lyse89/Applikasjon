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

            .Kommentar {
                width: 80%;
                height: auto;
                overflow: auto;
                margin: 0% 10% 0% 10%;
                background-color: white;
            }

            .Kommentar label {
                display: block;                
                margin: 20px 0 10px 10%;
            }

            .Kommentar textarea{
                min-width: 78%;
                max-width: 78%;
                min-height: 50px;
                /* float:left; */
                margin: 0% 10% 0% 10%;
            }

            .Kommentar button {
                margin: 10px 12% 40px 0;
                clear: both;
                float: right;
            }

        </style>
    </head>
    <body>
        
        <div class="Kommentar">
            <label for="nyKommentar">Skriv en ny kommentar</label>
            <textarea name="nyKommentar">Tekst...</textarea>
            <button type="submit">Legg til</button>
        </div>

    </body>
</html>
