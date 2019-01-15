-- Applikasjonsutvikling Database --
-- Oppretter Database --
-- Databasen laget og kontrollert av William Rastad 09.12.2018 --

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

CREATE TABLE interesser (
    interesse VARCHAR (50)
);

CREATE TABLE interesserkobling (
	idbruker INT NOT NULL,
	interesser VARCHAR (45),
    CONSTRAINT brukerFK FOREIGN KEY (idbruker) REFERENCES bruker (idbruker),
    CONSTRAINT interesserFK FOREIGN KEY (interesse) REFERENCES interesser (interesse)
);








CREATE TABLE bio (
	idbruker INT NOT NULL,
    bio VARCHAR (255),
    CONSTRAINT bioPK PRIMARY KEY (idbruker, bio),
    CONSTRAINT biobruker FOREIGN KEY (idbruker) REFERENCES bruker (idbruker)
);