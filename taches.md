# TACHES DU PROJET 
## V1
### ETU4161
- Conception De base de Donnees
    - Table 
        -Client
        -Prefix_operateur
        -Operateur
        -Type_transaction
        -Tranche
        -Transaction

- Creation des Models:
    - ClientModel.php
    - OperateurModel.php
    - PrefixeOperateurModel.php
    - TrancheModel.php
    - TransactionModel.php
    - TypeTrasactionModel.php

### ETU 3920
- Environnement 
    - Preparation github
    - Preparation Environnement Codigneiter

- Creation Template
    - Chercher Template
    - Integration Template 
    - Creation des pages 
        - Login.php
        - Admin
            - Rapport.php
            - Gestion_Frais.php
            - Gestion_Client.php
        - Client
            - Tableau de Bord .php
            - Operation_Transfert.php
            - Retrait.php
            - Depot.php
            - Transfert.php
        - sidebar.php

- Controller
    - AuthController
        - Login 
        - logout
    - ClientController
        - index
            - Avoir solde
        - depot(aller dans la page depot)
        - retrait(aller dans la page retrait)
        - transfert(aller dans la page transfert)
- Route
    - Creation des routes necessaires


Non fini :
- Traitement depots , Transfert , Retrait
- Configuration des préfixes valable de l’opérateur (ex: 033 et 037)
- Situation gain via les différents frais ( retrait et transfert)
- Situation des comptes clients 
 
## V2
### ETU 003920
* Faire marcher les operations

### ETU 004161
- operateur
    - Creation table Commission
    - Creation Model
        - Commission.php
            - Function 
                - getAll()
                - getByPaire()
                - insertCommission
    - Creation Controller
