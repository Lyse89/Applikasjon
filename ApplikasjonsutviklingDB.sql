-- Applikasjonsutvikling Database --
-- Oppretter Database  --
-- Databasen laget og kontrollert av William Rastad --
-- Oppdatert til riktig database-navn for gruppe av Kristoffer Sorensen --
-- Lagt til oppretting av brukere av Kristoffer Sorensen

DROP SCHEMA IF EXISTS alumni05;
CREATE SCHEMA alumni05;
USE alumni05;

-- Oppretter Tabellen bruker --
CREATE TABLE bruker(
idbruker INT NOT NULL AUTO_INCREMENT,
brukerNavn 	VARCHAR(45) NOT NULL UNIQUE,
passord 	VARCHAR(40) NOT NULL,
fornavn 	VARCHAR(40) NOT NULL,
etternavn 	VARCHAR(40) NOT NULL,
fødselsdato DATE NOT NULL,
ePost 		VARCHAR(45) NOT NULL,
feilLoginnTeller 	INT,
feilLoginnSiste 	DATETIME,
FeilIP 				VARCHAR(45),

CONSTRAINT idbrukerPK PRIMARY KEY (idbruker)
);

-- Oppretting av admin-bruker
CREATE USER alumni05_adm IDENTIFIED BY 'adm_5_aLumNi';
GRANT ALL PRIVILEGES ON alumni05 TO alumni05_adm;

-- Oppretting av bruker for applikasjon
CREATE USER alumni_05 IDENTIFIED BY 'alumni';
-- Usikker paa om ".*" er en grei maate aa gjore det her paa
GRANT SELECT ON alumni05.* TO alumni_05;
GRANT INSERT ON alumni05.* TO alumni_05;
GRANT UPDATE ON alumni05.* TO alumni_05;
GRANT DELETE ON alumni05.* TO alumni_05;
