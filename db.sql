CREATE DATABASE simplimmo;
USE simplimmo;
CREATE TABLE type_property (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
);
CREATE TABLE types_transactions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
);
CREATE TABLE regions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL
);
CREATE TABLE city (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    id_regions INT,
    FOREIGN KEY (id_regions) REFERENCES regions(id)
);
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(100) NOT NULL,
    lastnam VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    is_admin TINYINT(1) NOT NULL DEFAULT 0
);
CREATE TABLE images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    path VARCHAR(255) NOT NULL
);
CREATE TABLE property (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_user INT DEFAULT NULL,
    id_type_property INT,
    id_type_transaction INT,
    id_city INT,
    surface DECIMAL(10, 2) NOT NULL,
    prix DECIMAL(10, 2) NOT NULL,
    description TEXT,
    date_creation DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES users(id),
    FOREIGN KEY (id_type_property) REFERENCES type_property(id),
    FOREIGN KEY (id_type_transaction) REFERENCES types_transactions(id),
    FOREIGN KEY (id_city) REFERENCES city(id)
);
CREATE TABLE property_imagess (
    id_property INT,
    id_images INT,
    PRIMARY KEY (id_property, id_images),
    FOREIGN KEY (id_property) REFERENCES property(id),
    FOREIGN KEY (id_photo) REFERENCES photos(id)
);
CREATE TABLE call_requests (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_property INT,
    id_user INT,
    email_guest VARCHAR(255) NOT NULL,
    date_time_recall DATETIME NOT NULL,
    FOREIGN KEY (id_property) REFERENCES property(id),
    FOREIGN KEY (id_user) REFERENCES users(id)
);