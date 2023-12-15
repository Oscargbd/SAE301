<?php
class Parcours {
    public $id;
    public $description;
    public $pointsDePassage;
    public $cheminImage;

    // Constructeur
    public function __construct($id, $description, $pointsDePassage, $cheminImage) {
        $this->id = $id;
        $this->cheminImage = $cheminImage; // Initialisation de l'attribut
        $this->description = $description;
        $this->pointsDePassage = $pointsDePassage;
    }

    // Méthodes d'accès (getters) et de modification (setters)
    // ... (similaire à la classe Trail)

    // Méthode pour obtenir les détails du parcours
    public function getParcoursDetails() {
        return "ID: de parcours" . $this->id . ", Description: " . $this->description . ", Points de passage: " . $this->pointsDePassage;
    }

    // Méthode pour mettre à jour les détails du parcours
    public function updateParcours($description, $pointsDePassage) {
        $this->description = $description;
        $this->pointsDePassage = $pointsDePassage;
    }
}

?>