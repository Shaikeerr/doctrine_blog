<?php
session_start();

require "../bootstrap.php";


if (isset($_POST['submit'])) {
    $title_post = $_POST['title_post'];
    $content_post= $_POST['content_post'];

    $user_name = $_SESSION['username'];
    $user_id = $entityManager->getRepository('Utilisateur')->findOneBy(array('login' => $user_name))->getId();

    $message = new Message();
    $message->setTitre($title_post);
    $message->setTexte($content_post);
    $message->setDatepost(new DateTime());
    $message->setUtilisateur($entityManager->getRepository('Utilisateur')->find($user_id));

    $entityManager->persist($message);
    $entityManager->flush();

    header("Location: ../index.php");
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="../Stylesheets/create_post.css">
</head>
<body>
<div class="posts">
<form method="POST" action="">
<a href="../index.php"> 🡄 Retour à l'accueil</a>
    <h2> Créer un post </h2>
        <label for="title_post">Titre Post</label>
        <input type="text" name="title_post" id="title_post" required><br>
        
        <label for="content">Contenu du post :</label>
        <textarea id="content_post" name="content_post" rows="4" required></textarea>

        <input class=submit type="submit" name="submit" value="Poster!">
    </form>
</div>

</body>
</html>