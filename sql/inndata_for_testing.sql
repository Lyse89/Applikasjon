-- Testet og kontrollert av Kristoffer Sorensen
USE alumni05;

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
WHERE interesse LIKE "%lego%"


SELECT interesse FROM interesser WHERE brukerNavn LIKE "q" ORDER BY interesse ASC;