<?php
if (!empty($_POST)) {
    $name = trim(strip_tags($_POST["name"]));
    $marque = trim(strip_tags($_POST["marque"]));
    $taille = trim(strip_tags($_POST["taille"]));
    $largeur = trim(strip_tags($_POST["largeur"]));
    $longueur = trim(strip_tags($_POST["longueur"]));
    $matiere = trim(strip_tags($_POST["matiere"]));
    $picture = trim(strip_tags($_POST["picture"]));
    $prix = trim(strip_tags($_POST["prix"]));

    $errors = [];

    if (empty($name)) {
        $errors["name"] = "Le nom est obligatoire";
    }

    // Gestion de l'upload de la photo 
    if (isset($_FILES["picture"]) && $_FILES["picture"]["error"] === UPLOAD_ERR_OK) {

        $fileTmpPath = $_FILES["picture"]["tmp_name"];
        $fileName = $_FILES["picture"]["name"];
        $fileType = $_FILES["picture"]["type"];
        $fileNameArray = explode(".", $fileName);
        $fileExtension = end($fileNameArray);
        $newFileName = md5($fileName . time()) . "." . $fileExtension;
        $fileDestPath = "./img/matelas/{$newFileName}";

        $allowedTypes = array("image/jpeg", "image/png", "image/webp");
        if (in_array($fileType, $allowedTypes)) {
            move_uploaded_file($fileTmpPath, $fileDestPath);
        } else {
            // Le type de fichier est incorrect
            $errors["picture"] = "Le type de fichier est incorrect (.jpg, .png, ou . webp requis)";
        }
    }
    // Requête d'insertion en BDD de la référence s'il n'y a aucune erreur
    if (empty($errors)) {
        // Connexion à la base literie3000
        $dsn = "mysql:host=localhost;dbname=literie3000";
        $db = new PDO($dsn, "root", "");

        $query = $db->prepare("INSERT INTO matelas (name, marque, taille, largeur, longueur, matiere, picture, prix) VALUES (:name, :marque, :taille, :largeur, :longueur, :matiere, :picture, :prix)");
        $query->bindParam(":name", $name);
        $query->bindParam(":marque", $marque);
        $query->bindParam(":taille", $taille);
        $query->bindParam(":largeur", $largeur);
        $query->bindParam(":longueur", $longueur);
        $query->bindParam(":matiere", $matiere);
        $query->bindParam(":picture", $picture);
        $query->bindParam(":prix", $prix);

        if ($query->execute()) {
            header("Location: index.php");
        }
    }
}

include("templates/header.php");
?>

<h1>Ajouter une référence au catalogue</h1>
<form action="" method="post" enctype="multipart/form-data">

    <!-- NAME -->
    <div class="form-group">
        <label for="inputName">Nom du produit :</label>
        <input type="text" id="inputName" name="name" value="<?= isset($name) ? $name : "" ?>">
        <?php
        if (isset($errors["name"])) {
        ?>
            <span class="info-error"> <?= $errors["name"] ?> </span>
        <?php
        }
        ?>
    </div>

    <!-- marque -->

    <div class="form-group">
        <label for="inputMarque">Marque du produit :</label>
        <input type="text" id="inputMarque" name="marque" value="<?= isset($marque) ? $marque : "" ?>">
        <?php
        if (isset($errors["marque"])) {
        ?>
            <span class="info-error"> <?= $errors["marque"] ?> </span>
        <?php
        }
        ?>
    </div>

    <!-- TAILLE -->
    <div class="form-group">
        <label for="selectTaille">Choisissez une taille :</label>
        <select name="taille" id="selectTaille">
            <option value="1P" <?= isset($taille) && $taille === "1P" ? "selected" : "" ?>>1 personne</option>
            <option value="2P" <?= isset($taille) && $taille === "2P" ? "selected" : "" ?>>2 personnes</option>

        </select>
    </div>

    <!-- PICTURE -->
    <div class="form-group">
        <label for="inputPicture">Photo du produit :</label>
        <input type="file" id="inputPicture" name="picture" value="<?= isset($picture) ? $picture : "" ?>">
        <?php
        if (isset($errors["picture"])) {
        ?>
            <span class="info-error"><?= $errors["picture"] ?></span>
        <?php
        }
        ?>
    </div>

    <!-- LARGEUR ET LONGUEUR -->
    <div class="form-group">
        <label for="selectLargeur">Choisissez une largeur :</label>
        <select name="largeur" id="selectLargeur">
            <option value="90" <?= isset($largeur) && $largeur === "90" ? "selected" : "" ?>>90cm</option>
            <option value="140" <?= isset($largeur) && $largeur === "140" ? "selected" : "" ?>>140cm</option>
            <option value="160" <?= isset($largeur) && $largeur === "160" ? "selected" : "" ?>>160cm</option>
        </select>
    </div>

    <div class="form-group">
        <label for="selectLongueur">Choisissez une longueur :</label>
        <select name="longueur" id="selectLongueur">
            <option value="190" <?= isset($longueur) && $longueur === "190" ? "selected" : "" ?>>190cm</option>
            <option value="200" <?= isset($longueur) && $longueur === "200" ? "selected" : "" ?>>200cm</option>
        </select>
    </div>

    <!-- MATIERE -->
    <div class="form-group">
        <label for="selectMatiere">Choisissez une matière :</label>
        <select name="matiere" id="selectMatiere">
            <option value="ressorts" <?= isset($matiere) && $matiere === "ressorts" ? "selected" : "" ?>>Ressorts</option>
            <option value="latex" <?= isset($matiere) && $matiere === "latex" ? "selected" : "" ?>>Latex</option>
            <option value="mousse" <?= isset($matiere) && $matiere === "mousse" ? "selected" : "" ?>>Mousse</option>
        </select>
    </div>

    <!-- PRIX -->
    <div class="form-group">
        <label for="inputPrix">Prix :</label>
        <input type="number" name="prix" id="inputPrix" value="<?= isset($prix) ? $prix : 0 ?>">
    </div>

    <!-- SUBMIT -->
    <input type="submit" value="Ajouter la référence" class="btn-matelas">
