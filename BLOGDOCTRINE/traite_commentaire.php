<?php
include ('header.php');

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['utilisateur'])) {
    header('Location: login.php');
    exit;
}

// Vérification si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $billetId = $_POST['billet_id'];
    $contenu = $_POST['contenu'];

    // Récupération du billet et de l'utilisateur
    $billet = $entityManager->find('Billet', $billetId);
    $utilisateur = $_SESSION['utilisateur'];

    // Création d'un nouvel objet Commentaire
    $commentaire = new Commentaire();
    $commentaire->setContenu($contenu);
    $commentaire->setDatetime(new DateTime('now', new DateTimeZone('Europe/Paris')));
    $commentaire->setBillet($billet);
    $commentaire->setUtilisateur($utilisateur);

    // Enregistrement du commentaire dans la base de données
    $entityManager->persist($commentaire);
    $entityManager->flush();

    // Redirection vers la page du billet
    header('Location: billet.php?id=' . $billetId);
    exit;
}