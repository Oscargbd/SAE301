<?php

include("trail.php");
include("parcours.php");
include("referent.php");
include("config.php");
include("trailManager.php");

session_start();
$bdd = new PDO('mysql:host=' . $hote . ';port=' . $port . ';dbname=' . $nombase, $utilisateur, $mdp);

$trailManager = TrailManager::getInstance();
$trailManager->loadTrails($bdd);
$trails = $trailManager->getTrails();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style_poo.css">
    <title>POO | SAE 301</title>
</head>

<body>
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
</body>

</html>