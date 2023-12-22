<?php
// Inclure le fichier de connexion à la base de données
require('../includes/database.php');

// Vérifier si la requête HTTP est de type POST et si l'ID du participant est défini
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idParticipant'])) {
    // Récupérer l'ID du participant à supprimer depuis les données POST
    $idParticipant = $_POST['idParticipant'];

    // Préparation de la requête SQL pour supprimer le participant de la base de données en utilisant son ID
    $stmt = $bdd->prepare("DELETE FROM participant WHERE idParticipant = ?");
    
    // Exécuter la requête SQL avec l'ID du participant
    $stmt->execute([$idParticipant]);

    // Vérifier si la suppression a réussi ou non
    if ($stmt) {
        echo "Participant supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression du participant.";
    }
}
?>

