<?php

include("templates/header.php");
// Vérifiez si l'ID du produit est présent dans l'URL
if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $mat_id = $_GET["id"];

    // Connexion à la base de données literie3000
    $dsn = "mysql:host=localhost;dbname=literie3000";
    $db = new PDO($dsn, "root", "");

    // Récupérer les détails du produit à partir de la base de données en fonction de l'ID
    $query = $db->prepare("SELECT * FROM matelas WHERE id = :mat_id");
    $query->bindParam(":mat_id", $mat_id);
    $query->execute();
    $mat = $query->fetch(PDO::FETCH_ASSOC);

    // Vérifier si le produit existe dans la base de données
    if ($mat) {
        // Afficher les détails du produit
        echo "<h1>Détails du produit : {$mat['name']}</h1>";
        echo "<p>Marque : {$mat['marque']}</p>";
        echo "<p>Taille : {$mat['taille']}</p>";
        echo "<p>Photo du produit : </p><img src='img/matelas/{$mat['picture']}'>";

              // Formulaire de suppression du produit
              echo "<form action='delete_reference.php' method='post'>";
              echo "<input type='hidden' name='mat_id' value='{$mat['id']}'>";
              echo "<button type='submit'>Supprimer la référence</button>";
              echo "</form>";
    } else {
        echo "Erreur";
    }
    
}
