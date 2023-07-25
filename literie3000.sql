CREATE DATABASE IF NOT EXISTS literie3000;

USE literie3000;

CREATE TABLE matelas (
    id SMALLINT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    marque VARCHAR(100) NOT NULL,
    taille VARCHAR(20),
    largeur SMALLINT,
    longueur SMALLINT,
    matiere VARCHAR(100),
    picture VARCHAR(255),
    prix SMALLINT
);

INSERT INTO matelas
(name, marque, taille, largeur, longueur, matiere, picture, prix)
VALUES
("Pas touché", "Epeda", "1P", 90, 190, "ressorts", "matelas_epeda_pastouche.jpg", 529),
("Lapin", "Dreamway", "1P", 90, 190, "latex", "matelas_dreamway_lapin.jpg", 709),
("Alejandrinho", "Bultex", "2P", 140, 190, "ressorts", "matelas_bultex_alejandrinho.jpg", 529),
("Papy", "Epeda", "2P", 160, 190, "Mousse", "matelas_epeda_papy.jpg", 509);

