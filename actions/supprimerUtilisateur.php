<?php
// Connexion à la base de données
require('../includes/database.php');

/*if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["idUtilisateur"])) {
    $idUtilisateur = $_POST["idUtilisateur"];

    // Supprimez l'utilisateur de la base de données
    $stmt = $bdd->prepare("DELETE FROM utilisateur WHERE idUtilisateur = ?");
    $stmt->bindParam(1, $idUtilisateur, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "Utilisateur supprimé avec succès";
    } else {
        echo "Erreur lors de la suppression";
    }
}*/
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["idUtilisateur"])) {
    $idUtilisateur = $_GET["idUtilisateur"];

    $stmt = $bdd->prepare("DELETE FROM chat WHERE user_id = ?");
    $stmt->bindParam(1, $idUtilisateur, PDO::PARAM_INT);
    $stmt->execute();
    
    // Puis supprimez l'utilisateur
    $stmt = $bdd->prepare("DELETE FROM utilisateur WHERE idUtilisateur = ?");
    $stmt->bindParam(1, $idUtilisateur, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "Utilisateur supprimé avec succès";
    } else {
        echo "Erreur lors de la suppression";
    }
}
?>
