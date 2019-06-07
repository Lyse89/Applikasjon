-- Testet og kontrollert av Kristoffer Sorensen
USE alumni05;
ALTER DATABASE alumni05 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Admin-bruker
insert into bruker values('admin', 'afd5ca0084efcf026e296ea5dfd7429cfc5a3fe7', 'Olav', 'Hellig', 'oh@usn.no', '0', NULL, NULL, NULL, NULL);
UPDATE bruker SET bruker.rolle = 'Admin' WHERE bruker.brukerNavn = 'admin';

-- Vanlige brukere
insert into bruker values('arne', 'd46ea8b655e4e602024688b8dfab5f6a13c6da51', 'arne', 'and', 'a@usn.no', '0', NULL, NULL, NULL, '../brukere/arne.jpg');
insert into bruker values('bjarne', '6a08ca76200a364d96214eae8970269aa5023124', 'bjarne', 'betjent', 'b@usn.no', '0', NULL, NULL, NULL, '../brukere/bjarne.jpg');
insert into bruker values('carl', '3c6e238f13cf76c438902069df4dd35b56e2d959', 'carl', 'cung', 'c@usn.no', '0', NULL, NULL, NULL, '../brukere/carl.jpg');
insert into bruker values('donald', 'c2112c042635ab4c1b028f6b4b44c6a2634442c6', 'Donald', 'Dal', 'd@usn.no', '0', NULL, NULL, NULL, '../brukere/donald.jpg');
insert into bruker values('e', '752e0644435a3ab633189c13cf6c8f531d2ea343', 'Erlend', 'Eng', 'e@usn.no', '0', NULL, NULL, NULL, '../brukere/e.jpg');
update bruker set bilde = 'bruker' where brukerNavn = '1';


-- INSERT INTO token(brukernavn,token,expires) VALUES
-- ('bruker', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', CURRENT_DATE());
-- Testverdi (en bruker av systemet som skal kunne logge seg inn
-- attributtet for passord er hashen for passordet 'passord'


INSERT INTO interesser (interesse) VALUES
('Java'),
('Php'),
('lego'),
('Python');

INSERT INTO bio (brukerNavn, bio) VALUES
('arne', 'Hei jeg heter Arne And og det her er min bio');


-- Inndata for eventer
insert into arrangement(tittel, vert, lokasjon,startTid, sluttTid, Beskrivelse) values
('Motivasjonsforedrag i vestre fløy', 'arne', 'Lokasjon for arr2', now(), now(), 'Velkommen til motivasjonsforedrag. Dette er beskrivelsen av arrangementet. Vi kan by på pizza og kaker til påmeldte.'),
('Hackathon', 'bjarne', 'Lokasjon for arr1', now(), now(), 'Vel møtt til hackathon, arrangementet starter i det lille auditoriet. Oppgavene slippes klokken 7 og før dette vil deltagere deles opp i grupper for brainstorming.'),
('Lan 23-25 mars', 'carl', 'Lokasjon for arr3', now(), now(), 'Debug inviterer til lan i workshop rommet. Det vil bli avholdt konkurranser i de spillene som stemmer frem. Det vil bli servert gratis pizza på fredag kveld.'),
('Quiz - Jokern', 'donald', 'Lokasjon for arr4', now(), now(), 'Imorgen blir det quiz på Jokern - Ringerike Studentkro kl 20, husk det blir premier! Trykk skal hvis dere vet dere kommer! Gledes til å se dere imorgen!'),
('10 års jubileum', 'e', 'Lokasjon for arr5', now(), now(), 'Beskrivelse av arrangementet5');


-- arrangementDeltagelse
insert into arrangementDeltagelse values(1, 'arne');
insert into arrangementDeltagelse values(1, 'bjarne');
insert into arrangementDeltagelse values(2, 'bjarne');
insert into arrangementDeltagelse values(2, 'donald');
insert into arrangementDeltagelse values(2, 'carl');


-- insert into nyheter values(11111, 'Tittel', 'q', 'beskrivelse');
insert into nyheter(tittel, forfatter, beskrivelse,lagtTil) values
('50 nye parkeringsplasser', 'arne', 'Iløpet av høsten vil det komme 50 ny parkeringsplasser disponible for studenter.',now()),
('Leie av serverplass', 'bjarne', 'Det vil nå være mulig for studenter ved usn å leie egen serverplass.',now()),
('Stundenter fra usn på utveksling', 'carl', 'beskrivelse',now()),
('Åpning av det nye bygget', 'donald', 'Nybygget står klart til høsten. I denne forbindelse vil det være åpningsseremoni med underholdning 14.04.2019.',now());

insert into jobbAnnonse(tittel, stilling, forfatter, beskrivelse, url, lagtTil) values
('Sopra Steria', 'Junior-Utvikler','arne','Sopra Steria er for tredje år på rad kåret til Norges beste arbeidsplass av Great Place to Work. Som kunnskapsbedrift er det viktig for oss å tiltrekke de flinkeste menneskene og utvikle dem videre i deres karriere, samtidig som de har det gøy på jobb. Med noen av Norges mest spennende kunder og digitaliseringsprosjekter, er vi stadig på jakt etter dyktige konsulenter. Har du lyst til å bli vår kollega?', 'https://www.soprasteria.no', now()),
('Kartverket', 'Systemarkitekt','carl','Beskrivelse', 'url', now()),
('DnB', 'Dev-ops','carl','We are looking for an experienced DevOps Engineer to work in the IT Group Wealth Management Section of DNB IT. The position entails working in a highly competent and collaborative environment to maintain and improve critical applications used by Wealth Management Business.', 'url', now()),
('Atea', 'It-konsulent','donald','Vi leter etter IT konsulenter til vårt kontor i Tromsø. Vi ser etter deg som aktivt søker utfordringer. Du venter ikke bare på at noen skal fortelle deg hvordan ting skal gjøres, men du utforsker selv og kommer med forslag på hvordan du og andre kan jobbe smartere og ha enda større påvirkning. Du finner måter vi kan få brukt vår samlede ekspertise til beste for kundene våre. For en jobb i Atea innebærer at hver og en av oss tar ansvar for jobben vår og fremtiden til selskapet – og vi vet at vi er gode alene, men aller best sammen.', 'url', now());

-- Kommentarer
insert into kommentar(kommentar, tid, brukernavn, arrangementId) values('Dette er kommentar som skal presenteres', now(), 'arne', 1);





/*
UPDATE bio
SET bio = 'heiheihei'
WHERE bio.brukerNavn = 'q';

SELECT * FROM anmerkning WHERE brukerNavn = 'q' GROUP BY brukerNavn DESC, tid DESC;


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


update karantene
set sluttTid = now()
where brukerNavn = 'w';


SELECT * FROM bruker
WHERE fornavn and etternavn LIKE 'william rastad';

SELECT * FROM bruker
WHERE CONCAT(fornavn,' ', etternavn) LIKE 'William Rastad';

update bruker
set rolle = "Admin"
where brukerNavn = 'q';

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


insert into regler values(1, 'Man skal ikke plage andre');
insert into regler values(2, 'Man skal være grei og snil');
insert into regler values(3, 'for øvrig kan man gjøre hva man vil');
*/
