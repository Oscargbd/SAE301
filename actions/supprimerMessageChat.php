<?php
// Inclure le fichier de connexion à la base de données
require('../includes/database.php');

// Vérifier si la requête HTTP est de type POST et si l'ID du chat est défini
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idChat'])) {
    // Récupérer l'ID du chat à supprimer depuis les données POST
    $idChat = $_POST['idChat'];

    // Préparer une requête SQL pour supprimer le message de chat en utilisant son ID
    $stmt = $bdd->prepare("DELETE FROM chat WHERE idChat = ?");
    
    // Exécuter la requête SQL avec l'ID du chat
    $stmt->execute([$idChat]);

    // Vérifier si la suppression a réussi ou non
    if ($stmt) {
        echo "Message supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression du message.";
    }
}
?>
