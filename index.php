<?php
// Connexion à la base de données literie3000
$dsn = "mysql:host=localhost;dbname=literie3000";
$db = new PDO($dsn, "root", "");

// Récupérer les produits de la table matelas
$query = $db->query("SELECT id, name, marque, taille, largeur, longueur, matiere, picture, prix FROM matelas");
// Récupérer les résultats au format tableau associatif
$matelas = $query->fetchAll(PDO::FETCH_ASSOC);

// Inclure le header
include("templates/header.php");

?>
<h1>Nos dernières nouveautés</h1>


<div class="matelas">

<?php
foreach ($matelas as $mat) {
?>
<div class="mat">
    <img src="img/matelas/<?= $mat["picture"] ?>" alt="">
    <h2>
        <?= $mat["name"] ?>
    </h2>
    <p>Taille : <?= $mat["taille"] ?></p>
    <p>Largeur : <?= $mat["largeur"] ?> cm</p>
    <p>Longueur : <?= $mat["longueur"] ?> cm</p>
    <span>Prix : <?= $mat["prix"] ?> €</span>
    <p>
    <a href="afficher_produit.php?id=<?= $mat["id"] ?>" target="_blank" class="btn"> Afficher le produit </a>
    </p>
</div>
<?php
}

?>

<!-- Bouton "Ajouter un produit" -->

</div>
<div style="justify-content: center;"><a href="add_reference.php" class="btn">Ajouter une référence</a>
</div>
