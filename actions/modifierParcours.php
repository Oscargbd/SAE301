<?php
// Connexion à la base de données
require('../includes/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérez les données du formulaire
    $trailId = $_POST['id'];
    $nom = $_POST['nom'];
    $distance = $_POST['distance'];
    $heureDepart = $_POST['heure'];
    $idReferent = $_POST['referentId'];

    // Mise à jour des informations dans la table trail
    $stmt = $bdd->prepare("UPDATE trail SET nom = ?, distance = ?, heureDepart = ?, referent_id = ? WHERE id = ?");
    $stmt->execute([$nom, $distance, $heureDepart, $idReferent, $trailId]);

    echo "Modifications enregistrées avec succès.";
}
?>
