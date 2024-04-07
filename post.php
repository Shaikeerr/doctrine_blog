<?php



require "bootstrap.php";

session_start();

if (isset($_GET['id'])) {
    $page_id = $_GET['id'];
}

$post = $entityManager->getRepository('Message')->findOneBy(array('id' => $page_id));




?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="stylesheets/style_post.css">
</head>
<body>
<?php

?>
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
<div class="retour">
    <a href="index.php">🡄 Retour à l'accueil</a>
</div>

    <div class="header">
        <div class="post" >
        <h1><?php echo $post->getTitre(); ?></h1>
        <p><?php echo $post->getTexte(); ?></p>
        <p class="user">Posté par <?php echo $post->getUtilisateur()->getLogin() . " le " . $post->getDatepost()->format('d/m/Y à H:i'); ?></p> 
        </div>
    </div>

    

    <div class="comments">
        <h2>Commentaires</h2>
        <?php
        $commentaires = $entityManager->getRepository('Commentaire')->findBy(array('message' => $post->getId()));
        foreach ($commentaires as $commentaire) {
            echo "<div class='comment'>";
            echo "<p>" . $commentaire->getTexte() . "</p>";
            echo "<p class='user'>Commenté par " . $commentaire->getUtilisateur()->getLogin() . " le " . $commentaire->getDatepost()->format('d/m/Y à H:i') . "</p>";
            echo "</div>";
        }
        ?>
    </div>
    <div class="comment_add">
    <?php
    if (isset($_SESSION["username"])) {
        echo "<form method='POST' action='Create/create_comment.php'>";
        echo "<input type='hidden' name='id_post' value='" . $post->getId() . "'>";
        echo "<label for='content_comment'>Ajouter un commentaire :</label>";
        echo "<textarea id='content_comment' name='content_comment' rows='4' required></textarea>";
        echo "<input class=submit type='submit' name='submit' value='Commenter!'>";
        echo "</form>";
    } else {
        echo "<p>Vous devez être connecté pour commenter</p>";
    };
    ?>

</body>


