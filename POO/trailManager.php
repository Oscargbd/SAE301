<?php
class TrailManager
{
    private static $instance = null;
    private $trails = [];

    // Rendre le constructeur privé pour empêcher la création directe d'objets
    private function __construct()
    {
    }

    // Méthode pour obtenir l'instance unique de la classe
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new TrailManager();
        }
        return self::$instance;
    }
    public function loadTrails($bdd)
    {
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

        while ($donnees = $requete->fetch()) {
            $trail = new Trail($donnees['trailId'], $donnees['trailNom'], $donnees['distance'], $donnees['heureDepart']);
            $trail->setReferent(new Referent($donnees['referentNom'], $donnees['contact']));
            $parcours = new Parcours($donnees['cheminImage'], $donnees['description'] ?? '', $donnees['pointsDePassage'] ?? 0, $donnees['cheminImage']);
            $trail->setParcours($parcours);
            $this->trails[] = $trail;
        }
    }
    public function getTrails()
    {
        return $this->trails;
    }

    // Empêcher le clonage de l'objet
    protected function __clone()
    {
    }
}
