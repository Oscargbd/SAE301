<?php

class Referent  {
    protected $id;
    protected $nom;
    protected $contact;
    // Constructeur
    public function __construct($id, $nom, $contact) {
        $this->id = $id;
        $this->nom = $nom;
        $this->contact = $contact;
    }

    // Méthode pour obtenir les informations de contact
    public function getContactInfo() {
        return "ID: de referent " . $this->id . ", Nom: " . $this->nom . ", Contact: " . $this->contact;
    }

    // Méthode pour mettre à jour les informations de contact
    public function updateContactInfo($nom, $contact) {
        $this->nom = $nom;
        $this->contact = $contact;
    }
}

?>