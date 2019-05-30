DROP DATABASE kurs;
CREATE DATABASE IF NOT EXISTS kurs 
DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_danish_ci;
USE kurs;
CREATE USER 'Kurs'@'localhost' IDENTIFIED BY 'Surk';
GRANT ALL ON kurs.* TO 'Kurs'@'localhost';

DROP TABLE IF EXISTS tblstudent;
DROP TABLE IF EXISTS tblsvar;
DROP TABLE IF EXISTS tblalternativ;
DROP TABLE IF EXISTS tblstudkurs;
DROP TABLE IF EXISTS tblkurs;
DROP TABLE IF EXISTS tblevaluering;
DROP TABLE IF EXISTS tblsporsmal;

CREATE TABLE kurs.tblstudent (
  `studId` INT(11) NOT NULL AUTO_INCREMENT,
  `studNavn` VARCHAR(45) NOT NULL,
  `studAdresse` VARCHAR(45),
  `studPassord` VARCHAR(45),
  PRIMARY KEY (`studId`)
)
ENGINE=innodb DEFAULT CHARSET=utf8;

CREATE TABLE kurs.tblkurs (
   kursID INT(11) NOT NULL AUTO_INCREMENT,
   kursNavn VARCHAR(45) NOT NULL,
   kursSemester VARCHAR(3),
   PRIMARY KEY (`kursID`)
)
ENGINE=innodb DEFAULT CHARSET=utf8;

 CREATE TABLE kurs.tblstudkurs ( 
   skStudID INT(11) NOT NULL,
   skKursID INT(11) NOT NULL,
   FOREIGN KEY (`skStudID`) REFERENCES kurs.tblstudent(studId),
   FOREIGN KEY (`skKursID`) REFERENCES kurs.tblkurs(kursID),
   PRIMARY KEY (`skStudID`,`skKursID`)
)
ENGINE=innodb DEFAULT CHARSET=utf8;

CREATE TABLE kurs.tblevaluering (
  evalID INT(11) NOT NULL AUTO_INCREMENT,
  evalKursID INT(11) NOT NULL,
  evalNavn VARCHAR(45),
  evalDatoUt DATETIME,
  evalDatoInn DATETIME,
  FOREIGN KEY (evalKursID) REFERENCES kurs.tblKurs(kursID),
  PRIMARY KEY (evalID)
)
ENGINE=innodb DEFAULT CHARSET=utf8;

CREATE TABLE kurs.tblalternativ (
  altID INT(11) NOT NULL AUTO_INCREMENT,
  altSpmID INT(11),
  altTekst VARCHAR(100),
  PRIMARY KEY (`altID`)
)
ENGINE=innodb DEFAULT CHARSET=utf8;

CREATE TABLE kurs.tblsvar (
  `svarStudID` INT(11) NOT NULL,
  `svarAltID` INT(11) NOT NULL,
  FOREIGN KEY (`svarStudID`) REFERENCES kurs.tblstudent (`studId`),
  FOREIGN KEY (`svarAltID`) REFERENCES kurs.tblalternativ (`altID`),
  PRIMARY KEY (`svarStudID`,`svarAltID`)
)
ENGINE=innodb DEFAULT CHARSET=utf8;


  
CREATE TABLE kurs.tblsporsmal (
  spmID INT(11) NOT NULL AUTO_INCREMENT,
  spmEvalID INT(11),
  spmTekst VARCHAR(100),
  FOREIGN KEY (spmEvalId) REFERENCES kurs.tblevaluering(evalID),
  PRIMARY KEY (spmID)
)
ENGINE=innodb DEFAULT CHARSET=utf8;

INSERT INTO kurs.tblkurs VALUES(null,'PRG1000 Programmering 1','H19');
INSERT INTO tblstudent VALUES(null,'Ole Brum','Bredalsveien 14','honning');
INSERT INTO tblstudkurs VALUES(1,1);
INSERT INTO tblstudent VALUES(null,'Nasse Nøff','Hundremeterskogen','Flesk');
INSERT INTO tblKurs VALUES(null,'OBJ2000 Objektorientert programmering 1','H19');
INSERT INTO tblstudkurs VALUES(1,2);
INSERT INTO tblstudkurs VALUES(2,2);
INSERT INTO tblevaluering VALUES(null,1,'Eksamensprosjekt','2016-05-06','2015-05-17');
INSERT INTO tblsporsmal VALUES(null,1,'Hva gjorde laboranten da han kom til labyrinten?');
INSERT INTO tblalternativ VALUES(null,1,'Labba rundt den');
INSERT INTO tblalternativ VALUES(null,1,'Snudde');
INSERT INTO tblalternativ VALUES(null,1,'Sang en sang');
INSERT INTO tblalternativ VALUES(null,1,'Hva');
INSERT INTO tblsvar VALUES(1,2);


