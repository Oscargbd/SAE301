<?php
class Parcours {
    public $id;
    public $description;
    public $pointsDePassage;

    // Constructeur
    public function __construct($id, $description, $pointsDePassage) {
        $this->id = $id;
        $this->description = $description;
        $this->pointsDePassage = $pointsDePassage;
    }

    // Méthodes d'accès (getters) et de modification (setters)
    // ... (similaire à la classe Trail)

    // Méthode pour obtenir les détails du parcours
    public function getParcoursDetails() {
        return "ID: " . $this->id . ", Description: " . $this->description . ", Points de passage: " . $this->pointsDePassage;
    }

    // Méthode pour mettre à jour les détails du parcours
    public function updateParcours($description, $pointsDePassage) {
        $this->description = $description;
        $this->pointsDePassage = $pointsDePassage;
    }
}

?>