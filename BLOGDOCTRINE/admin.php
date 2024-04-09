<?php
include ('header.php');

if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
    // Récupérer tous les utilisateurs et les commentaires de la base de données
    $utilisateurs = $entityManager->getRepository('Utilisateur')->findAll();
    $commentaires = $entityManager->getRepository('Commentaire')->findAll();
    $billets = $entityManager->getRepository('Billet')->findAll();

    // Afficher un tableau pour chaque utilisateur
    echo '<table>';
    echo '<h1>Utilisateurs</h1>';
    echo '<tr><th>Pseudo</th><th>Login</th><th>Action</th></tr>';
    foreach ($utilisateurs as $utilisateur) {
        echo '<tr>';
        echo '<td>' . $utilisateur->getPseudo() . '</td>';
        echo '<td>' . $utilisateur->getLogin() . '</td>';
        echo '<td>';
        echo '<form method="POST" action="traite_admin.php" onsubmit="return confirm(\'Êtes-vous sûr de vouloir supprimer cet utilisateur ?\');">';
        echo '<input type="hidden" name="action" value="supprimer_utilisateur">';
        echo '<input type="hidden" name="id" value="' . $utilisateur->getId() . '">';
        echo '<input type="submit" value="Supprimer">';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';

    // Afficher un tableau pour chaque commentaire
    echo '<table>';
    echo '<h1>Commentaires</h1>';
    echo '<tr><th>Pseudo</th><th>Billet associé</th><th>Contenu</th><th>Action</th></tr>';
    foreach ($commentaires as $commentaire) {
        echo '<tr>';
        echo '<td>' . $commentaire->getUtilisateur()->getPseudo() . '</td>';
        echo '<td><a href="billet.php?id=' . $commentaire->getBillet()->getId() . '">' . $commentaire->getBillet()->getTitre() . '</a></td>';
        echo '<td>' . $commentaire->getContenu() . '</td>';
        echo '<td>';
        echo '<form method="POST" action="traite_admin.php" onsubmit="return confirm(\'Êtes-vous sûr de vouloir supprimer ce commentaire ?\');">';
        echo '<input type="hidden" name="action" value="supprimer_commentaire">';
        echo '<input type="hidden" name="id" value="' . $commentaire->getId() . '">';
        echo '<input type="submit" value="Supprimer">';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';

    // Afficher un tableau pour chaque billet
    echo '<table>';
    echo '<h1>Billets</h1>';
    echo '<tr><th>Titre</th><th>Contenu</th><th>Action</th></tr>';
    foreach ($billets as $billet) {
        echo '<tr>';
        echo '<td>' . $billet->getTitre() . '</td>';
        echo '<td>' . $billet->getContenu() . '</td>';
        echo '<td>';
        echo '<form method="POST" action="traite_admin.php" onsubmit="return confirm(\'Êtes-vous sûr de vouloir supprimer ce billet ?\');">';
        echo '<input type="hidden" name="action" value="supprimer_billet">';
        echo '<input type="hidden" name="id" value="' . $billet->getId() . '">';
        echo '<input type="submit" value="Supprimer">';
        echo ' | ';
        echo '<a href="archives.php?action=modifier_billet&id=' . $billet->getId() . '">Modifier</a>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    header('Location: index.php');
    exit;
}
?>