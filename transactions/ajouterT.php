<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter Transaction</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/ajouterT.css">
</head>


<?php
include_once "../includes/config.php";

// Charger les clients
$clients = $pdo->query("SELECT id, prenom, nom FROM clients")->fetchAll(PDO::FETCH_ASSOC);

// Charger les propriétés
$proprietes = $pdo->query("SELECT id, titre FROM proprietes")->fetchAll(PDO::FETCH_ASSOC);
?>
<body>
<div class="overlay"></div>
<div class="container mt-5 form-container bg-light p-4 rounded shadow">
    <h2 class="text-center mb-4">Ajouter une Transaction</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="client_id" class="form-label">Client :</label>
            <select class="form-select" name="client_id" id="client_id" required>
                <?php foreach ($clients as $c): ?>
                    <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['prenom'] . ' ' . $c['nom']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="propriete_id" class="form-label">Propriété :</label>
            <select class="form-select" name="propriete_id" id="propriete_id" required>
                <?php foreach ($proprietes as $p): ?>
                    <option value="<?= $p['id'] ?>"><?= htmlspecialchars($p['titre']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="date_transaction" class="form-label">Date de Transaction :</label>
            <input type="date" class="form-control" name="date_transaction" id="date_transaction" required>
        </div>

        <div class="mb-3">
            <label for="montant" class="form-label">Montant (TND) :</label>
            <input type="number" class="form-control" step="0.01" name="montant" id="montant" required>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
