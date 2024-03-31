<?php
include ('header.php');

// Vérifiez si le formulaire est soumis
if (isset($_POST['username']) && isset($_POST['password'])) {
    // récupérez les données du formulaire en utilisant le nom de l'attribut de l'élément comme clé
    $username = $_POST['username'];
    $password = $_POST['password'];

    // TODO: Vous devriez récupérer les données de l'utilisateur de votre base de données ici en fonction du nom d'utilisateur
    // puis vérifiez si le mot de passe est correct. Pour simplifier, nous vérifions simplement
    // contre des valeurs codées en dur ici.
    if ($username === 'admin' && $password === 'password') {
        $_SESSION['username'] = $username;
        header('Location: dashboard.php'); // redirige vers le tableau de bord si la connexion est réussie
        exit;
    } else {
        $error_message = "Nom d'utilisateur ou mot de passe invalide!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion</h2>

    <?php if (isset($error_message)): ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <form method="post" action="login.php">
        <label for="username">Nom d'utilisateur:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Mot de passe:</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Connexion">
    </form>
</body>
</html>