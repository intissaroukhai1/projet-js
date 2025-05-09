<?php
session_start(); // Démarre la session
include_once "../includes/config.php"; // Connexion DB (PDO)

// Vérification du rôle de l'utilisateur
if (!isset($_SESSION['role'])) {
    // Rediriger l'utilisateur vers la page de login s'il n'est pas connecté
    header("Location: ../index.php");
    exit();
}

// Récupérer toutes les propriétés avec PDO
$stmt = $pdo->query("SELECT * FROM proprietes");

// Vérifier si des propriétés existent
if ($stmt->rowCount() > 0) {
    $proprietes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $proprietes = []; // Si aucune propriété, on crée un tableau vide
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Propriétés</title>
    <link rel="stylesheet" href="../assets/css/styleP.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="scriptP.js" defer></script>
</head>
<body>
    <div class="container">
        <h1>Liste des Propriétés</h1>
        
        <!-- Afficher le bouton d'ajout uniquement pour l'admin -->
        <?php if ($_SESSION['role'] === 'admin'): ?>
            <a href="ajouterP.php" class="btn-ajout"><i class="fas fa-plus"></i> Ajouter</a>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Adresse</th>
                    <th>Prix</th>
                    <?php if ($_SESSION['role'] === 'admin'): ?>
            <th>Actions</th>
        <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($proprietes)) : ?>
                    <?php foreach ($proprietes as $row) : ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= htmlspecialchars($row['titre']) ?></td>
                        <td><?= htmlspecialchars($row['description']) ?></td>
                        <td><?= htmlspecialchars($row['adresse']) ?></td>
                        <td><?= $row['prix'] ?> TND</td>
                        <td>
                            <!-- Afficher les liens de modification et suppression uniquement pour l'admin -->
                            <?php if ($_SESSION['role'] === 'admin'): ?>
                                
                                <a href="modifierP.php?id=<?= $row['id'] ?>"><i class="fas fa-edit"></i></a>
                                <a href="supprimerP.php?id=<?= $row['id'] ?>" onclick="return confirmerSuppression();"><i class="fas fa-trash-alt"></i></a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6">Aucune propriété disponible</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="scriptP.js"></script>
</body>
</html>
