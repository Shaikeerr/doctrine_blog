<?php
session_start();
require "../bootstrap.php";

if (isset($_POST['submit'])) {
    $comment = $_POST['content_comment'];
    $user_name = $_SESSION['username'];
    $user_id = $entityManager->getRepository('Utilisateur')->findOneBy(array('login' => $user_name))->getId();
    $message_id = $_POST['id_post'];
    $message = $entityManager->getRepository('Message')->findOneBy(array('id' => $message_id));
    $commentaire = new Commentaire();
    $commentaire->setTexte($comment);
    $commentaire->setUtilisateur($entityManager->getRepository('Utilisateur')->find($user_id));
    $commentaire->setMessage($message);
    $commentaire->setDatepost(new DateTime());

    $entityManager->persist($commentaire);
    $entityManager->flush();
    header("Location: ../post.php?id=" . $message_id);
}

?>