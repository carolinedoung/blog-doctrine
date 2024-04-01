<?php 
include ('header.php');

// Vérification si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $login = $_POST['email'];
    $password = $_POST['password'];

    // Vérifiez si un utilisateur avec le même login existe
    $user = $entityManager->getRepository('Utilisateur')->findOneBy(array('login' => $login));

    if ($user && $user->getPasswd() == $password) {
        // Si l'utilisateur existe et que le mot de passe est correct, démarrez une session pour l'utilisateur
        $_SESSION['user'] = array(
            'login' => $user->getLogin(),
            'pseudo' => $user->getPseudo(),
            'role' => $user->getAdmin() ? 'admin' : 'user'
        );

        // Redirigez l'utilisateur vers la page d'accueil ou le tableau de bord de l'administrateur
        header('Location: ' . ($user->getAdmin() ? 'admin.php' : 'index.php'));
        exit;
    } else {
        // Si les informations d'identification sont incorrectes, affichez un message d'erreur
        $_SESSION['error_message'] = "Email ou mot de passe incorrect.";
        header('Location: login.php');
        exit;
    }
}
?>

