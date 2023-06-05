Installation du projet

Telechargez directement le projet ou effectuez un git clone via la commande suite :

git clone https://github.com/Sbleut/blogmvc.git

Base de données

Étape 1: Créer un utilisateur de base de données

CREATE USER 'nom_utilisateur'@'localhost' IDENTIFIED BY 'mot_de_passe';
GRANT ALL PRIVILEGES ON *.* TO 'nom_utilisateur'@'localhost';
FLUSH PRIVILEGES;

Étape 2: Créer une nouvelle base de données

CREATE DATABASE nom_base_de_donnees;

Étape 3: Importer une base de données existante à partir d'un fichier SQL

USE nom_base_de_donnees;
SOURCE blogmvc.sql;

Étape 4: Pensez à reporter les informations nécessaire dans config.json