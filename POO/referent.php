<?php

class Referent
{
    protected $id;
    protected $nom;
    protected $contact;
    // Constructeur
    public function __construct($id, $nom, $contact)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->contact = $contact;
    }


    // Méthode pour obtenir le nom
    public function getNom()
    {
        return $this->nom;
    }

    // Méthode pour obtenir le contact
    public function getContact()
    {
        return $this->contact;
    }

    // Méthode pour mettre à jour les informations de contact
    public function updateContactInfo($nom, $contact)
    {
        $this->nom = $nom;
        $this->contact = $contact;
    }
    public function getId() {
        return $this->id;
    }
}
