<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    include ('includes/head.php');
    ?>
    <title>Mon compte</title>
</head>
<body>
    <?php
    if (isset($_SESSION["username"])) {
    echo $_SESSION["username"]."
    
    <form method='post' action=''>
    <input type='text' name='changePseudo' placeholder='Modifier mon pseudo' required />
    <input type='submit' name='validerPseudo' value='Modifier'/>
    </form>
    
    ";
} else {
    // Si il n'est pas connecté
    echo "<p>Vous n'êtes pas connecté</p>";
}


include ('includes/database.php');

// Modifier le pseudo
if (isset($_POST["validerPseudo"])) {
    $changePseudo = $_POST["changePseudo"];
    $existe = $bdd->prepare("SELECT * FROM utilisateur WHERE username = ?"); // Prend toutes les colonnes de la table utilisateur où le pseudo est celui rentré
    $existe->execute([$changePseudo]);
    if ($existe->rowCount() > 0) {
        // Vérifie si ce pseudo existe déjà ou pas dans la bdd
        // Pseudo déjà prit ou pas
        echo "<p>Désolé, ce pseudo est déjà pris.</p>";
    } else {
        $modifPseudo = $bdd->prepare(
            "UPDATE utilisateur SET username = :newUsername WHERE idUtilisateur = :id" // Modifie le pseudo de l'utilisateur dans la bdd
        );
        $modifPseudo->bindValue(":newUsername", $changePseudo, PDO::PARAM_STR);
        $modifPseudo->bindValue(":id", $_SESSION["id"]);
        $modifPseudo->execute();
        $_SESSION["username"] = $changePseudo;
        header("Location: compte.php");
    }
}
?>
</body>
</html>