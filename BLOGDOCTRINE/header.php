<?php 

include ('bootstrap.php');
header("Access-Control-Allow-Origin: *");

session_start(); 

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Doca Blog</title>
    <link rel="stylesheet" href="./src/index.css">
    <link rel="stylesheet" href="./src/header.css">
</head>

<body>
    <nav>
        <a class="link-accueil" href="index.php">Accueil</a>
        <ul>
            <li><a href="archives.php">Archives</a></li>
            <?php
            if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
                echo '<li><a href="admin.php">Panel Admin</a></li>';
            }
            ?>
            <li><a href="inscription.php">Inscription</a></li> 
            <?php
            if (isset($_SESSION['login'])) {
                echo '<li><a href="logout.php">Déconnexion</a></li>';
            } else {
                echo '<li><a href="login.php">Connexion</a></li>';
            }
            ?>
        </ul>
    </nav>
</body>
</html>
