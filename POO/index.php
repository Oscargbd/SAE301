<?php

// Inclusion des fichiers de classe
include("trail.php");
include("parcours.php");
include("referent.php");
include("config.php");
session_start();

$bdd = new PDO('mysql:host=' . $hote . ';port=' . $port . ';dbname=' . $nombase, $utilisateur, $mdp);


$requete = $bdd->query("
    SELECT 
        p.cheminImage, 
        t.id AS trailId, t.nom AS trailNom, t.distance, t.heureDepart, 
        r.nom AS referentNom, r.contact 
    FROM Trail t
    LEFT JOIN Parcours p ON p.trail_id = t.id
    LEFT JOIN Referent r ON r.id = t.id
    ORDER BY t.id DESC
");

// Créer un tableau pour stocker les objets
$trails = [];
while ($donnees = $requete->fetch()) {
    $trail = new Trail($donnees['trailId'], $donnees['trailNom'], $donnees['distance'], $donnees['heureDepart']);
    $trail->setReferent(new Referent($donnees['referentNom'], $donnees['contact']));
    $parcours = new Parcours($donnees['cheminImage'], $donnees['description'] ?? '', $donnees['pointsDePassage'] ?? 0, $donnees['cheminImage']);
    $trail->setParcours($parcours);
    $trails[] = $trail;
}

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
                    <img src="<?= htmlspecialchars($trail->getParcours()->getCheminImage()); ?>" alt="Image du parcours">
                </div>
                <div class="txt">
                    <!-- Afficher les informations du trail -->
                    <div><?php htmlspecialchars($trail->getNom()); ?></div>
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
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>