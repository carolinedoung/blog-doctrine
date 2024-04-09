<?php 
include ('header.php');
var_dump($_SESSION);
if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {    
} else {
    header('Location: index.php');
    exit;
}

?>

<form method="POST" action="traite_billet.php">
    <label for="titre">Titre:</label>
    <input type="text" id="titre" name="titre">
    <label for="contenu">Contenu:</label>
    <textarea id="contenu" name="contenu"></textarea>
    <input type="submit" value="Ajouter un billet">
</form>

<?php
include ('footer.php');
?>
