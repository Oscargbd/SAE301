<?php
// Démarre la session
session_start();

// Connexion à la base de données
require('../includes/database.php');

// Validation du formulaire
if (isset($_POST['email']) && isset($_POST['password'])) {

    // Vérifier si l'utilisateur a bien complété les champs du formulaire 
    if (!empty($_POST['email']) && !empty($_POST['password'])) {

        // Les données de l'utilisateur
        $user_email = htmlspecialchars($_POST['email']);
        $user_password = htmlspecialchars($_POST['password']);

        // Requête pour récupérer les informations de l'utilisateur
        $getUserInfo = $bdd->prepare('SELECT idUtilisateur, username, email, password, role FROM utilisateur WHERE email = ?');
        $getUserInfo->execute(array($user_email));

        if ($getUserInfo->rowCount() > 0) {
            $userInfo = $getUserInfo->fetch();

            // Vérifie le mot de passe 
            if (password_verify($user_password, $userInfo['password'])) {

                // Authentifier l'utilisateur sur le site pour rester connecté sur toutes les pages
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $userInfo['idUtilisateur'];
                $_SESSION['email'] = $userInfo['email'];
                $_SESSION['username'] = $userInfo['username'];
                $_SESSION['role'] = $userInfo['role'];

                // Rediriger l'utilisateur vers la page d'accueil
                header('Location: ../index.php');
            } else {
                $_SESSION['errorMSG'] = "Le mot de passe est incorrect...";
                header('Location: ../login.php');
                exit;
            }
        } else {
            $_SESSION['errorMSG'] = "Les informations saisies sont incorrectes...";
            header('Location: ../login.php');
            exit;
        }
    } else {
        $_SESSION['errorMSG'] = "Veuillez compléter tous les champs...";
        header('Location: ../login.php');
        exit;
    }
} else {
    $_SESSION['errorMSG'] = "Une erreur s'est produite. Veuillez réessayer.";
    header('Location: ../login.php');
    exit;
}
?>
