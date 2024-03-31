<?php
require_once 'bootstrap.php';

// Obtenir le dépôt pour la classe Message
$messageRepository = $entityManager->getRepository('Message');

// Obtenir tous les messages
$messages = $messageRepository->findAll();

// Parcourir et afficher tous les messages
foreach ($messages as $message) {
    echo $message->getUtilisateur()->getLogin() . " : ";
    echo "Message : " . $message->getTexte() . "<br>";
    echo "Heure : " . $message->getDatetime()->format('Y-m-d H:i:s') . "<br><br>";
}