<?php
// Connexion à la base de données
require('../includes/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $distance = $_POST['distance'];
    $heureDepart = $_POST['heureDepart'];
    $idReferent = $_POST['referentId']; // ID du référent sélectionné

    // Insérer les informations du parcours
    $stmt = $bdd->prepare("INSERT INTO trail (nom, distance, heureDepart, referent_id) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nom, $distance, $heureDepart, $idReferent]);

    echo "Parcours créé avec succès.";
}
?>
