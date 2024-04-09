<?php
include ('header.php');

// Récupérer les 3 derniers billets de la base de données
$billets = $entityManager->getRepository('Billet')->findBy(array(), array('datetime' => 'desc'),3);

echo '<h1>Les 3 derniers billets</h1>';
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

    // Afficher les liens "Modifier" et "Supprimer" seulement si l'utilisateur est un administrateur
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
        echo ' | ';
        echo '<a href="archives.php?action=modifier_billet&id=' . $billet->getId() . '">Modifier</a>';
        echo ' | ';
        echo '<form method="POST" action="traite_admin.php" style="display: inline;" onsubmit="return confirm(\'Êtes-vous sûr de vouloir supprimer ce billet ?\');">';
        echo '<input type="hidden" name="action" value="supprimer_billet">';
        echo '<input type="hidden" name="id" value="' . $billet->getId() . '">';
        echo '<input type="submit" value="Supprimer">';
        echo '</form>';
    }
}

// Afficher le lien "Ajouter un billet" seulement si l'utilisateur est un administrateur
if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
    echo '<a href="ajout_billet.php">Ajouter un billet</a>';
}

include ('footer.php');
?>