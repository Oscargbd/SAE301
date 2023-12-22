<!DOCTYPE html>
<html lang="fr">

<?php include('includes/head.php') ?>

<body>
    <?php
    include('includes/navbar.php');

    $nbParticipants = $_POST['nbParticipants'];
    $_SESSION['nbParticipants'] = $nbParticipants;
    $idTrail = $_GET["id"];
    include('includes/database.php');
    $requete = "SELECT * FROM trail WHERE id=" . $idTrail;
    $resultat = $bdd->query($requete);
    $parcours = $resultat->fetch(PDO::FETCH_ASSOC);
    $resultat->closeCursor();
    ?>

   <main>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#007CA6" fill-opacity="1" d="M0,160L80,144C160,128,320,96,480,106.7C640,117,800,171,960,197.3C1120,224,1280,224,1360,224L1440,224L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path></svg>
    <h1 class='hautPage'><?php echo $parcours['nom'] ?></h1>

        <?php
        $requete = "SELECT * FROM utilisateur WHERE idUtilisateur=" . $_SESSION['id'];
        $resultat = $bdd->query($requete);
        $infoUser = $resultat->fetch(PDO::FETCH_ASSOC);
        $resultat->closeCursor();
        ?>

    <form method='post' action='actions/traitementParticipants.php?id=<?php echo $idTrail; ?>'>
        <div class="ensembleForm">
    <?php
    for ($i=1 ; $i<=$nbParticipants ; $i++) {
        echo "<div class='formParticipant'>
            <p>Participant ".$i." :</p>
            <label>Nom</label>
            <input type='text' name='nom" . $i . "' placeholder='Nom' required";
                    if ($i === 1) {
                        echo " value='" . $infoUser['nomUtilisateur'] . "'";
                    }
                    echo ">
            <label>Prénom</label>
            <input type='text' name='prenom" . $i . "' placeholder='Prénom' required";
                    if ($i === 1) {
                        echo " value='" . $infoUser['prenomUtilisateur'] . "'";
                    }
                    echo ">
            <label>Âge</label>
            <input type='number' name='age" . $i . "' placeholder='Age' required";
                    if ($i === 1) {
                        echo " value='" . $infoUser['ageUtilisateur'] . "'";
                    }
                    echo ">
            <label>Email</label>
            <input type='email' name='mail" . $i . "' placeholder='Adresse e-mail' required";
                    if ($i === 1) {
                        echo " value='" . $infoUser['email'] . "'";
                    }
                    echo ">
        </div>";
                } ?>
            </div>
            <input class='validParticip' type='submit' name='submit' value='Inscrire'>
        </form>

    </main>
        <?php
        include('includes/footer.php');
        ?>
</body>

</html>