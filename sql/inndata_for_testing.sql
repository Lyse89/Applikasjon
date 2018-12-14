-- Testet og kontrollert av Kristoffer Sorensen


-- Testverdi (en bruker av systemet som skal kunne logge seg inn
-- attributtet for passord er hashen for passordet 'passord'
INSERT INTO bruker (brukerNavn, passord, fornavn, etternavn, ePost, feilLoginnTeller, feilLoginnSiste, FeilIP)
VALUES("bruker", "535961d8695ee56b5d8ee42fa76063a03ac726c6", "fornavn", "etternavn", "hallo@epost.no", 1, current_time(), "FeilLoggInnIP-felt");

SELECT * FROM bruker