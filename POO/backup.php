<?php

// Inclusion des fichiers de classe
include("trail.php");
include("parcours.php");
include("referent.php");
// include("personne.php");
include("config.php");
session_start();

$bdd = new PDO('mysql:host=' . $hote . ';port=' . $port . ';dbname=' . $nombase, $utilisateur, $mdp);
/*
// Création d'une instance de Trail
$trail = new Trail(1, "Trail des Alpes", 100, "08:00");
echo $trail->getDetails() . "<br>";

// Création d'une instance de Parcours
$parcours = new Parcours(1, "Parcours Montagneux", 10);
echo $parcours->getParcoursDetails() . "<br>";

// Création d'une instance de Referent
$referent = new Referent(1, "John Doe", "john.doe@example.com");
echo $referent->getContactInfo() . "<br>";

// Création d'une instance de Personne
$personne = new Personne(2, "Jane Doe", "jane.doe@example.com", "Jane", "Organisatrice");
echo $personne->getPersonne() . "<br>";
*/

// Requête pour récupérer les données de Trail
$requeteTrail = $bdd->query("SELECT * FROM Trail"); ?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style_poo.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php

// affiche contenue trail TEST TEST fonctionnement

/*while ($donneesTrail = $requeteTrail->fetch()) {
    $trail = new Trail($donneesTrail['id'], $donneesTrail['nom'], $donneesTrail['distance'], $donneesTrail['heureDepart']);
    echo $trail->getDetails() . "<br>";
} */


/* ----------------------------------------- 
Article 1
----------------------------------------- */ 

// Affiche img de parcours en fonction de l'id
/*$Id = 2; 
$requeteParcours = $bdd->prepare("SELECT * FROM Parcours WHERE id = :id");
$requeteParcours->execute(['id' => $Id]);

if ($donneesParcours = $requeteParcours->fetch()) {
    $parcours = new Parcours($donneesParcours['id'], $donneesParcours['description'], $donneesParcours['pointsDePassage'], $donneesParcours['cheminImage']);

    if (!empty($parcours->cheminImage)) {
        echo "<img src='" . htmlspecialchars($parcours->cheminImage) . "' alt='Image du parcours'><br>";
    }
}

// Affiche le nom de trail
$requeteTrail = $bdd->prepare("SELECT * FROM Trail WHERE id = :id");
$requeteTrail->execute(['id' => $Id]);

if ($donneesTrail = $requeteTrail->fetch()) {
    $trail = new Trail($donneesTrail['id'], $donneesTrail['nom'], $donneesTrail['distance'], $donneesTrail['heureDepart']);
    echo "<div>" . htmlspecialchars($trail->getNom()) . "</div>";
    echo "<div>Distance: " . htmlspecialchars($trail->getDistance()) . " km</div>";
    echo "<div>Heure de départ: " . htmlspecialchars($trail->getHeureDepart()) . "</div>";
}

// Requête pour récupérer le référent avec un ID spécifique
$requeteReferent = $bdd->prepare("SELECT * FROM Referent WHERE id = :id");
$requeteReferent->execute(['id' => $Id]);

if ($donneesReferent = $requeteReferent->fetch()) {
    $referent = new Referent($donneesReferent['id'], $donneesReferent['nom'], $donneesReferent['contact']);

    echo "<div>Nom: " . htmlspecialchars($referent->getNom()) . "</div>";
    echo "<div>Contact: " . htmlspecialchars($referent->getContact()) . "</div>";
}
*/





// test foreach

$requete = $bdd->query("
    SELECT 
        p.cheminImage, 
        t.id AS trailId, t.nom AS trailNom, t.distance, t.heureDepart, 
        r.nom AS referentNom, r.contact 
    FROM Trail t
    LEFT JOIN Parcours p ON p.trail_id = t.id
    LEFT JOIN Personne pe ON pe.referent_id = t.id
    LEFT JOIN Referent r ON r.id = pe.referent_id
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

foreach ($trails as $trail) {
    // Afficher l'image du parcours
    echo "<img src='" . htmlspecialchars($trail->getParcours()->getCheminImage()) . "' alt='Image du parcours'><br>";

    // Afficher les informations du trail
    echo "<div>" . htmlspecialchars($trail->getNom()) . "</div>";
    echo "<div>Distance: " . htmlspecialchars($trail->getDistance()) . " km</div>";
    echo "<div>Heure de départ: " . htmlspecialchars($trail->getHeureDepart()) . "</div>";

    // Afficher les informations du référent
    echo "<div>Nom: " . htmlspecialchars($trail->getReferent()->getNom()) . "</div>";
    echo "<div>Contact: " . htmlspecialchars($trail->getReferent()->getContact()) . "</div>";
}


?>