<?php

// Denne include-siden er utviklet av Kristoffer Sorensen , siste gang endret 01.06.2019
// Kontrollert og testet av Kristoffer Sorensen , siste gang endret 01.06.2019
    session_start();

    // Sjekk for om brukeren er innlogget og videresending til innlogget forside
    if (isset($_SESSION['sessionId'])) {
        header("Location:siden/innlogget_forside/innlogget_forside2.php");

    //Sjekk om brukeren har autologginn-cookie og om den er gyldig
    } elseif (autoLoggInnCookie() && sjekkToken()) {

        // Denne parameteren (sessionId) skal endres til loggetInn
        $_SESSION['sessionId'] = true;
        // brukernavn maa hentes fra cookien
        $_SESSION['brukernavn'] = _________;

        header("Location:siden/innlogget_forside/innlogget_forside2.php");
    }

    function lagreToken($brukernavn, $token) {

    }

    function huskInnlogging($brukernavn) {

        // Her maa det finnes en sikker maate aa opprette token
        // mellom 128 og 256 bit
        $token = GenerateRandomToken();

        // Oppretter token for brukeren i databasen
        lagreToken($brukernavn, $token);

        // cookie format brukernavn:token:mac
        $cookie = $brukernavn . ':' . $token;
        // message authentication code
        $mac = hash_hmac('sha256', $cookie, SECRET_KEY);
        $cookie .= ':' . $mac;

        setcookie('rememberme', $cookie);
    }
    function hentToken($brukernavn) {

    }


    function gyldigAutoLoggInn($brukernavn, $cookie
        // Sjekker om brukeren har rememberme cookie, settes til '' dersom den ikke finnes.
        $cookie = isset($_COOKIE['rememberme']) ? $_COOKIE['rememberme'] : '';

        // blank string gir false
        if ($cookie) {
            // Deler opp cookien paa skilletegnet :
            list ($user, $token, $mac) = explode(':', $cookie);
            // Sjekk for at den mottatte cookien er autentisk
            // hash_equals() er sikret mot timing attacks
            if (!hash_equals(hash_hmac('sha256', $user . ':' . $token, SECRET_KEY), $mac)) {
                return false;
            }
            $tokenFromDb = hentToken($brukernavn);
            // Endret til not
            if (!hash_equals($tokenFromDb, $token)) {
                //logUserIn($user);
                // videresend til onsket side
            }
        }

    }
?>
