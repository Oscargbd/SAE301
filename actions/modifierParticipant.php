<?php
// Inclure le fichier de connexion à la base de données
require('../includes/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire

    // ID du participant
    $idParticipant = $_POST['idParticipant'];

    // Nom du participant
    $nomParticipant = $_POST['nomParticipant'];

    // Prénom du participant
    $prenomParticipant = $_POST['prenomParticipant'];

    // Âge du participant
    $ageParticipant = $_POST['ageParticipant'];

    // Adresse e-mail du participant
    $mailParticipant = $_POST['mailParticipant'];

    // ID du parcours du participant
    $parcoursParticipant = $_POST['parcoursParticipant'];

    // Préparation de la requête SQL pour mettre à jour les informations du participant
    $stmt = $bdd->prepare("UPDATE participant SET nomParticipant = ?, prenomParticipant = ?, ageParticipant = ?, mailParticipant = ?, idTrail = ? WHERE idParticipant = ?");
    
    // Exécution de la requête SQL avec les valeurs
    $stmt->execute([$nomParticipant, $prenomParticipant, $ageParticipant, $mailParticipant, $parcoursParticipant, $idParticipant]);

    // Vérification si la mise à jour a réussi ou non
    if ($stmt) {
        echo "Informations du participant mises à jour avec succès.";
    } else {
        echo "Erreur lors de la mise à jour des informations.";
    }
}
?>
