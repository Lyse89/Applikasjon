-- Applikasjonsutvikling Database --
-- Oppretter Database --
-- Databasen laget og kontrollert av William Rastad 09.12.2018 --

DROP SCHEMA IF EXISTS alumni05;
CREATE SCHEMA alumni05;
USE alumni05;

CREATE TABLE roller (
    rolle VARCHAR(15),
    CONSTRAINT rollerPK PRIMARY KEY(rolle)
);

INSERT INTO roller (rolle) VALUES
("Admin"),
("Bruker"),
("Utestengt"),
("Karantene"),
("Avregistrert");

-- Oppretter Tabellen bruker --
CREATE TABLE bruker (
	brukerNavn VARCHAR(45) NOT NULL UNIQUE,
    passord VARCHAR(40) NOT NULL,
    fornavn VARCHAR(40) NOT NULL,
    etternavn VARCHAR(40) NOT NULL,
    ePost VARCHAR(45) NOT NULL,
    feilLoginnTeller INT,
    feilLoginnSiste DATETIME,
    FeilIP VARCHAR(45),
    rolle VARCHAR(15),
    CONSTRAINT brukerNavnPK PRIMARY KEY (brukerNavn),
    CONSTRAINT brukerRolleFK FOREIGN KEY(rolle) REFERENCES roller(rolle)
);

CREATE TABLE interesser (
	interesse VARCHAR (45),
    CONSTRAINT interessePK PRIMARY KEY(interesse)
);

CREATE TABLE interessekobling (
	brukerNavn VARCHAR(45),
	interesse VARCHAR (45),
    CONSTRAINT interessekoblingPK PRIMARY KEY (brukerNavn, interesse),
    CONSTRAINT interessekoblingBrukerFK FOREIGN KEY (brukerNavn) REFERENCES bruker (brukerNavn),
    CONSTRAINT interessekoblingInteresserFK FOREIGN KEY (interesse) REFERENCES interesser(interesse)
);
CREATE TABLE studier (
	studie VARCHAR (45),
    CONSTRAINT studierPK PRIMARY KEY(studie)
);

CREATE TABLE studiekobling (
	brukerNavn VARCHAR(45),
	studie VARCHAR (45),
    CONSTRAINT studiekoblingPK PRIMARY KEY (brukerNavn, studie),
    CONSTRAINT studiekoblingBrukerFK FOREIGN KEY (brukerNavn) REFERENCES bruker (brukerNavn),
    CONSTRAINT studiekoblingStudierFK FOREIGN KEY (studie) REFERENCES studier(studie)
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
	meldingID INT(10) NOT NULL AUTO_INCREMENT,
	avsender VARCHAR(45),
    mottaker VARCHAR(45),
    tittel VARCHAR(120),
    sendtTid DATETIME,
    melding VARCHAR(255),
    CONSTRAINT meldingerPK PRIMARY KEY (meldingID),
    CONSTRAINT meldingerBrukerFK FOREIGN KEY (avsender) REFERENCES bruker (brukerNavn),
    CONSTRAINT meldingerBrukerFK2 FOREIGN KEY (mottaker) REFERENCES bruker (brukerNavn)
);

CREATE TABLE innutboks (
	meldingID INT(10),
	bruker VARCHAR(45),
    innut VARCHAR(3),
	CONSTRAINT innutboks PRIMARY KEY (meldingID, bruker),
    CONSTRAINT innutboksFK FOREIGN KEY (meldingID) REFERENCES meldinger (meldingID),
    CONSTRAINT innutboksFK2 FOREIGN KEY (bruker) REFERENCES bruker (brukerNavn)
);

-- For arrangement
CREATE TABLE arrangement (
    arrangementId INTEGER(5) AUTO_INCREMENT,
    tittel VARCHAR(40),
    vert VARCHAR(45),
    lokasjon VARCHAR(45),
    startTid DATETIME,
    sluttTid DATETIME,
    Beskrivelse VARCHAR(1000),
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

CREATE TABLE nyheter (
    nyhetsid INTEGER(5) AUTO_INCREMENT,
    tittel VARCHAR(40),
    forfatter VARCHAR(20),
    beskrivelse VARCHAR(1000),
    lagtTil DATETIME,
    CONSTRAINT nyheterPK PRIMARY KEY(nyhetsid)
);

CREATE TABLE jobbAnnonse (
    annonseid INTEGER(5) AUTO_INCREMENT,
    tittel VARCHAR(40),
    stilling VARCHAR(40),
    forfatter VARCHAR(20),
    beskrivelse VARCHAR(1000),
    url VARCHAR(100),
    lagtTil DATETIME,
    CONSTRAINT jobbAnnonsePK PRIMARY KEY(annonseid)
);

CREATE TABLE varsel(
    varselid INTEGER(5),
    varsletBruker VARCHAR(45),
    begrunnelse VARCHAR(15),
    CONSTRAINT varselPK PRIMARY KEY(varselid),
    CONSTRAINT varselBrukerFK FOREIGN KEY(varsletBruker) REFERENCES bruker(brukerNavn)
);

CREATE TABLE anmerkning (
    brukerNavn VARCHAR(45),
    gittAv VARCHAR(45),
    tid DATETIME,
    forklaring VARCHAR (255),
    CONSTRAINT annmerkningPK PRIMARY KEY(brukerNavn, tid),
    CONSTRAINT anmerkingbrukerFK FOREIGN KEY (brukerNavn) REFERENCES bruker(brukerNavn),
    CONSTRAINT anmerkingadminbrukerFK FOREIGN KEY (gittAv) REFERENCES bruker(brukerNavn)
);

CREATE TABLE utestengt (
	brukerNavn VARCHAR(45),
    gittAv VARCHAR(45),
    tid DATETIME,
    CONSTRAINT utestengtPK PRIMARY KEY (brukerNavn, tid),
    CONSTRAINT utestengtBrukerFK FOREIGN KEY (brukerNavn) REFERENCES bruker(brukerNavn),
    CONSTRAINT utestengtadminbrukerFK FOREIGN KEY (gittAv) REFERENCES bruker(brukerNavn)
);

CREATE TABLE karantene (
	brukerNavn VARCHAR(45),
    gittAv VARCHAR(45),
    startTid DATETIME,
    sluttTid DATETIME,
    CONSTRAINT karantenePK PRIMARY KEY(brukerNavn, startTid, sluttTid),
    CONSTRAINT karanteneBrukerFK FOREIGN KEY (brukerNavn) REFERENCES bruker(brukerNavn),
    CONSTRAINT karanteneadminbrukerFK FOREIGN KEY (gittAv) REFERENCES bruker(brukerNavn)
);

CREATE TABLE regler (
	regelnr VARCHAR(2),
    tekst VARCHAR(255),
    CONSTRAINT regelnrPK PRIMARY KEY(regelnr)
);

CREATE TABLE kommentar (
    kommentarid INTEGER(8) AUTO_INCREMENT,
    kommentar VARCHAR(255) NOT NULL,
    tid DATETIME NOT NULL,
    brukernavn VARCHAR(45) NOT NULL,
    arrangementId INTEGER(5) NOT NULL,
    CONSTRAINT kommentarPK PRIMARY KEY(kommentarid),
    CONSTRAINT kommentarBrukerFK FOREIGN KEY (brukernavn) REFERENCES bruker(brukerNavn),
    CONSTRAINT kommentarArrangementFK FOREIGN KEY (arrangementId) REFERENCES arrangement(arrangementId)
);