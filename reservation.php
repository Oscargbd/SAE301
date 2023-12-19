<!DOCTYPE html>
<html lang="fr">

<?php include('includes/head.php') ?>

<body>
    <?php
    include('includes/navbar.php');
    
    $nbParticipants = $_POST['nbParticipants'];
    $_SESSION['nbParticipants'] = $nbParticipants;
    $idParcours = $_GET["id"];
    include('includes/database.php');
    $requete = "SELECT * FROM parcours WHERE idParcours=" . $idParcours;
    $resultat = $bdd->query($requete);
    $parcours = $resultat->fetch(PDO::FETCH_ASSOC);
    $resultat->closeCursor();
    ?>

   <main>

    <h1><?php echo $parcours['nomParcours'] ?></h1>
    <p><?php echo $parcours['descriptionParcours'] ?></p>

    <?php
    for ($i=1 ; $i<=$nbParticipants ; $i++) {
        echo "<form method='post' action='traitementParticipants.php'>
        <div class='formParticipant'>
            <p>Participant ".$i." :</p>
            <input type='text' name='nom".$i."' placeholder='Nom' required>
            <input type='text' name='prenom".$i."' placeholder='Prénom' required>
            <input type='number' name='age".$i."' placeholder='Age' required>
            <input type='email' name='mail".$i."' placeholder='Adresse e-mail' required>
            <input type='tel' name='tel".$i."' placeholder='Numéro de téléphone' required>
        </div>";
    }?>
        <input class='validBleu' type='submit' name='submit' value='Inscrire'>
    </form>

    </main>

</body>
</html>