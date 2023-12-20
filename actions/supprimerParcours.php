<?php
require('../includes/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idParcours'])) {
    $idParcours = $_POST['idParcours'];

    // Suppression du parcours de la base de données
    $stmt = $bdd->prepare("DELETE FROM trail WHERE id = ?");
    $stmt->execute([$idParcours]);

    echo "Parcours supprimé avec succès.";
}
?>
