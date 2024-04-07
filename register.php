<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="Stylesheets/register_login.css">
</head>
<body>
    <div class="form">
        <a href="index.php"> 🡄 Retour à l'accueil</a>
        <h2>S'inscrire</h2>
        <form action="Connexions/register_connexion.php" method="post">
            <label for="username">Pseudonyme:</label>
            <input type="text" id="username" name="username" required><br>
            <label for="username">Adresse mail:</label>
            <input type="mail" id="mail" name="mail" required><br>
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required><br>
            <input class=submit type="submit" value="S'inscrire">
        </form>
    </div>
</body>
</html>