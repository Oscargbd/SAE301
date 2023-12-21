<?php
require('../includes/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idParticipant'])) {
    $idParticipant = $_POST['idParticipant'];

    // Préparation de la requête pour éviter les injections SQL
    $stmt = $bdd->prepare("DELETE FROM participant WHERE idParticipant = ?");
    $stmt->execute([$idParticipant]);

    if ($stmt) {
        echo "Participant supprimé avec succès";
    } else {
        echo "Erreur lors de la suppression du participant";
    }
}
