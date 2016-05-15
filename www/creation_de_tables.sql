--fait
CREATE TABLE Batiment (
	Nom VARCHAR(30) PRIMARY KEY,
	Localisation INTEGER
);

CREATE TABLE Taille (
	Superficie INTEGER PRIMARY KEY,
	Capacite_Humain INTEGER
);


CREATE TABLE Plan (
	Plan VARCHAR(30) PRIMARY KEY,
	Nb_Prise_Electrique INTEGER,
	Nb_Prise_Reseau INTEGER
		
);

CREATE TABLE Salle (
	Nom VARCHAR(30) PRIMARY KEY,
	Nom_Batiment VARCHAR (30) ,
	Superficie INTEGER,
	Photo VARCHAR(30),
	Plan VARCHAR(30),
	Arrivee_Electrique_Triphasé BOOl,
	FOREIGN KEY(Nom_Batiment)  REFERENCES Batiment(Nom),
	FOREIGN KEY(Superficie) REFERENCES Taille(Superficie),
	FOREIGN KEY(Plan) REFERENCES Plan(Plan)
		
);


CREATE TYPE statut AS ENUM ('CDI', 'CDD', 'Stagiaire');
CREATE TABLE Employe (
	Numero_Badge VARCHAR(30) PRIMARY KEY,
	Nom VARCHAR(30),
	Prenom VARCHAR(30),
	E_Mail VARCHAR(30),
	Statut statut,
	Nom_Salle VARCHAR(30),
	FOREIGN KEY(Nom_Salle) REFERENCES Salle(Nom)
		
);

CREATE TABLE Superieur (
	Numero_Superieur VARCHAR(30),
	Numero_Sub VARCHAR(30),
	PRIMARY KEY (Numero_Superieur,Numero_Sub),
	FOREIGN KEY(Numero_Superieur) REFERENCES Employe(Numero_Badge),
	FOREIGN KEY(Numero_Sub) REFERENCES Employe(Numero_Badge)		
);

CREATE TABLE RGAZ(
	Arrivee_Gaz VARCHAR(30),
	Nom VARCHAR(30),
	PRIMARY KEY (Arrivee_Gaz,Nom),
	FOREIGN KEY (Nom) REFERENCES Salle(Nom)
);

CREATE TABLE RPLANB(
	Plan_Batiment VARCHAR(30),
	Superficie INTEGER,
	Nombre_Etage INTEGER,
	Nom_Batiment VARCHAR(30),
	PRIMARY KEY (Plan_Batiment,Nom_Batiment),
	FOREIGN KEY (Nom_Batiment) REFERENCES Batiment(Nom)
	
);
CREATE TYPE typeinfo AS ENUM ('fixe', 'portable', 'serveur');
CREATE TYPE typeos AS ENUM ('Windows', 'Linux', 'Mac');
CREATE TABLE Moyens_Infos(
	Nom VARCHAR(30) PRIMARY KEY,
	Type typeinfo,
	OS typeos,
	Responsable VARCHAR(30),
	Proprietaire VARCHAR(30),
	Lien_Machine BOOL,
	NomS VARCHAR(30) NOT NULL,
	FOREIGN KEY (Responsable) REFERENCES Employe(Numero_Badge),
	FOREIGN KEY (Proprietaire) REFERENCES Employe(Numero_Badge),
	FOREIGN KEY (NomS) REFERENCES Salle(Nom)
	
);

CREATE TABLE RMACW(
	Adresse_Mac_Wifi VARCHAR(30),
	Nom VARCHAR(30),
	PRIMARY KEY (Adresse_Mac_Wifi,Nom),
	FOREIGN KEY (Nom) REFERENCES Moyens_Infos(Nom)
);

CREATE TABLE RMACE(
	Adresse_Mac_Ethernet VARCHAR(30),
	Nom VARCHAR(30),
	PRIMARY KEY (Adresse_Mac_Ethernet,Nom),
	FOREIGN KEY (Nom) REFERENCES Moyens_Infos(Nom)
);

CREATE TYPE typetel AS ENUM ('VOIP', 'TOIP', 'LandLine');
CREATE TABLE Modele(
	Modele VARCHAR(30) PRIMARY KEY,
	Type typetel
);
CREATE TABLE Poste_Telephonique(
	Numero INTEGER PRIMARY KEY,
	Numero_Direct INTEGER,
	Modele VARCHAR(30),
	Possessio_Possede BOOL,
	Possessio_Proprietaire VARCHAR(30),
	Nom VARCHAR(30) NOT NULL, 
	FOREIGN KEY (Nom) REFERENCES Salle(Nom),
	
	FOREIGN KEY (Modele) REFERENCES Modele(Modele)
	
);

CREATE TABLE Contrat(
	Num_Contrat VARCHAR(30) PRIMARY KEY,
	Entreprise_Maintenance VARCHAR(30)
);

