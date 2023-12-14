<?php

include("referent.php");

class Personne extends Referent {
    private $prenom;
    private $role;

    // Constructeur
    public function __construct($id, $nom, $contact, $prenom, $role) {
        parent::__construct($id, $nom, $contact);
        $this->prenom = $prenom;
        $this->role = $role;
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    // Méthodes spécifiques à Personne
    public function getPersonne() {
        return "ID: " . $this->getId() . ", Nom: " . $this->getNom() . ", Prénom: " . $this->prenom . ", Rôle: " . $this->role;
    }
}


?>