<?php 
include ('header.php');

// Vérification si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // écupération données du formulaire
    $login = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $pseudo = $_POST['pseudo'];

    // Vérifiez si le premier mot de passe est le même que le deuxième
    if ($password !== $password_confirm) {
        $_SESSION['error_message'] = "Les mots de passe ne correspondent pas.";
        header('Location: inscription.php');
        exit;
    }

    // Vérifiez si un utilisateur avec le même pseudo ou email existe déjà
    $existingUser = $entityManager->getRepository('Utilisateur')->findOneBy(array('login' => $login));

    if ($existingUser) {
        // Si un utilisateur avec le même email existe déjà, affichez un message d'erreur et arrêtez l'exécution du script
        $_SESSION['error_message'] = "Un utilisateur avec le même email existe déjà.";
        header('Location: inscription.php');
        exit;
    }

    $existingUser = $entityManager->getRepository('Utilisateur')->findOneBy(array('pseudo' => $pseudo));

    if ($existingUser) {
        // Si un utilisateur avec le même pseudo existe déjà, affiche un message d'erreur et arrêtez l'exécution du script
        $_SESSION['error_message'] = "Un utilisateur avec le même pseudo existe déjà.";
        header('Location: inscription.php');
        exit;
    }

    // Créez une nouvelle instance de l'entité Utilisateur
    $user = new Utilisateur();
    $user->setLogin($login);
    $user->setPasswd($password);
    $user->setPseudo($pseudo);
    $user->setAdmin(0); // Définir 'admin' à 0 par défaut

    // Utilisez Doctrine pour insérer le nouvel utilisateur dans la base de données
    $entityManager->persist($user);
    $entityManager->flush();

    // redirection vers la page de connexion
    header('Location: login.php');
    exit;
}
?>