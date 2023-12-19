<?php

include("POO/trail.php");
include("POO/parcours.php");
include("POO/referent.php");
include("POO/trailManager.php");
include("includes/config.php");

$bdd = new PDO('mysql:host=' . $hote . ';port=' . $port . ';dbname=' . $nomBD, $identifiant, $pass);

$trailManager = TrailManager::getInstance();
$trailManager->loadTrails($bdd);
$trails = $trailManager->getTrails();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    include('includes/head.php');
    ?>
    <title>Le Trail des Glaces</title>
</head>

<body class="bodyindex">

    <header>
        <?php
        include('includes/navbar.php');
        ?>
    </header>

    <main>
        <div class="contenaire_poo">
            <?php foreach ($trails as $trail) : ?>
                <div class="block_poo">
                    <!-- Afficher l'image du parcours -->
                    <div>
                        <img class="img-poo" src="<?= htmlspecialchars($trail->getParcours()->getCheminImage()); ?>" alt="Image du parcours">
                    </div>
                    <div class="txt-poo">
                        <!-- Afficher les informations du trail -->
                        <div><?= htmlspecialchars($trail->getNom()); ?></div>
                        <div>
                            <p>Distance: <?= htmlspecialchars($trail->getDistance()); ?> km</p>
                        </div>
                        <div>
                            <p>Heure de départ: <?= htmlspecialchars($trail->getHeureDepart()); ?></p>
                        </div>

                        <!-- Afficher les informations du référent -->
                        <div>
                            <p>Nom: <?= htmlspecialchars($trail->getReferent()->getNom()); ?></p>
                        </div>
                        <div>
                            <p>Contact: <?= htmlspecialchars($trail->getReferent()->getContact()); ?></p>
                        </div>
                    </div>
                    <div class="btn_poo">
                        <a href="parcours.php">
                            <input type="button" value="achat">
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>