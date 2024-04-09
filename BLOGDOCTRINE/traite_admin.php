<?php
include ('header.php');

if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
    $action = $_POST['action'];
    $id = $_POST['id'];

    $billet = $entityManager->find('Billet', $id);

    if ($action == 'modifier') {
        // Récupérer les nouvelles valeurs du titre et du contenu du billet à partir des données POST
        $titre = $_POST['titre'];
        $contenu = $_POST['contenu'];

        // Mettre à jour le billet dans la base de données
        $billet->setTitre($titre);
        $billet->setContenu($contenu);
        $entityManager->flush();

        // Redirection vers la page archives
        header('Location: archives.php');
        exit;
    } elseif ($action == 'supprimer') {
        // Récupérez tous les commentaires associés au billet
        $commentaires = $entityManager->getRepository('Commentaire')->findBy(array('billet' => $billet));

        // Suppression chaque commentaire
        foreach ($commentaires as $commentaire) {
            $entityManager->remove($commentaire);
        }

        // Suppression billet de la base de données
        $entityManager->remove($billet);
        $entityManager->flush();

        // Redirection vers la page archives
        header('Location: archives.php');
        exit;
    }
} else {
    header('Location: index.php');
    exit;
}

?>