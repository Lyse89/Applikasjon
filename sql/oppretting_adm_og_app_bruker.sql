-- Laget og kontrollert av Kristoffer Sørensen

-- Oppretting av admin-bruker
DROP USER IF EXISTS alumni05_adm;
CREATE USER alumni05_adm IDENTIFIED BY 'adm_5_aLumNi';
GRANT ALL PRIVILEGES ON alumni05 TO alumni05_adm;

-- Oppretting av bruker for applikasjon
DROP USER IF EXISTS alumni_05;
CREATE USER alumni_05 IDENTIFIED BY 'alumni';
-- Usikker paa om ".*" er en grei maate aa gjore det her paa
GRANT SELECT ON alumni05.* TO alumni_05;
GRANT INSERT ON alumni05.* TO alumni_05;
GRANT UPDATE ON alumni05.* TO alumni_05;
GRANT DELETE ON alumni05.* TO alumni_05;