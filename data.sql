-- Base de données : 'Lexik'

CREATE DATABASE Lexik;
USE Lexik;

-- Structure de la table 'Groupe' 

CREATE TABLE IF NOT EXISTS groupe (
	idGroupe char(3) NOT NULL,
	nomGroupe varchar(20) NOT NULL,
	PRIMARY KEY (idGroupe)
	) ENGINE=InnoDB CHARACTER SET latin1;

-- Structure de la table 'Utilisateur'

CREATE TABLE IF NOT EXISTS utilisateur (
	idUtilisateur smallint(2) NOT NULL auto_increment,
	idGroupe char(3) NOT NULL,
	nomUtilisateur varchar(20) NOT NULL,
	prenomUtilisateur varchar(20) NOT NULL,
	mailUtilisateur varchar(50) NOT NULL,
	dateAnnivUtilisateur date NOT NULL,
	PRIMARY KEY (idUtilisateur),
	CONSTRAINT fk_utilisateur_groupe FOREIGN KEY (idGroupe) REFERENCES groupe(idGroupe)
	 ) ENGINE=InnoDB CHARACTER SET latin1;



-- INSERTION table 'Groupe'

INSERT INTO groupe VALUES ("ADM","Administrateur");
INSERT INTO groupe VALUES ("ETU","Etudiant");
INSERT INTO groupe VALUES ("PRO","Professionnel");


-- INSERTION des utilisateurs 'Utilisateur' 
-- Hypothèse : un utilisateur est obligatoirement affilié à un groupe --

INSERT INTO utilisateur (idGroupe, nomUtilisateur, prenomUtilisateur, mailUtilisateur, dateAnnivUtilisateur) VALUES ('ADM', 'Macron', 'Emmanuel', 'manu.macron@exemple.com', 19771221);
INSERT INTO utilisateur (idGroupe, nomUtilisateur, prenomUtilisateur, mailUtilisateur, dateAnnivUtilisateur) VALUES ('ETU', 'Dupond', 'Jean', 'j_dupond@exemple.com', 20000505);
INSERT INTO utilisateur (idGroupe, nomUtilisateur, prenomUtilisateur, mailUtilisateur, dateAnnivUtilisateur) VALUES ('ETU', 'Dupont', 'Martin', 'm_dupont@exemple.com', 20000505);
INSERT INTO utilisateur (idGroupe, nomUtilisateur, prenomUtilisateur, mailUtilisateur, dateAnnivUtilisateur) VALUES ('PRO', 'Savornin', 'Simon', 'savornin@msn.com', 19930828);
INSERT INTO utilisateur (idGroupe, nomUtilisateur, prenomUtilisateur, mailUtilisateur, dateAnnivUtilisateur) VALUES ('PRO', 'Breton', 'Samuel', 's.breton@lexik.fr', 19850101);
INSERT INTO utilisateur (idGroupe, nomUtilisateur, prenomUtilisateur, mailUtilisateur, dateAnnivUtilisateur) VALUES ('PRO', 'Jobs', 'Steve', 'steve_jobs@exemple.com', 19550224);