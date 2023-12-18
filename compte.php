<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    include('includes/head.php');
    ?>
    <title>Mon compte</title>
</head>

<body>
    <?php

    include('includes/navbar.php');


    if (isset($_SESSION["username"])) {
        echo "<p>Votre pseudo actuel : " . $_SESSION["username"] . "</p>
        <form method='post' action=''>
            <input type='text' name='changePseudo' placeholder='Modifier mon pseudo' required />
            <input type='submit' name='validerPseudo' value='Modifier'/>
        </form>";

        echo "<p>Votre adresse e-mail actuelle : " . $_SESSION["email"] . "</p>
        <form method='post' action=''>
            <input type='email' name='changeEmail' placeholder='Modifier mon adresse e-mail' required />
            <input type='submit' name='validerEmail' value='Modifier'/>
        </form>";
    } else {
        // Si l'utilisateur n'est pas connecté
        echo "<p>Vous n'êtes pas connecté</p>";
    }


    include('includes/database.php');

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

    // Modifier l'adresse e-mail
    if (isset($_POST["validerEmail"])) {
        $newEmail = $_POST["changeEmail"];
        $checkEmailExists = $bdd->prepare("SELECT * FROM utilisateur WHERE email = ?"); // Vérifie si l'e-mail est déjà utilisé
        $checkEmailExists->execute([$newEmail]);

        if ($checkEmailExists->rowCount() > 0) {
            echo "<p>Désolé, cette adresse e-mail est déjà utilisée par un autre utilisateur.</p>";
        } else {
            $modifEmail = $bdd->prepare(
                "UPDATE utilisateur SET email = :newEmail WHERE idUtilisateur = :id"
            );
            $modifEmail->bindValue(":newEmail", $newEmail, PDO::PARAM_STR);
            $modifEmail->bindValue(":id", $_SESSION["id"]); // Utilisez $_SESSION["id"] pour obtenir l'ID de l'utilisateur connecté
            $modifEmail->execute();
            $_SESSION["email"] = $newEmail; // Mettez à jour la variable de session pour l'e-mail
            header("Location: compte.php");
        }
    }

    ?>
    <a href="actions/logoutAction.php">Déconnexion</a> <!-- Bouton de déconnexion qui fonctionne avec le script logoutAction.php -->
    <a href="actions/deleteAction.php">Supprimer mon compte</a> <!-- Bouton de suppression de compte qui fonctionne avec le script signupAction.php -->
</body>

</html>