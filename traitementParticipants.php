<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    include('includes/head.php');
    ?>
    <title>Traitement inscription</title>
</head>
<body>
<?php
include('includes/navbar.php');
?>


<?php
if (isset($_POST["submit"])) {
    include('includes/database.php');

    // Récupérer le nombre de participants de la session
    $nbParticipants = $_SESSION['nbParticipants'];

    // Utiliser une boucle pour traiter chaque participant
    for ($i = 1; $i <= $nbParticipants; $i++) {
        // Construire les noms des champs en fonction du numéro ($i)
        $nom = $_POST['nom' . $i];
        $prenom = $_POST['prenom' . $i];
        $age = $_POST['age' . $i];
        $mail = $_POST['mail' . $i];

        // Utiliser une requête préparée pour insérer les données dans la base de données
        $requete = $bdd->prepare(
            "INSERT INTO participant(nomParticipant, prenomParticipant, ageParticipant, mailParticipant, idUtilisateur) VALUES (?, ?, ?, ?, ?)"
        );

        // Exécuter la requête avec les valeurs correspondantes
        $requete->execute([$nom, $prenom, $age, $mail, $_SESSION['id']]);
    }

    // Fermer la connexion à la base de données
    $bdd = null;
    header('Location:compte.php');
}
?>    
</body>
</html>