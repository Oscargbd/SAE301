<?php 
class Trail {
    public $id;
    public $nom;
    public $distance;
    public $heureDepart;

    // Constructeur
    public function __construct($id, $nom, $distance, $heureDepart) {
        $this->id = $id;
        $this->nom = $nom;
        $this->distance = $distance;
        $this->heureDepart = $heureDepart;
    }

    // Méthodes d'accès (getters)
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getDistance() {
        return $this->distance;
    }

    public function getHeureDepart() {
        return $this->heureDepart;
    }

    // Méthodes de modification (setters)
    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setDistance($distance) {
        $this->distance = $distance;
    }

    public function setHeureDepart($heureDepart) {
        $this->heureDepart = $heureDepart;
    }

    // Méthode pour obtenir les détails du trail
    public function getDetails() {
        return "ID: de trail" . $this->id . ", Nom: " . $this->nom . ", Distance: " . $this->distance . " km, Heure de départ: " . $this->heureDepart;
    }

    // Méthode pour mettre à jour les détails du trail
    public function updateDetails($nom, $distance, $heureDepart) {
        $this->nom = $nom;
        $this->distance = $distance;
        $this->heureDepart = $heureDepart;
    }
}

?>