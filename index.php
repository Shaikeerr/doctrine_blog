<?php

require "bootstrap.php";

session_start();

$message_list = $entityManager->getRepository('Message')->findAll(); 
$message_list = array_reverse($message_list);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="Stylesheets/styles.css">
</head>
<body>
    <div class="login">
        <?php
            if (isset($_SESSION["username"])) {
                echo "<p class='login_info'> Bienvenue " . $_SESSION["username"] . "</p>";
                echo "<a class='login_info' href='logout.php'>Se déconnecter</a>";
            } else {
                echo "<p class='login_info'> Vous n'êtes pas connecté </p>";
                echo "<div class='login_query'>";
                echo "<a class='login_info' href='login.php'>Se connecter</a>";
                echo "<a class='login_info' href='register.php'>S'inscrire</a>";
                echo "</div>";
            }
        ?>
    </div>

    <div class="header">
        <img src="backgrounds/logo.png" alt="logo">
        <?php
            if (isset($_SESSION["username"])) {
                echo "<a class='create_post' href='Create/create_post.php'>Créer un post</a>";
            } else {
                echo "<p class='create_post'> Vous devez être connecté pour créer un post </p>";
            }
        ?>
    </div>

    <div class="posts">
        <h2>Les derniers posts</h2>
        <?php foreach ($message_list as $post) { ?>
            <div class="post" >
            <a href="post.php?id=<?php echo $post->getId()?>">
            <h1><?php echo $post->getTitre() ?></h1>
            <p><?php echo $post->getTexte() ?></p>
            <p class="user">Posté par <?php echo $post->getUtilisateur()->getLogin() . " le " . $post->getDatepost()->format('d/m/Y à H:i') ?></p>

            </a>
            </div>
        <?php }
        
        ?>


    </div>

    <p class="footer"> Blog Crée par Noah Calmette - BUT MMI2 - 2023/2024</p>


</body>
</html>