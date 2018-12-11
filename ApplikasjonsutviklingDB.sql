-- Applikasjonsutvikling Database --
-- Oppretter Database  --
-- Databasen laget og kontrollert av William Rastad --

DROP SCHEMA IF EXISTS alumni05;
CREATE SCHEMA alumni05;
USE alumni05;

-- Oppretter Tabellen bruker --
CREATE TABLE bruker (
    idbruker INT NOT NULL AUTO_INCREMENT,
    brukerNavn VARCHAR(45) NOT NULL UNIQUE,
    passord VARCHAR(40) NOT NULL,
    fornavn VARCHAR(40) NOT NULL,
    etternavn VARCHAR(40) NOT NULL,
    ePost VARCHAR(45) NOT NULL,
    feilLoginnTeller INT,
    feilLoginnSiste DATETIME,
    FeilIP VARCHAR(45),
    CONSTRAINT idbrukerPK PRIMARY KEY (idbruker)
);
