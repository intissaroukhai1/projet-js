<?php
include_once "../includes/config.php";
include_once "../includes/auth.php";
//include_once "../assets/js/scriptP.js";

$message = "";

// Lorsqu'on envoie le formulaire
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $adresse = $_POST['adresse'];
    $prix = $_POST['prix'];

    $stmt = $pdo->prepare("INSERT INTO proprietes (titre, description, adresse, prix) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$titre, $description, $adresse, $prix])) {
        // Redirection après ajout réussi
        header("Location: listeP.php?success=1");
        
        exit();
    } else {
        $message = "Erreur lors de l'ajout.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Propriété</title>
    <link rel="stylesheet" href="../assets/css/styleAP.css">
</head>
<body>
    <div class="container">
        <h1>Ajouter une Propriété</h1>

        <?php if ($message): ?>
            <p class="message-erreur"><?= $message ?></p>
        <?php endif; ?>

        <form method="POST" class="form-ajout">
            <input type="text" name="titre" placeholder="Titre" required>
            <textarea name="description" placeholder="Description" required></textarea>
            <input type="text" name="adresse" placeholder="Adresse" required>
            <input type="number" step="0.01" name="prix" placeholder="Prix (TND)" required>

            <div class="form-actions">
                <button type="submit">Ajouter</button>
                <a href="listeP.php" class="btn-retour">Retour</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="scriptP.js"></script>
</body>
</html>
