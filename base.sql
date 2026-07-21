DROP TABLE IF EXISTS Transaction;
DROP TABLE IF EXISTS Tranche;
DROP TABLE IF EXISTS Type_transaction;
DROP TABLE IF EXISTS Operateur_prefix;
DROP TABLE IF EXISTS Operateur;
DROP TABLE IF EXISTS Prefix_operateur;
DROP TABLE IF EXISTS Commission_inter_operateur;
DROP TABLE IF EXISTS Client;

CREATE TABLE Client (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    numero TEXT
);

CREATE TABLE Prefix_operateur (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    id_operateur INTEGER NOT NULL,
    Prefix TEXT NOT NULL,
    FOREIGN KEY (id_operateur) REFERENCES Operateur(id)
);

CREATE TABLE Operateur (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nom TEXT NOT NULL,
    mot_de_passe TEXT NOT NULL
);

CREATE TABLE Type_transaction (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    libelle TEXT NOT NULL
);

CREATE TABLE Tranche (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    id_type INTEGER NOT NULL,
    montant_min REAL NOT NULL,
    montant_max REAL NOT NULL,
    Frais REAL NOT NULL,
    FOREIGN KEY (id_type) REFERENCES Type_transaction(id)
);

CREATE TABLE Transaction (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    id_client INTEGER NOT NULL,
    id_client2 INTEGER,
    id_type INTEGER NOT NULL,
    id_tranche INTEGER,
    montant REAL NOT NULL,
    frais REAL DEFAULT 0,
    commission_inter_operateur REAL DEFAULT 0,
    operateur_destinataire_id INTEGER,
    FOREIGN KEY (id_client) REFERENCES Client(id),
    FOREIGN KEY (id_client2) REFERENCES Client(id),
    FOREIGN KEY (id_type) REFERENCES Type_transaction(id),
    FOREIGN KEY (id_tranche) REFERENCES Tranche(id),
    FOREIGN KEY (operateur_destinataire_id) REFERENCES Operateur(id)
);

CREATE TABLE Commission_inter_operateur (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    id_operateur INTEGER NOT NULL,
    pourcentage REAL NOT NULL DEFAULT 0,
    FOREIGN KEY (id_operateur) REFERENCES Operateur(id)
);

CREATE TABLE Promotion(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    pourcentage  REAL NOT NULL DEFAULT 0
);
INSERT INTO Promotion (pourcentage) VALUES
(10);

INSERT INTO Type_transaction (libelle) VALUES ('depot');
INSERT INTO Type_transaction (libelle) VALUES ('retrait');
INSERT INTO Type_transaction (libelle) VALUES ('transfert');

INSERT INTO Tranche (id_type, montant_min, montant_max, Frais) VALUES (2, 100, 1000, 50);
INSERT INTO Tranche (id_type, montant_min, montant_max, Frais) VALUES (2, 1001, 5000, 50);
INSERT INTO Tranche (id_type, montant_min, montant_max, Frais) VALUES (2, 5001, 10000, 100);
INSERT INTO Tranche (id_type, montant_min, montant_max, Frais) VALUES (2, 10001, 25000, 200);
INSERT INTO Tranche (id_type, montant_min, montant_max, Frais) VALUES (2, 25001, 50000, 400);
INSERT INTO Tranche (id_type, montant_min, montant_max, Frais) VALUES (2, 50001, 100000, 800);
INSERT INTO Tranche (id_type, montant_min, montant_max, Frais) VALUES (2, 100001, 250000, 1500);
INSERT INTO Tranche (id_type, montant_min, montant_max, Frais) VALUES (2, 250001, 500000, 1500);
INSERT INTO Tranche (id_type, montant_min, montant_max, Frais) VALUES (2, 500001, 1000000, 2500);
INSERT INTO Tranche (id_type, montant_min, montant_max, Frais) VALUES (2, 1000001, 2000000, 3000);

INSERT INTO Operateur (nom, mot_de_passe) VALUES ('admin', 'admin');
INSERT INTO Operateur (nom, mot_de_passe) VALUES ('orange', 'orange123');
INSERT INTO Operateur (nom, mot_de_passe) VALUES ('airtel', 'airtel123');

INSERT INTO Prefix_operateur (id_operateur, Prefix) VALUES (1, '034');
INSERT INTO Prefix_operateur (id_operateur, Prefix) VALUES (1, '038');
INSERT INTO Prefix_operateur (id_operateur, Prefix) VALUES (2, '032');
INSERT INTO Prefix_operateur (id_operateur, Prefix) VALUES (3, '033');

INSERT INTO Commission_inter_operateur (id_operateur, pourcentage) VALUES (2, 2.0);
INSERT INTO Commission_inter_operateur (id_operateur, pourcentage) VALUES (3, 1.5);

INSERT INTO Client (numero) VALUES ('0341234567');
INSERT INTO Client (numero) VALUES ('0329876543');
INSERT INTO Client (numero) VALUES ('0334567890');
INSERT INTO Client (numero) VALUES ('0345678901');
INSERT INTO Client (numero) VALUES ('0323456789');
INSERT INTO Client (numero) VALUES ('0333333333');
INSERT INTO Client (numero) VALUES ('0381234567');
