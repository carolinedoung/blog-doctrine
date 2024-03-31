<?php
include ('header.php');
?>

<section id="inscription">

    <h1>Inscription</h1>

    <?php if (isset($_SESSION['error_message'])): ?>
        <p style="color: red;"><?php echo $_SESSION['error_message']; ?></p>
        <?php unset($_SESSION['error_message']);?>
    <?php endif; ?>

    <form method="POST" action="traite_inscription.php">
        <label for="email">Email :</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="pseudo">Pseudo :</label><br>
        <input type="text" id="pseudo" name="pseudo" required><br>
        <label for="password">Mot de passe :</label><br>
        <input type="password" id="password" name="password" required><br>
        <label for="password_confirm">Confirmer le mot de passe :</label><br>
        <input type="password" id="password_confirm" name="password_confirm" required><br>
        <input type="submit" value="Inscription">
    </form>

</section>