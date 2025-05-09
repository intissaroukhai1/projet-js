<?php
include_once "../includes/config.php"; // Connexion DB (PDO)
//include_once "../includes/auth.php";   // Authentification

// Récupérer tous les clients
$stmt = $pdo->query("SELECT * FROM clients");
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Clients</title>
    <link rel="stylesheet" href="../assets/css/styleC.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="client.js" defer></script>
</head>
<body>
    <div class="container">
        <h1>Liste des Clients</h1>
        <a href="ajouterC.php" class="btn-ajout"><i class="fas fa-plus"></i> Ajouter</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $row) : ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['nom']) ?></td>
                    <td><?= htmlspecialchars($row['prenom']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['telephone']) ?></td>
                    <td>
                        <a href="modifierC.php?id=<?= $row['id'] ?>"><i class="fas fa-edit"></i></a>
                        <a href="supprimerC.php?id=<?= $row['id'] ?>" onclick="return confirmerSuppression();"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
