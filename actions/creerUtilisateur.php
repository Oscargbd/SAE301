<?php
// Inclure le fichier de connexion à la base de données
require('../includes/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer et valider les données du formulaire

    // Nom d'utilisateur
    $username = $_POST['username'];

    // Adresse e-mail
    $email = $_POST['email'];

    // Hasher le mot de passe pour sécuriser le stockage
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Nom de l'utilisateur avec opérateur null coalescent (si non défini, utilisez une chaîne vide)
    $nomUtilisateur = $_POST['nomUtilisateur'] ?? '';

    // Prénom de l'utilisateur avec opérateur null coalescent (si non défini, utilisez une chaîne vide)
    $prenomUtilisateur = $_POST['prenomUtilisateur'] ?? '';

    // Âge de l'utilisateur avec opérateur null coalescent (si non défini, utilisez la valeur null)
    $ageUtilisateur = $_POST['ageUtilisateur'] ?? null;

    // Rôle de l'utilisateur (par exemple, "utilisateur" ou "administrateur")
    $role = $_POST['role'];

    // Insérer les données dans la base de données
    $stmt = $bdd->prepare("INSERT INTO utilisateur (username, email, password, nomUtilisateur, prenomUtilisateur, ageUtilisateur, role) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$username, $email, $password, $nomUtilisateur, $prenomUtilisateur, $ageUtilisateur, $role]);

    // Afficher un message de succès après l'insertion
    echo "Utilisateur créé avec succès";
}
?>


