<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["mat_id"])) {
        $mat_id = $_POST["mat_id"];

        // Connexion à la base de données literie3000
        $dsn = "mysql:host=localhost;dbname=literie3000";
        $db = new PDO($dsn, "root", "");

        // Requête de suppression du produit
        $query = $db->prepare("DELETE FROM matelas WHERE id = :mat_id");
        $query->bindParam(":mat_id", $mat_id);

        if ($query->execute()) {
            // Redirection vers la page d'accueil ou une page de confirmation de suppression
            header("Location: index.php");
            exit();
        } else {
            // Gérer l'échec de la suppression
            echo "La suppression du produit a échoué.";
        }
    }
}
?>
