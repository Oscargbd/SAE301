<?php
// Inclure le fichier de connexion à la base de données
require('../includes/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire POST
    $nomParticipant = $_POST['nomParticipant']; // Nom du participant
    $prenomParticipant = $_POST['prenomParticipant']; // Prénom du participant
    $ageParticipant = $_POST['ageParticipant']; // Âge du participant
    $emailParticipant = $_POST['emailParticipant']; // Adresse e-mail du participant
    $idTrail = $_POST['idTrail']; // ID du parcours associé au participant
    $idUtilisateur = $_POST['idUtilisateur']; // ID de l'utilisateur associé au participant

    // Préparation de la requête SQL pour insérer les données du participant dans la table "participant"
    $stmt = $bdd->prepare("INSERT INTO participant (nomParticipant, prenomParticipant, ageParticipant, mailParticipant, idTrail, idUtilisateur) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$nomParticipant, $prenomParticipant, $ageParticipant, $emailParticipant, $idTrail, $idUtilisateur]);

    // Vérifier si l'insertion a réussi et afficher un message en conséquence
    if ($stmt) {
        echo "Participant créé avec succès.";
    } else {
        echo "Erreur lors de la création du participant.";
    }
}
