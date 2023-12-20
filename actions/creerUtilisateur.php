<?php
// Connexion à la base de données
require('../includes/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer et valider les données du formulaire
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hasher le mot de passe
    $nomUtilisateur = $_POST['nomUtilisateur'] ?? ''; // Utiliser l'opérateur null coalescent pour le nom
    $prenomUtilisateur = $_POST['prenomUtilisateur'] ?? ''; // De même pour le prénom
    $ageUtilisateur = $_POST['ageUtilisateur'] ?? null; // De même pour l'âge
    $role = $_POST['role'];

    // Insérer dans la base de données
    $stmt = $bdd->prepare("INSERT INTO utilisateur (username, email, password, nomUtilisateur, prenomUtilisateur, ageUtilisateur, role) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$username, $email, $password, $nomUtilisateur, $prenomUtilisateur, $ageUtilisateur, $role]);

    echo "Utilisateur créé avec succès";
}
?>

