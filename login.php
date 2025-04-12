<?php
session_start();

// Si déjà connecté, rediriger vers index.php
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$message = "";

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Exemple simple d'utilisateur (à remplacer par base de données)
    $valid_user = "admin";
    $valid_pass = "admin123";

    if ($username === $valid_user && $password === $valid_pass) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();
    } else {
        $message = "❌ Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <div class="login-container">
        <h2>Connexion</h2>
        <?php if (!empty($message)) : ?>
            <div class="error-message"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="input-icon">
                <span class="icon">👤</span>
                <input type="text" name="username" placeholder="Nom d'utilisateur" required>
            </div>
            <div class="input-icon">
                <span class="icon">🔒</span>
                <input type="password" name="password" placeholder="Mot de passe" required>
            </div>
            <button type="submit">Se connecter</button>
            <div class="forgot-password">
                <a href="#">🔗 Mot de passe oublié ?</a>
            </div>
        </form>
    </div>
</body>
</html>
