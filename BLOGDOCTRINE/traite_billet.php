<?php 
include ('header.php');

// Vérifier si l'utilisateur est connecté et est l'administrateur
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    // Si l'utilisateur n'est pas l'administrateur, rediriger vers la page d'accueil
    header('Location: index.php');
    exit;
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Créer un nouveau billet
    $billet = new Billet();
    $billet->setTitre($_POST['titre']);
    $billet->setContenu($_POST['contenu']);
    $billet->setDatetime(new \DateTime());
    $billet->setUtilisateur($entityManager->getRepository('Utilisateur')->find($_SESSION['user']['id']));

    // Ajouter le billet à la base de données
    $entityManager->persist($billet);
    $entityManager->flush();

    // Rediriger vers la page des billets
    header('Location: index.php');
    exit;
}

?>

















?>
