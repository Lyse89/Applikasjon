-- Applikasjonsutvikling Database --
-- Oppretter Database --
-- Databasen laget og kontrollert av William Rastad 09.12.2018 --

DROP SCHEMA IF EXISTS alumni05;
CREATE SCHEMA alumni05;
USE alumni05;


-- Oppretter Tabellen bruker --
-- brukerNavn er studentens studentnummer (vanlig med 6 tall) --
-- idbruker er autoincrement som starter på 1 --
CREATE TABLE bruker (
	brukerNavn VARCHAR(45) NOT NULL UNIQUE,
    passord VARCHAR(40) NOT NULL,
    fornavn VARCHAR(40) NOT NULL,
    etternavn VARCHAR(40) NOT NULL,
    ePost VARCHAR(45) NOT NULL,
    feilLoginnTeller INT,
    feilLoginnSiste DATETIME,
    FeilIP VARCHAR(45),
    CONSTRAINT brukerNavnPK PRIMARY KEY (brukerNavn)
);

CREATE TABLE interesser (
	brukerNavn VARCHAR(45) NOT NULL,
	interesse VARCHAR (45),
    CONSTRAINT idbrukerinteressePK PRIMARY KEY (brukerNavn, interesse),
    CONSTRAINT brukerFK FOREIGN KEY (brukerNavn) REFERENCES bruker (brukerNavn)
);

CREATE TABLE bio (
	brukerNavn VARCHAR(45) NOT NULL UNIQUE,
    bio VARCHAR (255),
    CONSTRAINT bioPK PRIMARY KEY (brukerNavn, bio),
    CONSTRAINT biobruker FOREIGN KEY (brukerNavn) REFERENCES bruker (brukerNavn)
);

CREATE TABLE token (
    brukerNavn VARCHAR(45) NOT NULL UNIQUE,
    token CHAR(128),
    expires DATE,
    CONSTRAINT tokenPK PRIMARY KEY (brukerNavn),
    CONSTRAINT tokenbruker FOREIGN KEY (brukerNavn) REFERENCES bruker (brukerNavn)
);

CREATE TABLE meldinger (
	avsender VARCHAR(45),
    mottaker VARCHAR(45),
    titel VARCHAR(120),
    sendtTid DATETIME,
    melding VARCHAR(255),
    CONSTRAINT meldingerPK PRIMARY KEY (avsender, mottaker, sndtTid),
    CONSTRAINT meldingerFK FOREIGN KEY (avsender, mottaker) REFERENCES bruker (brukerNavn)
    );