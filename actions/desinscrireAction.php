<?php
session_start(); // Démarrer la session

if (isset($_POST["desinscrire"])) {
    include('../includes/database.php');

    $idParticipant = $_POST['idParticipant'];

    // Utiliser une requête préparée pour supprimer le participant de la base de données
    $requete = $bdd->prepare("DELETE FROM participant WHERE idParticipant = ?");
    $requete->execute([$idParticipant]);

    // Fermer la connexion à la base de données
    $bdd = null;
    
    // Rediriger l'utilisateur vers la page de compte après la désinscription
    header('Location:../compte.php');
}
?>
