<?php 
include ('header.php');

if ($_SESSION['admin'] == 1) {
    
} else {
    header('Location: index.php');
    exit;
}

?>

<form method="post" action="traite_billet.php">
    <label for="titre">Titre:</label>
    <input type="text" id="titre" name="titre">
    <label for="contenu">Contenu:</label>
    <textarea id="contenu" name="contenu"></textarea>
    <input type="submit" value="Ajouter un billet">
</form>

