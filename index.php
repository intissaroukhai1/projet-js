<?php 
session_start();



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $valid_user = "admin";
    $valid_pass = "admin123";

    if ($username === $valid_user && $password === $valid_pass) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $message = "❌ Nom d'utilisateur ou mot de passe incorrect.";
    }
}



session_destroy(); // ❗ TEMPORAIRE pour test

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body class="bg-image">


<?php if (isset($_GET['logout'])): ?>
    <div class="alert alert-warning text-center">
        🔒 Vous avez été déconnecté avec succès.
    </div>
<?php endif; ?>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="login-container bg-white bg-opacity-75 p-4 rounded shadow text-center">
            <h2 class="mb-4">Connexion</h2>
            <?php if (!empty($message)) : ?>
                <div class="alert alert-danger"><?= htmlspecialchars($message) ?></div>
            <?php endif; ?>
            <form method="POST" action="">
                <div class="input-group mb-3">
                    <span class="input-group-text">👤</span>
                    <input type="text" class="form-control" name="username" placeholder="Nom d'utilisateur" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">🔒</span>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" required>
                    <button type="button" class="btn btn-outline-secondary" id="togglePassword">👁</button>
                </div>
                <button type="submit" class="btn btn-primary w-100">Se connecter</button>
                <div class="mt-3">
                    <a href="#" class="text-decoration-none">🔗 Mot de passe oublié ?</a>
                </div>
            </form>
        </div>
    </div>

    <script src="assets/js/login.js"></script>
</body>
</html>
