CREATE TABLE Client (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nom TEXT NOT NULL,
    numero TEXT NOT NULL
);

CREATE TABLE Operateur (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    Prefix TEXT NOT NULL
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
    FOREIGN KEY(id_type) REFERENCES Type_transaction(id)    
);

CREATE TABLE "Transaction" (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    id_client INTEGER NOT NULL,
    id_type INTEGER NOT NULL,
    id_tranche INTEGER NOT NULL,
    montant REAL NOT NULL,
    FOREIGN KEY (id_client) REFERENCES Client(id),
    FOREIGN KEY (id_type) REFERENCES Type_transaction(id),
    FOREIGN KEY (id_tranche) REFERENCES Tranche(id)
);