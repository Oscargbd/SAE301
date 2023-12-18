<!DOCTYPE html>
<html lang="fr">

<?php include('includes/head.php') ?>

<body>
    <?php
    include('includes/navbar.php');
    
    $nbParticipants = $_POST['nbParticipants'];
    $idParcours = $_GET["id"];
    include('includes/database.php');
    $requete = "SELECT * FROM parcours WHERE idParcours=" . $idParcours;
    $resultat = $bdd->query($requete);
    $parcours = $resultat->fetch(PDO::FETCH_ASSOC);
    $resultat->closeCursor();
    ?>

   

    <h1><?php echo $parcours['nomParcours'] ?></h1>
    <p><?php echo $parcours['descriptionParcours'] ?></p>

    <?php
    for ($i=1 ; $i<=$nbParticipants ; $i++) {
        echo "<form method='post' action=''>
        <div class='formParticipant'>
            <p>Participant ".$i." :</p>
            <input type='text' name='nom' placeholder='Nom' required>
            <input type='text' name='prenom' placeholder='Prénom' required>
            <input type='number' name='age' placeholder='Age' required>
            <input type='email' name='mail' placeholder='Adresse e-mail' required>
            <input type='tel' name='tel' placeholder='Numéro de téléphone' required>
        </div>
        ";
    }
    echo "<input class='validBleu' type='submit' value='Inscrire'>
    </form>"
    ?>

    

</body>
</html>