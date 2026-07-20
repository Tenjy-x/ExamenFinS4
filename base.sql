CREATE TABLE Client (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    numero TEXT 
);


CREATE TABLE Prefix_operateur (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    Prefix TEXT NOT NULL
);

CREATE TABLE Operateur (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    id_prefix INTEGER NOT NULL,
    mot_de_passe TEXT NOT NULL,
    FOREIGN KEY (id_prefix) REFERENCES Prefix_operateur(id)
);

CREATE TABLE Type_transaction (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    libelle TEXT NOT NULL
);

CREATE TABLE Tranche(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    id_type INTEGER NOT NULL,
    montant_min REAL NOT NULL,
    montant_max REAL NOT NULL,
    Frais REAL NOT NULL,
    FOREIGN KEY(id_type) REFERENCES Type_transaction(id)    
);

CREATE TABLE "Transaction" (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    id_client INTEGER NOT NULL,
    id_client2 INTEGER,
    id_type INTEGER NOT NULL,
    id_tranche INTEGER NOT NULL,
    montant REAL NOT NULL,
    FOREIGN KEY (id_client) REFERENCES Client(id),
    FOREIGN KEY (id_client2) REFERENCES Client(id),
    FOREIGN KEY (id_type) REFERENCES Type_transaction(id),
    FOREIGN KEY (id_tranche) REFERENCES Tranche(id)
);

Insert into Client (numero) VALUES
('0341234567'),
('0329876543'),
('0334567890'),
('0345678901'),
('0323456789');
