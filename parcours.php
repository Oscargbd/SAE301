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

    <?php
    include('includes/navbar.php');
    ?>

    <main>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#007CA6" fill-opacity="1" d="M0,160L80,144C160,128,320,96,480,106.7C640,117,800,171,960,197.3C1120,224,1280,224,1360,224L1440,224L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path></svg>
        <h1 class='hautPage'>Parcours</h1>
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
                        <form method='post' action='reservation.php?id=3'>
                            <label>Participants :</label>
                            <input type='number' name='nbParticipants' min='1' max='20' value='1'>
                            <input class='validBleu' type='submit' value='Réserver'>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>