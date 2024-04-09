<?php 
include ('header.php');

// Vérifiez si l'utilisateur est un administrateur
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header('Location: index.php');
    exit;
}

// Vérification si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];

    // // Récupération de l'utilisateur 'admin'
    $utilisateur = $entityManager->getRepository('Utilisateur')->findOneBy(array('admin' => 1));
    var_dump($utilisateur);
    
    if ($utilisateur === null) {
        echo "L'utilisateur admin n'existe pas dans la base de données.";
        exit;
    }
    
    // Création d'un nouvel objet Billet
    $billet = new Billet();
    $billet->setTitre($titre);
    $billet->setContenu($contenu);
    // $billet->setDatetime(new DateTime());
    $billet->setUtilisateur($utilisateur);  // Définir l'utilisateur
    $billet->setDatetime(new DateTime('now', new DateTimeZone('Europe/Paris')));

    // Enregistrement du billet dans la base de données
    $entityManager->persist($billet);
    $entityManager->flush();

    // Redirection vers la page d'accueil
    header('Location: index.php');
    exit;
}

?>