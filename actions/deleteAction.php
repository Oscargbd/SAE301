<?php
// Connexion à la base de données
require('database.php');

// Suppression du compte de l'utilisateur
session_start();
$user_id = $_SESSION['id'];
$deleteUser = $bdd->prepare('DELETE FROM users WHERE id = ?');
$deleteUser->execute(array($user_id));
$_SESSION = array();
session_destroy();
header('Location: ../login.php');
exit;
?>