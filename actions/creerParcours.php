<?php
// Inclure le fichier de connexion à la base de données
require('../includes/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire POST
    $nom = $_POST['nom']; // Nom du parcours
    $distance = $_POST['distance']; // Distance du parcours
    $heureDepart = $_POST['heureDepart']; // Heure de départ du parcours
    $idReferent = $_POST['referentId']; // ID du référent sélectionné

    // Préparer une requête SQL pour insérer les informations du parcours dans la table "trail"
    $stmt = $bdd->prepare("INSERT INTO trail (nom, distance, heureDepart, referent_id) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nom, $distance, $heureDepart, $idReferent]);

    // Afficher un message de succès si l'insertion a réussi
    echo "Parcours créé avec succès.";
}
?>