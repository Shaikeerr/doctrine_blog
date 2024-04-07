<?php
session_start();

require "../bootstrap.php";

$username = $_POST["username"];
$mail = $_POST["mail"];
$password = $_POST["password"];
$password = password_hash($password, PASSWORD_DEFAULT);

$utilisateur = new Utilisateur();
$utilisateur->setLogin($username);
$utilisateur->setMail($mail);
$utilisateur->setPassword($password);

$entityManager->persist($utilisateur);
$entityManager->flush();


header("Location: ../index.php"); 

$db = null;

?>