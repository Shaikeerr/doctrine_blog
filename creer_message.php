<?php 

$datetime = new DateTime();

require_once "bootstrap.php";

$message = new Message();

$utilisateur_login_set = $entityManager->find('Utilisateur', 1);

$message->setTexte("Hello World");
$message->setDatepost($datetime);
$message->setUtilisateur($utilisateur_login_set);

$entityManager->persist($message);
$entityManager->flush();

echo "Message créé avec l'id " . $message->getId() . "\n";

?>