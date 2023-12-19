<?php
// Connexion à la base de données
require('../includes/database.php');

if ($_POST) {

    $idUtilisateur = $_POST['idUtilisateur'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $nomUtilisateur = $_POST['nomUtilisateur'];
    $prenomUtilisateur = $_POST['prenomUtilisateur'];
    $ageUtilisateur = $_POST['ageUtilisateur'];
    $role = $_POST['role'];

    // Préparation de la requête pour éviter les injections SQL
    $stmt = $bdd->prepare("UPDATE utilisateur SET username = :userName, email = :email, nomUtilisateur = :nomUtilisateur, prenomUtilisateur = :prenomUtilisateur, ageUtilisateur = :ageUtilisateur, role = :role WHERE idUtilisateur = :idUtilistateur");
    $stmt->bindValue(':userName', $username);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':nomUtilisateur', $nomUtilisateur);
    $stmt->bindValue(':prenomUtilisateur', $prenomUtilisateur);
    $stmt->bindValue(':ageUtilisateur', $ageUtilisateur);
    $stmt->bindValue(':role', $role);
    $stmt->bindValue(':idUtilistateur', $idUtilisateur, PDO::PARAM_INT);
    $success = $stmt->execute();

    echo ($_POST['idUtilisateur']);

    if (!$stmt->execute()) {
        error_log("Erreur lors de la mise à jour: " . implode(";", $stmt->errorInfo()));
        echo "Erreur lors de la mise à jour";
        exit;
    } else {
        echo "Modification réussie";
    }
}
