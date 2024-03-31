<?php
require_once 'bootstrap.php';

// Récupérer l'utilisateur avec l'ID 1
$utilisateur = $entityManager->find('Utilisateur', 1);

if ($utilisateur === null) {
    echo "Utilisateur non trouvé.\n";
    exit(1);
}

// Créer un nouveau message
$message = new Message();
$texte = "Ceci est mon premier message.";
$dateTime = new DateTime('now');

$message->setTexte($texte);
$message->setDatetime($dateTime);

// Attribuer le message à l'utilisateur 1
$message->setUtilisateur($utilisateur);

// Persister et flusher le message
$entityManager->persist($message);
$entityManager->flush();

echo "Le nouveau message est " . $message->getTexte();
// $message = new Message();
// $message2 = new Message();
// $message3 = new Message();
// $Texte = "Bonjour, c'est mon premier message.";
// $dateTime = new DateTime('now');
// $Texte2 = "Bonjour, c'est mon second message.";
// $dateTime2 = new DateTime('now');
// $Texte3 = "Bonjour, c'est mon troisième message.";
// $dateTime3 = new DateTime('now');


// $message->setTexte($Texte);
// $message2->setTexte($Texte2);
// $message3->setTexte($Texte3);
// $message->setDatetime($dateTime);
// $message2->setDatetime($dateTime2);
// $message3->setDatetime($dateTime3);




// $entityManager->persist($message);
// $entityManager->flush();

// $entityManager->persist($message2);
// $entityManager->flush();

// $entityManager->persist($message3);
// $entityManager->flush();

// echo "Le nouveau message est " . $message->getTexte();
// echo "Le nouveau message est " . $message2->getTexte();
// echo "Le nouveau message est " . $message3->getTexte();