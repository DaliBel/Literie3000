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
    <span>Prix : <?= $mat["prix"] ?></span>
</div>
<?php
}

?>

</div>