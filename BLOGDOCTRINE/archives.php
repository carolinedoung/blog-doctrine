<?php
include ('header.php');

if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin' && isset($_GET['id'])) {
    // Afficher le formulaire de modification pour le billet spécifique
    $billet = $entityManager->getRepository('Billet')->find($_GET['id']);

    if ($billet !== null) {
        echo '<a href="archives.php">Retour aux archives</a>';
        echo '<h1>Modifier le billet</h1>';
        echo '<form method="POST" action="traite_admin.php">';
        echo '<input type="hidden" name="action" value="modifier">';
        echo '<input type="hidden" name="id" value="' . $billet->getId() . '">';
        echo '<label for="titre">Titre :</label>';
        echo '<input type="text" id="titre" name="titre" value="' . $billet->getTitre() . '">';
        echo '<label for="contenu">Contenu :</label>';
        echo '<textarea id="contenu" name="contenu">' . $billet->getContenu() . '</textarea>';
        echo '<input type="submit" value="Modifier">';
        echo '</form>';
    } else {
        echo 'Billet non trouvé.';
    }
} else {

// Récupérer tous les billets de la base de données
$billets = $entityManager->getRepository('Billet')->findAll();

echo '<h1>Archives</h1>';

// Parcourir tous les billets
foreach ($billets as $billet) {
    // Afficher le titre du billet
    echo '<h2>' . $billet->getTitre() . '</h2>';

    // Afficher un extrait du contenu du billet
    echo '<p>' . substr($billet->getContenu(), 0, 100) . '...</p>';

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
    
    // Afficher le lien "Modifier" seulement si l'utilisateur est un administrateur
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
        echo '<form method="POST" action="traite_admin.php" onsubmit="return confirm(\'Êtes-vous sûr de vouloir supprimer ce billet et tous ses commentaires ?\');">';
        echo '<input type="hidden" name="action" value="supprimer">';
        echo '<input type="hidden" name="id" value="' . $billet->getId() . '">';
        echo '<input type="submit" value="Supprimer">';
        echo '</form>';

        echo '<a href="archives.php?action=modifier_billet&id=' . $billet->getId() . '">Modifier</a>';   
    }
}
    
    // Afficher le lien "Ajouter un billet" seulement si l'utilisateur est un administrateur
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
        echo '<a href="ajout_billet.php">Ajouter un billet</a>';
    }

}
?>