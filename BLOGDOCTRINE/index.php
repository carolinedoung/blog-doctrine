<?php
include ('header.php');

// Récupérer les 3 derniers billets de la base de données
$billets = $entityManager->getRepository('Billet')->findBy(array(), array('datetime' => 'desc'),3);

// Afficher les billets
foreach ($billets as $billet) {
    echo '<h2>' . $billet->getTitre() . '</h2>';
    echo '<p>' . $billet->getContenu() . '</p>';
    
    $utilisateur = $billet->getUtilisateur();
    if ($utilisateur !== null) {
        echo '<p>Posté par ' . $utilisateur->getPseudo() . ' le ';
    } else {
        echo '<p>Posté par un utilisateur inconnu le ';
    }
    
    $datetime = $billet->getDatetime();
    if ($datetime) {
        echo $datetime->format('d/m/Y H:i');
    } else {
        echo 'Date inconnue';
    }
    echo '</p>';

    echo '<a href="billet.php?id=' . $billet->getId() . '">Lire la suite</a>';
}

// Afficher le lien "Ajouter un billet" seulement si l'utilisateur est un administrateur
if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
    echo '<a href="ajout_billet.php">Ajouter un billet</a>';
}
?>