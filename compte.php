<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    include('includes/head.php');
    ?>
    <title>Mon compte</title>
</head>

<body>

    <?php
    include('includes/navbar.php');
    // Vérifiez si l'utilisateur est connecté et a le rôle d'administrateur
    if (isset($_SESSION["id"]) && $_SESSION["role"] === 'admin') {
        header('Location: admin.php');
        exit;
    }
    ?>

    <main>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#007CA6" fill-opacity="1" d="M0,160L80,144C160,128,320,96,480,106.7C640,117,800,171,960,197.3C1120,224,1280,224,1360,224L1440,224L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path>
        </svg>
        <h1 class='hautPage'>Mon compte</h1>
        <?php
        if (isset($_SESSION["username"])) {
            echo "<div class='ensembleCompte'><p class='texteCompte' >Votre pseudo actuel : <strong>" . $_SESSION["username"] . "</strong></p>
        <form class='formCompte'method='post' action=''>
            <input type='text' name='changePseudo' placeholder='Modifier mon pseudo' required />
            <input type='submit' name='validerPseudo' value='Modifier'/>
        </form>";

            echo "<p class='texteCompte'>Votre adresse e-mail actuelle : <strong>" . $_SESSION["email"] . "</strong></p>
        <form class='formCompte' method='post' action=''>
            <input class='boutonCompte' type='email' name='changeEmail' placeholder='Modifier mon adresse e-mail' required />
            <input type='submit' name='validerEmail' value='Modifier'/>
        </form>";
        } else {
            // Si l'utilisateur n'est pas connecté
            echo "<p>Vous n'êtes pas connecté</p>";
        }


        include('includes/database.php');

        // Modifier le pseudo
        if (isset($_POST["validerPseudo"])) {
            $changePseudo = $_POST["changePseudo"];
            $existe = $bdd->prepare("SELECT * FROM utilisateur WHERE username = ?"); // Prend toutes les colonnes de la table utilisateur où le pseudo est celui rentré
            $existe->execute([$changePseudo]);
            if ($existe->rowCount() > 0) {
                // Vérifie si ce pseudo existe déjà ou pas dans la bdd
                // Pseudo déjà prit ou pas
                echo "<p>Désolé, ce pseudo est déjà pris.</p>";
            } else {
                $modifPseudo = $bdd->prepare(
                    "UPDATE utilisateur SET username = :newUsername WHERE idUtilisateur = :id" // Modifie le pseudo de l'utilisateur dans la bdd
                );
                $modifPseudo->bindValue(":newUsername", $changePseudo, PDO::PARAM_STR);
                $modifPseudo->bindValue(":id", $_SESSION["id"]);
                $modifPseudo->execute();
                $_SESSION["username"] = $changePseudo;
                header("Location: compte.php");
            }
        }

        // Modifier l'adresse e-mail
        if (isset($_POST["validerEmail"])) {
            $newEmail = $_POST["changeEmail"];
            $checkEmailExists = $bdd->prepare("SELECT * FROM utilisateur WHERE email = ?"); // Vérifie si l'e-mail est déjà utilisé
            $checkEmailExists->execute([$newEmail]);

            if ($checkEmailExists->rowCount() > 0) {
                echo "<p>Désolé, cette adresse e-mail est déjà utilisée par un autre utilisateur.</p>";
            } else {
                $modifEmail = $bdd->prepare(
                    "UPDATE utilisateur SET email = :newEmail WHERE idUtilisateur = :id"
                );
                $modifEmail->bindValue(":newEmail", $newEmail, PDO::PARAM_STR);
                $modifEmail->bindValue(":id", $_SESSION["id"]); // Utilisez $_SESSION["id"] pour obtenir l'ID de l'utilisateur connecté
                $modifEmail->execute();
                $_SESSION["email"] = $newEmail; // Mettez à jour la variable de session pour l'e-mail
                header("Location: compte.php");
            }
        }

        ?>
        <a href="actions/logoutAction.php"><button class="bouton-info">Déconnexion</button></a> <!-- Bouton de déconnexion qui fonctionne avec le script logoutAction.php -->
        <a href="actions/deleteAction.php"><button class="bouton-info">Supprimer mon compte</button></a> <!-- Bouton de suppression de compte qui fonctionne avec le script signupAction.php -->
    </div>
        <section class='reservation'>
    <h1>Mes réservations</h1>
    <?php
    // Récupérer les réservations de l'utilisateur
    $reservationsQuery = "SELECT trail.id, trail.nom AS nom_parcours, participant.* 
                          FROM participant 
                          JOIN trail ON participant.idTrail = trail.id 
                          WHERE participant.idUtilisateur = :idUtilisateur";
    $reservationsStatement = $bdd->prepare($reservationsQuery);
    $reservationsStatement->bindParam(':idUtilisateur', $_SESSION['id']);
    $reservationsStatement->execute();
    $reservations = $reservationsStatement->fetchAll(PDO::FETCH_ASSOC);

    // Vérifier si le compte a des réservations
    if (!empty($reservations)) {
        // Initialiser un tableau pour stocker les noms de parcours déjà affichés
        $parcoursAffiches = array();

        // Afficher les réservations
        foreach ($reservations as $reservation) {
            $idTrail = $reservation['id'];

            // Vérifier si le nom du parcours a déjà été affiché
            if (!in_array($idTrail, $parcoursAffiches)) {
                echo "<h2>{$reservation['nom_parcours']}</h2>";
                $parcoursAffiches[] = $idTrail; // Ajouter le nom du parcours à la liste des parcours déjà affichés
            }

            // Afficher les détails du participant
            echo "<ul class='ensembleReservation'>";
            foreach ($reservation as $key => $value) {
                // Ignorer les colonnes non liées aux participants
                if (strpos($key, 'nomParticipant') === 0) {
                    $participantNumber = preg_replace("/[^0-9]/", "", $key); // Récupérer les chiffres de la clé
                    echo "<li><strong>Participant :</strong>
                          <ul>
                              <li><strong>Nom :</strong> $value</li>
                              <li><strong>Prénom :</strong> {$reservation['prenomParticipant' . $participantNumber]}</li>
                              <li><strong>Âge :</strong> {$reservation['ageParticipant' . $participantNumber]}</li>
                              <li><strong>Email :</strong> {$reservation['mailParticipant' . $participantNumber]}</li>
                          </ul>
                          </li>";

                    // Ajouter un formulaire pour le bouton "Désinscrire"
                    echo "<form method='post' action='actions/desinscrireAction.php'>
                            <input type='hidden' name='idParticipant' value='{$reservation['idParticipant' . $participantNumber]}' />
                            <input type='submit' name='desinscrire' value='Désinscrire' />
                          </form>";
                }
            }
            echo "</ul>";
        } 
    } else {
        // Si le compte n'a pas de réservations
        echo "<p>Vous n'avez aucune réservation.</p>";
    }
    ?>
</section>
    </main>

    <footer>

        <?php
        include('includes/footer.php');
        ?>

    </footer>
</body>

</html>