<?php
// Démarre la session
session_start();

// Connexion à la base de données
require('actions/database.php');

// Validation du formulaire
if (isset($_POST['validate'])) {

    // Vérifier si l'utilisateur a bien compléter les champs du formulaire 
    if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {

        // Les données de l'utilisateurs
        $user_pseudo = htmlspecialchars($_POST['username']);
        $user_email = htmlspecialchars($_POST['email']);
        $user_password = htmlspecialchars($_POST['password']);

        // Vérifie si l'user qui se connecte existe ou non dans la base de donnée
        $checkIfUserExists = $bdd->prepare('SELECT id, username, email,`password`,newsletter FROM users WHERE username = ? AND email = ? AND `password` = ?');
        $checkIfUserExists->execute(array($user_pseudo, $user_email, $user_password));

        if ($checkIfUserExists->rowCount() > 0) {
            $usersInfos = $checkIfUserExists->fetch();

            // Vérifie le mot de passe 
            if ($usersInfos['password'] == $user_password) {

                // Authentifier l'utilisateur sur le site pour rester connecté sur toutes les pages
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfos['id'];
                $_SESSION['email'] = $usersInfos['email'];
                $_SESSION['username'] = $usersInfos['username'];
                $_SESSION['password'] = $usersInfos['password'];


                // Rediriger l'utilisateur vers la page d'accueil
                header('Location: index.php');
            } else {
                $errorMSG = "Le mot de passe est incorrect...";
            }
        } else {
            $errorMSG = "Les informations saisies sont incorrectes...";
        }
    }
}
?>