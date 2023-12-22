<?php
// Inclure le fichier de connexion à la base de données
require('../includes/database.php');

// Vérifier si des données POST ont été soumises
if ($_POST) {
    // Récupérer les données POST
    $idUtilisateur = $_POST['idUtilisateur']; // ID de l'utilisateur à mettre à jour
    $username = $_POST['username'];
    $email = $_POST['email'];
    $nomUtilisateur = $_POST['nomUtilisateur'];
    $prenomUtilisateur = $_POST['prenomUtilisateur'];
    $ageUtilisateur = $_POST['ageUtilisateur'];
    $role = $_POST['role'];

    // Préparation de la requête SQL pour mettre à jour l'utilisateur
    $stmt = $bdd->prepare("UPDATE utilisateur SET username = :userName, email = :email, nomUtilisateur = :nomUtilisateur, prenomUtilisateur = :prenomUtilisateur, ageUtilisateur = :ageUtilisateur, role = :role WHERE idUtilisateur = :idUtilisateur");

    // Liaison des valeurs aux paramètres dans la requête SQL
    $stmt->bindValue(':userName', $username);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':nomUtilisateur', $nomUtilisateur);
    $stmt->bindValue(':prenomUtilisateur', $prenomUtilisateur);
    $stmt->bindValue(':ageUtilisateur', $ageUtilisateur);
    $stmt->bindValue(':role', $role);
    $stmt->bindValue(':idUtilisateur', $idUtilisateur, PDO::PARAM_INT); // Spécifiez que l'ID est un entier

    // Exécutez la requête SQL et stockez le résultat dans $success
    $success = $stmt->execute();

    // Vérifiez si la mise à jour a réussi ou non
    if (!$success) {
        error_log("Erreur lors de la mise à jour: " . implode(";", $stmt->errorInfo())); // Journal des erreurs
        echo "Erreur lors de la mise à jour";
        exit;
    } else {
        echo "Modification réussie";
    }
}
?>
