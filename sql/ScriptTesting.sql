USE alumni05;


SELECT meldinger.avsender, meldinger.melding, meldinger.tittel
FROM innutboks, meldinger
WHERE meldinger.meldingID = innutboks.meldingID
AND bruker = "2"
AND innut = "inn";


SELECT * FROM innutboks;

SELECT * FROM meldinger;

SELECT * FROM arrangement;