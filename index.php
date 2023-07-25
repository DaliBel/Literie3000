<?php
// Connexion à la base de données literie3000
$dsn = "mysql:host=localhost;dbname=literie300";
$db = new PDO($dsn, "root", "");

// Récupérer les produits de la table matelas
$query = $db->query("SELECT id, name, marque, taille, largeur, longueur, matiere image, prix FROM matelas");
// Récupérer les résultats au format tableau associatif
$matelas = $query->fetchAll(PDO::FETCH_ASSOC);

?>