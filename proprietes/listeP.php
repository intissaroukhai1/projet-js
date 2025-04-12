<?php
include_once "../includes/config.php"; // Connexion DB (PDO)
include_once "../includes/auth.php";   // Auth
 
// Récupérer toutes les propriétés avec PDO
$stmt = $pdo->query("SELECT * FROM proprietes");
$proprietes = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        <a href="ajouterP.php" class="btn-ajout"><i class="fas fa-plus"></i> Ajouter</a>
        

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Adresse</th>
                    <th>Prix</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($proprietes as $row) : ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['titre']) ?></td>
                    <td><?= htmlspecialchars($row['description']) ?></td>
                    <td><?= htmlspecialchars($row['adresse']) ?></td>
                    <td><?= $row['prix'] ?> TND</td>
                    <td>
                        <a href="modifierP.php?id=<?= $row['id'] ?>"><i class="fas fa-edit"></i></a>
                        <a href="supprimerP.php?id=<?= $row['id'] ?>" onclick="return confirmerSuppression();"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>
</html>
