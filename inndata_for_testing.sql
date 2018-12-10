-- Laget og kontrollert av Kristoffer Sørensen

-- Testverdi (en bruker av systemet som skal kunne logge seg inn
INSERT INTO bruker (brukerNavn, passord, fornavn, etternavn, fødselsdato, ePost, feilLoginnTeller, feilLoginnSiste, FeilIP)
VALUES("bruker", "passord", "fornavn", "etternavn", curdate(), "hallo@epost.no", 1, curdate(), "FeilLoggInnIP-felt");