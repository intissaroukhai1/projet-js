<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de Bord</title>
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2>🏠 ImmoDash</h2>
            <ul>
                <li><a href="dashboard.php"><i class="fas fa-home"></i> Accueil</a></li>
                <li><a href="proprietes/listeP.php"><i class="fas fa-building"></i> Propriétés</a></li>
                <li><a href="clients/listeC.php"><i class="fas fa-users"></i> Clients</a></li>
                <li><a href="transactions/listeT.php"><i class="fas fa-exchange-alt"></i> Transactions</a></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>
            </ul>
        </aside>

        <!-- Main content -->
        <main class="content">
            <h1>Bienvenue, <?= htmlspecialchars($_SESSION['username']) ?> 👋</h1>
            <p>Cette page est concernant les statistiques📊.</p>

            
        </main>
    </div>
</body>
</html>