CREATE TABLE Laboratoire(
	Nom VARCHAR(30) ,
	Sigle VARCHAR(30),
	Logo VARCHAR(30),
	Thematique VARCHAR(30),
	PRIMARY KEY (Nom,Sigle)
);

CREATE TYPE tailleM AS ENUM ('Petite', 'Moyenne', 'Grande');
CREATE TABLE Machine(
	Modele VARCHAR(30),
	Num_Contrat VARCHAR(30),
	Description VARCHAR(30),
	Puissance_Electrique INTEGER,
	Besoin_Triphase BOOL,
	Besoin_Gaz BOOL,
	Type_Gaz VARCHAR(30),
	Taille_Machine tailleM,
	NomS VARCHAR(30) NOT NULL, 
	NomL VARCHAR(30) NOT NULL,
	SigleL Varchar(30) NOT NULL,
	PRIMARY KEY (Modele,Num_Contrat),
	FOREIGN KEY (NomS) REFERENCES Salle(Nom),
	FOREIGN KEY (NomL,SigleL) REFERENCES Laboratoire(Nom,Sigle),
	FOREIGN KEY (Num_Contrat) REFERENCES Contrat(Num_Contrat)
	
);

CREATE TABLE Rtypeg(
	Type_Gaz VARCHAR(30),
	Modele VARCHAR(30),
	Num_Contrat VARCHAR(30),
	PRIMARY KEY(Type_Gaz,Modele,Num_Contrat),
	FOREIGN KEY (Modele,Num_Contrat) REFERENCES Machine(Modele,Num_Contrat)
);


CREATE TABLE Description(
	description VARCHAR(50) PRIMARY KEY,
	start_date DATE,
	end_date DATE,
	CHECK (end_date >= start_date)
);

CREATE TABLE Departement(
	nom VARCHAR(30),
	sigle VARCHAR(30),
	domaine_expertise VARCHAR(30),
	PRIMARY KEY(nom,sigle)
);

CREATE TABLE Projet( 
	nom VARCHAR(30) PRIMARY KEY,
	sigle VARCHAR(30),
	description VARCHAR(50),
	nomD VARCHAR(30),
	sigleD VARCHAR(30), 
	nomL VARCHAR(30),
	sigleL VARCHAR(30),
	FOREIGN KEY (description) REFERENCES Description(description),
	FOREIGN KEY (nomD,sigleD) REFERENCES Departement(nom,sigle),
	FOREIGN KEY (nomL,sigleL) REFERENCES Laboratoire(Nom,Sigle)
); 

CREATE TABLE Assoc(
	nomP VARCHAR(30),
	nomMI VARCHAR(30),
	PRIMARY KEY (nomP, nomMI),
	FOREIGN KEY (nomP) REFERENCES Projet(nom),
	FOREIGN KEY (nomMI) REFERENCES Moyens_Infos(nom)
);


CREATE TABLE Chef_de_projet(
	numero_badge VARCHAR(30) PRIMARY KEY,
	nomP VARCHAR(30) NOT NULL,
	UNIQUE (nomP),
	FOREIGN KEY (numero_badge) REFERENCES Employe(numero_badge),
	FOREIGN KEY (nomP) REFERENCES Projet(nom)
);

CREATE TABLE Acteur(
	numero_badge VARCHAR(30) PRIMARY KEY,
	nom VARCHAR(30) NOT NULL,
	role VARCHAR(30) NOT NULL,
	UNIQUE(role),
	FOREIGN KEY (numero_badge) REFERENCES Employe(numero_badge),
	FOREIGN KEY (nom) REFERENCES Projet(nom)
); 

CREATE TABLE Directeur(
	numero_badge VARCHAR(30) PRIMARY KEY,
	nomL VARCHAR(30),
	sigleL VARCHAR(30),
	nomD VARCHAR(30),
	sigleD varchar(30),
	FOREIGN KEY (numero_badge) REFERENCES Employe(numero_badge),
	FOREIGN KEY (nomL,sigleL) REFERENCES Laboratoire(nom,sigle),
	FOREIGN KEY (nomD, sigleD) REFERENCES Departement(nom,sigle)
);

CREATE TABLE Membre(
	numero_badge VARCHAR(30) PRIMARY KEY,
	poste VARCHAR(30),
	nomL VARCHAR(30),
	sigleL VARCHAR(30),
	nomD VARCHAR(30),
	sigleD varchar(30),
	FOREIGN KEY (numero_badge) REFERENCES Employe(numero_badge),
	FOREIGN KEY (nomL,sigleL) REFERENCES Laboratoire(nom,sigle),
	FOREIGN KEY (nomD, sigleD) REFERENCES Departement(nom,sigle)
);



-- a faire
