<?php
include_once "../includes/config.php";
include_once "../includes/auth.php";
//include_once "../assets/js/scriptP.js";

// Récupération de l'ID passé en GET
$id = $_GET['id'];

// Requête pour récupérer la propriété à modifier
$stmt = $pdo->prepare("SELECT * FROM proprietes WHERE id = ?");
$stmt->execute([$id]);
$propriete = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $adresse = $_POST['adresse'];
    $prix = $_POST['prix'];

    // Requête de mise à jour
    $update = $pdo->prepare("UPDATE proprietes SET titre = ?, description = ?, adresse = ?, prix = ? WHERE id = ?");
    $update->execute([$titre, $description, $adresse, $prix, $id]);

    header("Location: listeP.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Propriété</title>
    <link rel="stylesheet" href="../assets/css/modifierP.css">
</head>
<body>
    <div class="container">
        <h1>Modifier la Propriété</h1>
        <form method="POST">
    <label>Titre :</label>
    <input type="text" name="titre" value="<?= htmlspecialchars($propriete['titre']) ?>" required>

    <label>Description :</label>
    <textarea name="description" required><?= htmlspecialchars($propriete['description']) ?></textarea>

    <label>Adresse :</label>
    <input type="text" name="adresse" value="<?= htmlspecialchars($propriete['adresse']) ?>" required>
    
    <label>Prix (TND) :</label>
    <input type="number" step="0.01" name="prix" value="<?= $propriete['prix'] ?>" required>

    <button type="submit">Enregistrer</button>
</form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="scriptP.js"></script>
</body>
</html>
