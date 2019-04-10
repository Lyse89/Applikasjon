-- Testet og kontrollert av Kristoffer Sorensen
USE alumni05;

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
insert into arrangement values(11111, 'Tittelen for arr1', 'q', 'Lokasjon for arr1', current_date(), current_date(), 'Beskrivelse av arrangementet1');
insert into arrangement values(11112, 'Tittelen for arr2', 'q', 'Lokasjon for arr2', current_date(), current_date(), 'Beskrivelse av arrangementet2');
insert into arrangement values(11113, 'Tittelen for arr3', 'q', 'Lokasjon for arr3', current_date(), current_date(), 'Beskrivelse av arrangementet3');
insert into arrangement values(11114, 'Tittelen for arr4', 'q', 'Lokasjon for arr4', current_date(), current_date(), 'Beskrivelse av arrangementet4');
insert into arrangement values(11115, 'Tittelen for arr5', 'q', 'Lokasjon for arr5', current_date(), current_date(), 'Beskrivelse av arrangementet5');
insert into arrangement values(11116, 'Tittelen for arr6', 'q', 'Lokasjon for arr6', current_date(), current_date(), 'Beskrivelse av arrangementet6');

select * from arrangement;
select * from bruker;