<?php
session_start(); // Démarre la session

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Cette partie du code gère les requêtes HTTP GET.
    // Récupérez les messages existants et affichez-les au format HTML
    require('../includes/database.php');

    // Préparez une requête SQL pour récupérer les 20 derniers messages de chat
    $stmt = $bdd->prepare("SELECT subquery.message, subquery.username, subquery.role, subquery.timestamp
    FROM (
        SELECT chat.message, utilisateur.username, utilisateur.role, chat.timestamp 
        FROM chat 
        INNER JOIN utilisateur ON chat.user_id = utilisateur.idUtilisateur
        ORDER BY chat.timestamp DESC
        LIMIT 20
    ) AS subquery
    ORDER BY subquery.timestamp ASC
    ");
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Récupérez les données de chaque message
        $username = htmlspecialchars($row['username']);
        $message = htmlspecialchars($row['message']);
        $role = htmlspecialchars($row['role']);
        $date = htmlspecialchars($row['timestamp']);

        if ($role === 'admin') {
            // Si l'utilisateur est administrateur, ajoutez une indication [ADMIN]
            echo "<p class='pseudoFaq'><strong class='adminPseudo'>[ADMIN] $username:</strong> $message<hr></p>";
        } else {
            // Affichez le nom d'utilisateur et le message
            echo "<p class='pseudoFaq'><strong>$username:</strong> $message<hr></p>";
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Cette partie du code gère les requêtes HTTP POST.
    // Enregistrez le message dans la base de données
    require('../includes/database.php');

    // Récupérez le message envoyé dans le formulaire POST
    $message = $_POST['message'];
    $user_id = $_SESSION['id']; // Utilisez la même variable de session "id" que dans loginAction.php

    // Récupérez le rôle de l'utilisateur
    $stmtRole = $bdd->prepare("SELECT role FROM utilisateur WHERE idUtilisateur = ?");
    $stmtRole->execute([$user_id]);
    $userRole = $stmtRole->fetch(PDO::FETCH_ASSOC)['role'];

    // Préparez une requête SQL pour insérer le message dans la table de chat
    $stmt = $bdd->prepare("INSERT INTO chat (user_id, message) VALUES (?, ?)");
    $stmt->execute([$user_id, $message]);
}
?>