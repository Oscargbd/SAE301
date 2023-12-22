<?php
// Connexion à la base de données
require('../includes/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérez les données du formulaire
    $idParticipant = $_POST['idParticipant'];
    $nomParticipant = $_POST['nomParticipant'];
    $prenomParticipant = $_POST['prenomParticipant'];
    $ageParticipant = $_POST['ageParticipant'];
    $mailParticipant = $_POST['mailParticipant']; // Assurez-vous que le nom de l'attribut 'name' dans votre formulaire HTML est 'emailParticipant'
    $parcoursParticipant = $_POST['parcoursParticipant']; // Assurez-vous que le nom de l'attribut 'name' dans votre formulaire HTML est 'idTrail'

    // Préparation de la requête pour mettre à jour les informations du participant
    $stmt = $bdd->prepare("UPDATE participant SET nomParticipant = ?, prenomParticipant = ?, ageParticipant = ?, mailParticipant = ?, idTrail = ? WHERE idParticipant = ?");
    $stmt->execute([$nomParticipant, $prenomParticipant, $ageParticipant, $mailParticipant, $parcoursParticipant, $idParticipant]);

    if ($stmt) {
        echo "Informations du participant mises à jour avec succès.";
    } else {
        echo "Erreur lors de la mise à jour des informations.";
    }
}
?>
