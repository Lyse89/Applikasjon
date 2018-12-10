-- Applikasjonsutvikling Database
-- Oppretter Database  --
DROP SCHEMA IF EXISTS ApplikasjonsutviklingDB;
CREATE SCHEMA ApplikasjonsutviklingDB;
USE ApplikasjonsutviklingDB;

CREATE TABLE bruker(
idbruker INT,
brukerNavn VARCHAR(45),
passord VARCHAR(40),
ePost VARCHAR(45),
feilLoginnTeller INT,
feilLoginnSiste DATETIME,
FeilIP VARCHAR(45),
CONSTRAINT idbrukerPK PRIMARY KEY (idbruker)
);
