<?php
// Inclure le fichier de connexion à la base de données
require('../includes/database.php');

// Suppression du compte de l'utilisateur

// Démarrer la session pour accéder à la variable de session "id"
session_start();

// Récupérer l'ID de l'utilisateur connecté depuis la session
$user_id = $_SESSION['id'];

// Préparer une requête SQL pour supprimer l'utilisateur de la base de données
$deleteUser = $bdd->prepare('DELETE FROM utilisateur WHERE idUtilisateur = ?');

// Exécuter la requête SQL pour supprimer l'utilisateur en utilisant son ID
$deleteUser->execute(array($user_id));

// Effacer toutes les données de la session
$_SESSION = array();

// Détruire la session
session_destroy();

// Rediriger l'utilisateur vers la page d'accueil après la suppression du compte
header('Location: ../index.php');
exit;
?>
