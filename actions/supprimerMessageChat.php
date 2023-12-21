<?php
require('../includes/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idChat'])) {
    $idChat = $_POST['idChat'];

    $stmt = $bdd->prepare("DELETE FROM chat WHERE idChat = ?");
    $stmt->execute([$idChat]);

    if ($stmt) {
        echo "Message supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression du message.";
    }
}
?>
