<?php
require('../includes/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idParticipant = $_POST['idParticipant'];
    $nomParticipant = $_POST['nomParticipant'];
    $prenomParticipant = $_POST['prenomParticipant'];
    $ageParticipant = $_POST['ageParticipant'];
    // ... autres champs ...

    $stmt = $bdd->prepare("UPDATE participant SET nomParticipant = ?, prenomParticipant = ?, ageParticipant = ? WHERE idParticipant = ?");
    $stmt->execute([$nomParticipant, $prenomParticipant, $ageParticipant, $idParticipant]);

    echo "Informations du participant mises à jour avec succès.";
}
?>
