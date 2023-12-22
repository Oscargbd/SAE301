<?php
// Démarrer la session
session_start();

// Vérifier si le formulaire a été soumis
if (isset($_POST["submit"])) {
    // Inclure le fichier de connexion à la base de données
    include('../includes/database.php');

    // Récupérer le nombre de participants depuis la session
    $nbParticipants = $_SESSION['nbParticipants'];

    // Récupérer l'ID du parcours depuis les paramètres GET
    $idTrail = $_GET['id'];

    // Boucler à travers les participants et récupérer leurs données depuis le formulaire
    for ($i = 1; $i <= $nbParticipants; $i++) {
        $nom = $_POST['nom' . $i];
        $prenom = $_POST['prenom' . $i];
        $age = $_POST['age' . $i];
        $mail = $_POST['mail' . $i];

        // Utiliser une requête préparée pour insérer les données du participant dans la base de données
        $requete = $bdd->prepare(
            "INSERT INTO participant(nomParticipant, prenomParticipant, ageParticipant, mailParticipant, idUtilisateur, idTrail) VALUES (?, ?, ?, ?, ?, ?)"
        );

        // Exécuter la requête SQL avec les valeurs correspondantes
        $requete->execute([$nom, $prenom, $age, $mail, $_SESSION['id'], $idTrail]);
    }

    // Fermer la connexion à la base de données
    $bdd = null;

    // Rediriger l'utilisateur vers la page de compte après l'ajout des participants
    header('Location:../compte.php');
}
?>
