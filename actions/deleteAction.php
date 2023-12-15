<?php
// Connexion à la base de données
require('../includes/database.php');

// Suppression du compte de l'utilisateur
session_start();
$user_id = $_SESSION['id'];
$deleteUser = $bdd->prepare('DELETE FROM utilisateur WHERE idUtilisateur = ?');
$deleteUser->execute(array($user_id));
$_SESSION = array();
session_destroy();
header('Location: ../index.php');
exit;
?>