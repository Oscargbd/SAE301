<?php
// Inclure le fichier de connexion à la base de données
require('../includes/database.php');

// Vérifier si la requête HTTP est de type POST et si l'ID de l'utilisateur est défini
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["idUtilisateur"])) {
    // Récupérer l'ID de l'utilisateur à supprimer depuis les données POST
    $idUtilisateur = $_POST["idUtilisateur"];

    // Préparation de la requête SQL pour supprimer les messages de chat associés à l'utilisateur
    $stmt = $bdd->prepare("DELETE FROM chat WHERE user_id = ?");
    $stmt->bindParam(1, $idUtilisateur, PDO::PARAM_INT);
    $stmt->execute();

    // Ensuite, préparer une requête SQL pour supprimer l'utilisateur lui-même
    $stmt = $bdd->prepare("DELETE FROM utilisateur WHERE idUtilisateur = ?");
    $stmt->bindParam(1, $idUtilisateur, PDO::PARAM_INT);

    // Exécuter la requête SQL de suppression de l'utilisateur
    if ($stmt->execute()) {
        echo "Utilisateur supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression.";
    }
}
?>

