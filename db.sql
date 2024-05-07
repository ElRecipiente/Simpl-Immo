CREATE DATABASE simplimmo;
USE simplimmo;
CREATE TABLE type_biens (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL
);
CREATE TABLE types_transactions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL
);
CREATE TABLE regions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL
);
CREATE TABLE villes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    id_regions INT,
    FOREIGN KEY (id_regions) REFERENCES regions(id)
);
CREATE TABLE user (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    is_admin TINYINT(1) NOT NULL DEFAULT 0
);
CREATE TABLE photos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    chemin VARCHAR(255) NOT NULL
);
CREATE TABLE annonces (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_user INT DEFAULT NULL,
    id_type_bien INT,
    id_type_transaction INT,
    id_ville INT,
    surface DECIMAL(10, 2) NOT NULL,
    prix DECIMAL(10, 2) NOT NULL,
    description TEXT,
    date_creation DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES users(id),
    FOREIGN KEY (id_type_bien) REFERENCES type_biens(id),
    FOREIGN KEY (id_type_transaction) REFERENCES types_transactions(id),
    FOREIGN KEY (id_ville) REFERENCES villes(id)
);
CREATE TABLE annonce_photos (
    id_annonce INT,
    id_photo INT,
    PRIMARY KEY (id_annonce, id_photo),
    FOREIGN KEY (id_annonce) REFERENCES annonces(id),
    FOREIGN KEY (id_photo) REFERENCES photos(id)
);
CREATE TABLE demandes_rappel (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_annonces INT,
    id_user INT,
    email_visiteur VARCHAR(255) NOT NULL,
    date_heure_rappel DATETIME NOT NULL,
    FOREIGN KEY (id_annonces) REFERENCES annonces(id),
    FOREIGN KEY (id_user) REFERENCES users(id)
);