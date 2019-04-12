-- Testet og kontrollert av Kristoffer Sorensen
USE alumni05;
ALTER DATABASE alumni05 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

INSERT INTO token(brukernavn,token,expires) VALUES
('bruker', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', CURRENT_DATE());


-- Testverdi (en bruker av systemet som skal kunne logge seg inn
-- attributtet for passord er hashen for passordet 'passord'

INSERT INTO interesser (brukerNavn, interesse) VALUES
('654321', 'Python'),
('1', 'Java'),
('1', 'Php'),
('2', 'lego'),
('2', 'Python');

INSERT INTO bio (brukerNavn, bio) VALUES
('q', 'Hei jeg heter william');


UPDATE bio
SET bio = 'heiheihei'
WHERE bio.brukerNavn = 'q';


SELECT * FROM bruker;
SELECT * FROM interesser;
SELECT * FROM bio;

SELECT bruker.fornavn, bruker.etternavn, interesser.interesse
FROM bruker
INNER JOIN interesser ON bruker.idbruker = interesser.idbruker
WHERE interesse LIKE "%lego%";

SELECT fornavn, etternavn
FROM bruker
WHERE brukerNavn LIKE "q";

SELECT interesse FROM interesser WHERE brukerNavn LIKE "q" ORDER BY interesse ASC;

DELETE FROM interesser
WHERE brukerNavn ='112311'
AND interesse LIKE ' ';

DELETE FROM interesser
WHERE interesse = '';

SELECT interesse
FROM interesser
GROUP BY interesse
ORDER BY COUNT(*) DESC
LIMIT 10;

-- Inndata for eventer
insert into arrangement values(11111, 'Motivasjonsforedrag i vestre fløy', 'q', 'Lokasjon for arr2', current_date(), current_date(), 'Velkommen til motivasjonsforedrag. Dette er beskrivelsen av arrangementet. Vi kan by på pizza og kaker til påmeldte.');
insert into arrangement values(11112, 'Hackathon', 'q', 'Lokasjon for arr1', current_date(), current_date(), 'Vel møtt til hackathon, arrangementet starter i det lille auditoriet. Oppgavene slippes klokken 7 og før dette vil deltagere deles opp i grupper for brainstorming.');
insert into arrangement values(11113, 'Lan 23-25 mars', 'q', 'Lokasjon for arr3', current_date(), current_date(), 'Debug inviterer til lan i workshop rommet. Det vil bli avholdt konkurranser i de spillene som stemmer frem. Det vil bli servert gratis pizza på fredag kveld.');
insert into arrangement values(11114, 'Quiz - Jokern', 'q', 'Lokasjon for arr4', current_date(), current_date(), 'Imorgen blir det quiz på Jokern - Ringerike Studentkro kl 20, husk det blir premier! Trykk skal hvis dere vet dere kommer! Gledes til å se dere imorgen!');
insert into arrangement values(11115, '10 års jubileum', 'q', 'Lokasjon for arr5', current_date(), current_date(), 'Beskrivelse av arrangementet5');

-- insert into nyheter values(11111, 'Tittel', 'q', 'beskrivelse');
insert into nyheter values(11111, '50 nye parkeringsplasser', 'q', 'Iløpet av høsten vil det komme 50 ny parkeringsplasser disponible for studenter.',current_date());
insert into nyheter values(11112, 'Leie av serverplass', 'q', 'Det vil nå være mulig for studenter ved usn å leie egen serverplass.',current_date());
insert into nyheter values(11113, 'Stundenter fra usn på utveksling', 'q', 'beskrivelse',current_date());
insert into nyheter values(11114, 'Åpning av det nye bygget', 'q', 'Nybygget står klart til høsten. I denne forbindelse vil det være åpningsseremoni med underholdning 14.04.2019.',current_date());

insert into jobbAnnonse values(11111, 'Sopra Steria', 'Junior-Utvikler','q','Sopra Steria er for tredje år på rad kåret til Norges beste arbeidsplass av Great Place to Work. Som kunnskapsbedrift er det viktig for oss å tiltrekke de flinkeste menneskene og utvikle dem videre i deres karriere, samtidig som de har det gøy på jobb. Med noen av Norges mest spennende kunder og digitaliseringsprosjekter, er vi stadig på jakt etter dyktige konsulenter. Har du lyst til å bli vår kollega?', 'https://www.soprasteria.no', current_date());
insert into jobbAnnonse values(11112, 'Kartverket', 'Systemarkitekt','q','Beskrivelse', 'url', current_date());
insert into jobbAnnonse values(11113, 'DnB', 'Dev-ops','q','We are looking for an experienced DevOps Engineer to work in the IT Group Wealth Management Section of DNB IT. The position entails working in a highly competent and collaborative environment to maintain and improve critical applications used by Wealth Management Business.', 'url', current_date());
insert into jobbAnnonse values(11114, 'Atea', 'It-konsulent','q','Vi leter etter IT konsulenter til vårt kontor i Tromsø. Vi ser etter deg som aktivt søker utfordringer. Du venter ikke bare på at noen skal fortelle deg hvordan ting skal gjøres, men du utforsker selv og kommer med forslag på hvordan du og andre kan jobbe smartere og ha enda større påvirkning. Du finner måter vi kan få brukt vår samlede ekspertise til beste for kundene våre. For en jobb i Atea innebærer at hver og en av oss tar ansvar for jobben vår og fremtiden til selskapet – og vi vet at vi er gode alene, men aller best sammen.', 'url', current_date());

CREATE TABLE jobbAnnonse (
    annonseid INTEGER(5),
    tittel VARCHAR(40),
    stilling VARCHAR(40),
    forfatter VARCHAR(20),
    beskrivelse VARCHAR(200),
    url VARCHAR(100),
    lagtTil DATETIME,
    CONSTRAINT jobbAnnonsePK PRIMARY KEY(annonseid)
);


select * from arrangement;
select * from bruker;
select * from utestengt;
select * from anmerkning;
INSERT INTO utestengt (brukerNavn, gittAv, tid) VALUES
("q", "q", now());

INSERT INTO anmerkning (brukerNavn, tid, forklaring) VALUES
("q", now(), "Dette er en forklaring på anmerkningen");

select * from karantene;
INSERT INTO karantene (brukerNavn, startTid, sluttTid) VALUES
('q', now(), now() + INTERVAL 1 DAY),
('q', now(), now() + INTERVAL 1 WEEK),
('q', now(), now() + INTERVAL 1 MONTH);