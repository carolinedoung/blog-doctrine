<?php
include ('header.php');

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id'])) {
    // Rediriger l'utilisateur vers la page de connexion
    header('Location: login.php');
    exit();
}

    // Récupérer les valeurs du formulaire
    $billetId = $_POST['billet_id'];
    $contenu = $_POST['contenu'];

    // Afficher la valeur de $_SESSION['id']
    echo "ID de l'utilisateur dans la session : ";
    var_dump($_SESSION['id']);

    // Récupérer l'utilisateur connecté
    echo "Avant la récupération de l'utilisateur<br>";
    $utilisateur = $entityManager->getRepository('Utilisateur')->find($_SESSION['id']);
    echo "Après la récupération de l'utilisateur<br>";
    var_dump($utilisateur);

    // Récupérer le billet associé
    $billet = $entityManager->getRepository('Billet')->find($billetId);

    if ($billet === null) {
        echo "Le billet n'existe pas dans la base de données.";
        exit;
    }

    // Créer un nouvel objet Commentaire
    $commentaire = new Commentaire();

    // Remplir l'objet Commentaire avec les valeurs du formulaire
    $commentaire->setContenu($contenu);
    $commentaire->setBillet($entityManager->find('Billet', $billetId));
    $commentaire->setUtilisateur($utilisateur);
    $commentaire->setDatetime(new DateTime('now', new DateTimeZone('Europe/Paris')));

    // Enregistrer l'objet Commentaire dans la base de données
    $entityManager->persist($commentaire);
    $entityManager->flush();

// Rediriger l'utilisateur vers la page du billet
header('Location: billet.php?id=' . $billetId);
?>