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
    image VARCHAR(255),
    prix SMALLINT
);

INSERT INTO matelas
(name, marque, taille, largeur, longueur, matiere, image, prix)
VALUES
("Pas touché", "Epeda", "1P", 90, 190, "ressorts", "https://www.lematelas.fr/media/catalog/product/cache/58d42f0437f84cb6a87786e02b22b5a3/m/a/matelas_epeda_ressorts_multi_air_poudre_fond_blanc.webp", 529),
("Lapin", "Dreamway", "1P", 90, 190, "latex", "https://www.lematelas.fr/media/catalog/product/cache/58d42f0437f84cb6a87786e02b22b5a3/n/o/noe_ambiance_1.webp", 709),
("Alejandrinho", "Bultex", "2P", 140, 190, "ressorts", "https://www.lematelas.fr/media/catalog/product/cache/58d42f0437f84cb6a87786e02b22b5a3/p/u/pureness.webp", 529),
("Papy", "Epeda", "2P", 160, 190, "Mousse", "https://www.lematelas.fr/media/catalog/product/cache/58d42f0437f84cb6a87786e02b22b5a3/s/o/sommier_d_co_gris_universel_15cm_pieds_inclus_presente_avec_matelas__1.webp", 509),

