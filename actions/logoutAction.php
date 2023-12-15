<?php
// Déconnexion de l'user
session_start();
$_SESSION = [];
// Destruction de la session 
session_destroy();
// Redirection vers la page login.php
header('Location: ../index.php');
?>