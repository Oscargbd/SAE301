<?php
// Inclure le fichier de connexion à la base de données
require('../includes/database.php');

// Vérifier si la requête HTTP est de type POST et si l'ID du parcours est défini
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idParcours'])) {
    // Récupérer l'ID du parcours à supprimer depuis les données POST
    $idParcours = $_POST['idParcours'];

    // Préparer une requête SQL pour supprimer le parcours de la base de données en utilisant son ID
    $stmt = $bdd->prepare("DELETE FROM trail WHERE id = ?");
    
    // Exécuter la requête SQL avec l'ID du parcours
    $stmt->execute([$idParcours]);

    // Afficher un message de succès après la suppression du parcours
    echo "Parcours supprimé avec succès.";
}
?>
