<?php
session_start();

require "../bootstrap.php";

$username = $_POST["username"];
$password = $_POST["password"];

$user = $entityManager->getRepository('Utilisateur')->findOneBy(array('login' => $username));

if ($user && password_verify($password, $user->getPassword())) {
    $_SESSION["username"] = $username;
    header("Location: ../index.php");
} else {
    echo "Mot de passe ou pseudonyme incorrect";
}

?>
