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
    $requete = "SELECT * FROM trail WHERE id=" . $idParcours;
    $resultat = $bdd->query($requete);
    $parcours = $resultat->fetch(PDO::FETCH_ASSOC);
    $resultat->closeCursor();
    ?>

   <main>

    <h1><?php echo $parcours['nom'] ?></h1>
    <p><?php echo $parcours['descriptionParcours'] ?></p>

    <?php
    $requete = "SELECT * FROM utilisateur WHERE idUtilisateur=" . $_SESSION['id'];
    $resultat = $bdd->query($requete);
    $infoUser = $resultat->fetch(PDO::FETCH_ASSOC);
    $resultat->closeCursor();
    ?>

    <form method='post' action='traitementParticipants.php'>
        <div class="ensembleForm">
    <?php
    for ($i=1 ; $i<=$nbParticipants ; $i++) {
        echo "<div class='formParticipant'>
            <p>Participant ".$i." :</p>
            <label>Nom</label>
            <input type='text' name='nom" . $i . "' placeholder='Nom' required";
            if ($i === 1) {
                echo " value='".$infoUser['nomUtilisateur']."'";
            }
            echo ">
            <label>Prénom</label>
            <input type='text' name='prenom".$i."' placeholder='Prénom' required";
            if ($i === 1) {
                echo " value='".$infoUser['prenomUtilisateur']."'";
            }
            echo ">
            <label>Âge</label>
            <input type='number' name='age".$i."' placeholder='Age' required";
            if ($i === 1) {
                echo " value='".$infoUser['ageUtilisateur']."'";
            }
            echo ">
            <label>Email</label>
            <input type='email' name='mail".$i."' placeholder='Adresse e-mail' required";
            if ($i === 1) {
                echo " value='".$infoUser['email']."'";
            }
            echo ">
        </div>";
    }?>
        </div>
        <input class='validParticip' type='submit' name='submit' value='Inscrire'>
    </form>

    </main>

</body>
</html>