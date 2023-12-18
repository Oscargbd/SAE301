<?php
class Trail
{
    public $id;
    public $nom;
    public $distance;
    public $heureDepart;
    private $referent; // Ajout pour stocker un objet Referent
    private $parcours; // Ajout pour stocker un objet Parcours

    // Constructeur
    public function __construct($id, $nom, $distance, $heureDepart)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->distance = $distance;
        $this->heureDepart = $heureDepart;
    }

    // Méthodes d'accès (getters)
    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getDistance()
    {
        return $this->distance;
    }

    public function getHeureDepart()
    {
        return $this->heureDepart;
    }

    // Méthode pour définir un objet Referent
    public function setReferent($referent)
    {
        $this->referent = $referent;
    }

    // Méthode pour obtenir un objet Referent
    public function getReferent()
    {
        return $this->referent;
    }

    // Méthode pour définir un objet Parcours
    public function setParcours($parcours)
    {
        $this->parcours = $parcours;
    }

    // Méthode pour obtenir un objet Parcours
    public function getParcours()
    {
        return $this->parcours;
    }

    // Méthodes de modification (setters)
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setDistance($distance)
    {
        $this->distance = $distance;
    }

    public function setHeureDepart($heureDepart)
    {
        $this->heureDepart = $heureDepart;
    }

    // Méthode pour obtenir les détails du trail
    public function getDetails()
    {
        return "ID: de trail" . $this->id . ", Nom: " . $this->nom . ", Distance: " . $this->distance . " km, Heure de départ: " . $this->heureDepart;
    }

    // Méthode pour mettre à jour les détails du trail
    public function updateDetails($nom, $distance, $heureDepart)
    {
        $this->nom = $nom;
        $this->distance = $distance;
        $this->heureDepart = $heureDepart;
    }
}
