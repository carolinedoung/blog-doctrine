<?php
include ('header.php');

    // Récupérer l'ID du billet à partir du paramètre GET
    $billetId = $_GET['id'];

    // Récupérer le billet de la base de données
    $billet = $entityManager->find('Billet', $billetId);

    // Afficher le billet
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

    // Ajouter le formulaire de commentaire ici
    echo '<form method="POST" action="traite_commentaire.php">';
    echo '<input type="hidden" name="billet_id" value="' . $billet->getId() . '">';
    echo '<textarea name="contenu" required></textarea>';
    echo '<button type="submit">Ajouter un commentaire</button>';
    echo '</form>';

    // Récupérer tous les commentaires pour ce billet
    $commentaires = $entityManager->getRepository('Commentaire')->findBy(array('billet' => $billetId));
    // var_dump($commentaires);

    // Parcourir tous les commentaires
    foreach ($commentaires as $commentaire) {
        // Récupérer l'utilisateur qui a posté le commentaire
        $utilisateur = $commentaire->getUtilisateur();
        // var_dump($utilisateur);

        // Afficher le commentaire
        echo "Commentaire : " . $commentaire->getContenu() . "<br>";

        // Vérifier si l'utilisateur est null
        if ($utilisateur !== null) {
            // Si l'utilisateur n'est pas null, afficher son pseudo
            echo "Posté par : " . $utilisateur->getPseudo() . "<br>";
        } else {
            // Si l'utilisateur est null, afficher un message d'erreur
            echo "Posté par : Utilisateur inconnu<br>";
        }

        // Récupérer et afficher la date et l'heure du commentaire
        $datetime = $commentaire->getDatetime();
        if ($datetime) {
            echo "Le : " . $datetime->format('d/m/Y H:i') . "<br>";
        } else {
            echo "Date inconnue<br>";
        }

        echo "<hr>";
}

?>