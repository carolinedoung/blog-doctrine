<?php
include ('header.php');

// Récupérez l'identifiant du billet de l'URL ou d'un champ caché
$billetId = $_GET['billet_id'];

// Utilisez l'identifiant pour récupérer le billet de la base de données
$billet = $entityManager->find('Billet', $billetId);

if (!$billet) {
    // Gérez le cas où le billet n'existe pas
    exit;
}
?>

<form method="POST" action="traite_commentaire">
    <input type="hidden" name="billet_id" value="<?php echo $billet->getId(); ?>">
    <textarea name="contenu" required></textarea>
    <button type="submit">Ajouter un commentaire</button>
</form>