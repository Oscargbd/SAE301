<?php
// Inclusion des classes et fichiers nécessaires
include("POO/trail.php");
include("POO/parcours.php");
include("POO/referent.php");
include("POO/trailManager.php");
include("includes/database.php");

// Instanciation du TrailManager et chargement des trails depuis la base de données
$trailManager = TrailManager::getInstance();
$trailManager->loadTrails($bdd);
$trails = $trailManager->getTrails();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    // Inclusion du contenu de l'en-tête à partir d'un fichier externe
    include('includes/head.php');
    ?>
    <!-- Inclusion du script JavaScript -->
    <script src="assets/scripts.js"></script>
    <title>Parcours</title>
</head>

<body>
    <?php
    // Inclusion de la barre de navigation spécifique à la page d'accueil
    include('includes/navbar-index.php');
    ?>

    <main>
        <!-- SVG pour un effet de fond -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#007CA6" fill-opacity="1" d="M0,160L80,144C160,128,320,96,480,106.7C640,117,800,171,960,197.3C1120,224,1280,224,1360,224L1440,224L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path></svg>
        <h1 class='hautPage'>Parcours</h1>
        <div class="contenaire_poo">
            <?php foreach ($trails as $trail) : ?>
                <div class="block_poo">
                    <!-- Affichage de l'image du parcours -->
                    <div class="contenaire-img-poo">
                        <img class="img-poo" src="<?= htmlspecialchars($trail->getParcours()->getCheminImage()); ?>" alt="Image du parcours">
                    </div>
                    <div class="contenaire-txt-poo">
                        <!-- Affichage des informations du trail -->
                        <div><h3 class="h3-poo"><?= htmlspecialchars($trail->getNom()); ?></h3></div>
                        <div>
                            <p class="txt-poo">Distance: <?= htmlspecialchars($trail->getDistance()); ?> km</p>
                        </div>
                        <div>
                            <p class="txt-poo">Heure de départ: <?= htmlspecialchars($trail->getHeureDepart()); ?></p>
                        </div>

                        <!-- Affichage des informations du référent -->
                        <div>
                            <p class="txt-poo">Nom: <?= htmlspecialchars($trail->getReferent()->getNom()); ?></p>
                        </div>
                        <div>
                            <p class="txt-poo">Contact: <?= htmlspecialchars($trail->getReferent()->getContact()); ?></p>
                        </div>
                    </div>
                    <div class='btn_poo'>
                        <?php
                        if (isset($_SESSION["username"])) {
                            // Formulaire de réservation avec l'ID du trail en paramètre
                            echo "<form method='post' action='reservation.php?id=" . htmlspecialchars($trail->getId()) . "'>";
                            echo "<input type='hidden' name='trail_id' value='" . htmlspecialchars($trail->getId()) . "'>";
                            echo "<label class='txt-poo-2'>Participants :</label>";
                            echo "<input type='number' name='nbParticipants' min='1' max='20' value='1'>";
                            echo "<input class='validBleu' type='submit' value='Réserver'>";
                            echo "</form>";
                        } else {
                            echo "<i>Vous devez être connecté pour réserver des places.</i>";
                        }
                        ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
    
    <?php
    // Inclusion du pied de page
    include('includes/footer.php');
    ?>
</body>

</html>
