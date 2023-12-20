<?php
session_start();
if (isset($_POST["submit"])) {
    include('../includes/database.php');

    $nbParticipants = $_SESSION['nbParticipants'];
    $idTrail = $_GET['id'];

    for ($i = 1; $i <= $nbParticipants; $i++) {
        $nom = $_POST['nom' . $i];
        $prenom = $_POST['prenom' . $i];
        $age = $_POST['age' . $i];
        $mail = $_POST['mail' . $i];

        // Utiliser une requête préparée pour insérer les données dans la base de données
        $requete = $bdd->prepare(
            "INSERT INTO participant(nomParticipant, prenomParticipant, ageParticipant, mailParticipant, idUtilisateur, idTrail) VALUES (?, ?, ?, ?, ?, ?)"
        );

        // Exécuter la requête avec les valeurs correspondantes
        $requete->execute([$nom, $prenom, $age, $mail, $_SESSION['id'], $idTrail]);
    }

    // Fermer la connexion à la base de données
    $bdd = null;
    header('Location:../compte.php');
}
?>