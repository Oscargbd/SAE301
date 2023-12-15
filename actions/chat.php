<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Récupérez les messages existants et affichez-les au format HTML
    require('includes/database.php');

    $stmt = $bdd->prepare("SELECT * FROM chat ORDER BY timestamp ASC");
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $username = ''; // Vous devez obtenir le nom d'utilisateur correspondant à partir de la table des utilisateurs
        echo "<p><strong>$username:</strong> " . htmlspecialchars($row['message']) . "</p>";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Enregistrez le message dans la base de données
    require('includes/database.php');

    $message = $_POST['message'];
    $user_id = $_SESSION['idUtilisateur'];

    $stmt = $bdd->prepare("INSERT INTO chat (user_id, message) VALUES (?, ?)");
    $stmt->execute([$user_id, $message]);
}
?>
