<?php
// Connexion à la base de données
require('../includes/database.php');
echo '<script>alert("toto")</script>';

if ($_POST) {

    error_log("Données reçues: " . print_r($_POST, true));

    $idUtilisateur = $_POST['idUtilisateur'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    // Récupérez d'autres champs ici selon les besoins

    // Préparation de la requête pour éviter les injections SQL
    $stmt = $bdd->prepare("UPDATE utilisateur SET username = :userName, email = :email WHERE idUtilisateur = :idUtilistateur");
    $stmt->bindValue(':userName', $username);
    $stmt->bindValue(':email', $email);
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
