<?php

class Referent  {
    protected $id;
    protected $nom;
    protected $contact;
    // Constructeur
    public function __construct($nom, $contact) {
        // $this->id = $id; // Supprimez ou commentez cette ligne si l'id n'est pas nécessaire ici
        $this->nom = $nom;
        $this->contact = $contact;
    }

    // Méthode pour obtenir les informations de contact
    public function getContactInfo() {
        return "ID: de referent " . $this->id . ", Nom: " . $this->nom . ", Contact: " . $this->contact;
    }

        // Méthode pour obtenir le nom
    public function getNom() {
        return $this->nom;
    }

    // Méthode pour obtenir le contact
    public function getContact() {
        return $this->contact;
    }

    // Méthode pour mettre à jour les informations de contact
    public function updateContactInfo($nom, $contact) {
        $this->nom = $nom;
        $this->contact = $contact;
    }
}

?>