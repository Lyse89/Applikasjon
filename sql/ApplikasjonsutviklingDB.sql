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
    CONSTRAINT biobrukerFK FOREIGN KEY (brukerNavn) REFERENCES bruker (brukerNavn)
);
-- Husk meg funksjonalitet
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
    tittel VARCHAR(120),
    sendtTid DATETIME,
    melding VARCHAR(255),
    CONSTRAINT meldingerPK PRIMARY KEY (avsender, mottaker, sendtTid),
    CONSTRAINT meldingerBrukerFK FOREIGN KEY (avsender) REFERENCES bruker (brukerNavn),
    CONSTRAINT meldingerBrukerFK2 FOREIGN KEY (mottaker) REFERENCES bruker (brukerNavn)
);
-- For arrangement
CREATE TABLE arrangement (
    arrangementId INT(5),
    vert VARCHAR(45),
    startTid DATETIME(),
    sluttTid DATETIME(),
    Beskrivelse VARCHAR(255)
    CONSTRAINT arrangementPK PRIMARY KEY(arrangementId),
    CONSTRAINT arrangementBrukerFK FOREIGN KEY(vert) REFERENCES bruker(brukerNavn)
);
CREATE TABLE arrangementDeltagelse (
    arrangementId INT(5),
    deltager VARCHAR(45),
    CONSTRAINT arrangementDeltagelsePK PRIMARY KEY(arrangementId, deltager),
    CONSTRAINT arrangementDeltagelseBrukerFK FOREIGN KEY(deltager) REFERENCES bruker(brukerNavn),
    CONSTRAINT arrangementDeltagelseArrangementFK FOREIGN KEY(arrangementId) REFERENCES arrangement(arrangementId)
);

