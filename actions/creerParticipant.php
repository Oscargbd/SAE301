<?php
// Connexion à la base de données
require('../includes/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomParticipant = $_POST['nomParticipant'];
    $prenomParticipant = $_POST['prenomParticipant'];
    $ageParticipant = $_POST['ageParticipant'];
    $emailParticipant = $_POST['emailParticipant'];
    $idTrail = $_POST['idTrail'];
    $idUtilisateur = $_POST['idUtilisateur'];

    // Préparation de la requête pour insérer les données
    $stmt = $bdd->prepare("INSERT INTO participant (nomParticipant, prenomParticipant, ageParticipant, mailParticipant, idTrail, idUtilisateur) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$nomParticipant, $prenomParticipant, $ageParticipant, $emailParticipant, $idTrail, $idUtilisateur]);

    if ($stmt) {
        echo "Participant créé avec succès.";
    } else {
        echo "Erreur lors de la création du participant.";
    }
}
?>
