<?php 

include ('bootstrap.php');
header("Access-Control-Allow-Origin: *");

session_start(); 

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Le meilleur blog du monde </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="archives.php">Archives</a></li>
            <?php
            if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin') {
                echo '<li><a href="admin.php">Panel Admin</a></li>';
            }
            ?>
            <li><a href="inscription.php">Inscription</a></li> <!-- Toujours afficher le lien Inscription -->
            <?php
            if (isset($_SESSION['user'])) {
                echo '<li><a href="logout.php">Déconnexion</a></li>';
            } else {
                echo '<li><a href="login.php">Connexion</a></li>';
            }
            ?>
        </ul>
    </nav>
</body>