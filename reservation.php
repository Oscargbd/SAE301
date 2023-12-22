<!DOCTYPE html>
<html lang="fr">

<?php include('includes/head.php') ?>
<title>Réservation</title>

<body>
    <?php
    include('includes/navbar.php');

    // Récupération du nombre de participants depuis un formulaire précédent
    $nbParticipants = $_POST['nbParticipants'];

    // Stockage du nombre de participants dans la session
    $_SESSION['nbParticipants'] = $nbParticipants;

    // Récupération de l'identifiant du parcours depuis la variable GET
    $idTrail = $_GET["id"];

    // Inclusion du fichier de connexion à la base de données
    include('includes/database.php');

    // Requête pour récupérer les détails du parcours en fonction de son ID
    $requete = "SELECT * FROM trail WHERE id=" . $idTrail;
    $resultat = $bdd->query($requete);
    $parcours = $resultat->fetch(PDO::FETCH_ASSOC);
    $resultat->closeCursor();
    ?>

    <main>
        <!-- Barre SVG décorative -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#007CA6" fill-opacity="1" d="M0,160L80,144C160,128,320,96,480,106.7C640,117,800,171,960,197.3C1120,224,1280,224,1360,224L1440,224L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path>
        </svg>
        <h1 class='hautPage'><?php echo $parcours['nom'] ?></h1>

        <?php
        // Requête pour récupérer les informations de l'utilisateur actuellement connecté
        $requete = "SELECT * FROM utilisateur WHERE idUtilisateur=" . $_SESSION['id'];
        $resultat = $bdd->query($requete);
        $infoUser = $resultat->fetch(PDO::FETCH_ASSOC);
        $resultat->closeCursor();
        ?>

        <form method='post' action='actions/traitementParticipants.php?id=<?php echo $idTrail; ?>'>
            <div class="ensembleForm">
                <?php
                // Boucle pour créer des champs de formulaire en fonction du nombre de participants
                for ($i = 1; $i <= $nbParticipants; $i++) {
                    echo "<div class='formParticipant'>
                            <p>Participant " . $i . " :</p>
                            <label>Nom</label>
                            <input type='text' name='nom" . $i . "' placeholder='Nom' required";
                    // Remplissage automatique des champs si c'est le premier participant
                    if ($i === 1) {
                        echo " value='" . $infoUser['nomUtilisateur'] . "'";
                    }
                    echo ">
                            <label>Prénom</label>
                            <input type='text' name='prenom" . $i . "' placeholder='Prénom' required";
                    // Remplissage automatique des champs si c'est le premier participant
                    if ($i === 1) {
                        echo " value='" . $infoUser['prenomUtilisateur'] . "'";
                    }
                    echo ">
                            <label>Âge</label>
                            <input type='number' name='age" . $i . "' placeholder='Âge' required";
                    // Remplissage automatique des champs si c'est le premier participant
                    if ($i === 1) {
                        echo " value='" . $infoUser['ageUtilisateur'] . "'";
                    }
                    echo ">
                            <label>Email</label>
                            <input type='email' name='mail" . $i . "' placeholder='Adresse e-mail' required";
                    // Remplissage automatique des champs si c'est le premier participant
                    if ($i === 1) {
                        echo " value='" . $infoUser['email'] . "'";
                    }
                    echo ">
                        </div>";
                }
                ?>
            </div>
            <input class='validParticip' type='submit' name='submit' value='Inscrire'>
        </form>
    </main>

    <?php
    include('includes/footer.php');
    ?>
</body>
</html>
