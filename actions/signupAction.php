<?php
// Démarre la session
session_start();

// Connexion à la base de données
require('../includes/database.php');

// Validation du formulaire
if (
    isset($_POST['username']) && 
    isset($_POST['email']) && 
    isset($_POST['password']) && 
    isset($_POST['nomUtilisateur']) && 
    isset($_POST['prenomUtilisateur']) && 
    isset($_POST['ageUtilisateur']) && 
    !empty($_POST['username']) && 
    !empty($_POST['email']) && 
    !empty($_POST['password']) && 
    !empty($_POST['nomUtilisateur']) && 
    !empty($_POST['prenomUtilisateur']) && 
    !empty($_POST['ageUtilisateur'])
) {

    // Vérifier si l'utilisateur est déjà inscrit
    $user_pseudo = htmlspecialchars($_POST['username']);
    $checkIsUserAlreadyExists = $bdd->prepare('SELECT username FROM utilisateur WHERE username = ?');
    $checkIsUserAlreadyExists->execute(array($user_pseudo));

    if ($checkIsUserAlreadyExists->rowCount() == 0) {

        // Insérer les données de l'utilisateur dans la base de données
        $user_email = htmlspecialchars($_POST['email']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Utilisez le hachage pour stocker le mot de passe
        $user_nom = htmlspecialchars($_POST['nomUtilisateur']);
        $user_prenom = htmlspecialchars($_POST['prenomUtilisateur']);
        $user_age = htmlspecialchars($_POST['ageUtilisateur']);

        $insertUserOnWebsite = $bdd->prepare('INSERT INTO utilisateur(username, email, password, nomUtilisateur, prenomUtilisateur, ageUtilisateur) VALUES(?, ?, ?, ?, ?, ?)');
        $insertUserOnWebsite->execute(array($user_pseudo, $user_email, $user_password, $user_nom, $user_prenom, $user_age));

        // Récupérer les informations de l'utilisateur
        $getInfosOfThisUserReq = $bdd->prepare('SELECT idUtilisateur, username, email FROM utilisateur WHERE username = ?');
        $getInfosOfThisUserReq->execute(array($user_pseudo));

        $usersInfos = $getInfosOfThisUserReq->fetch();

        // Authentifier l'utilisateur sur le site pour rester connecté sur toutes les pages
        $_SESSION['auth'] = true;
        $_SESSION['id'] = $usersInfos['idUtilisateur'];
        $_SESSION['username'] = $usersInfos['username'];
        $_SESSION['email'] = $usersInfos['email'];
        $_SESSION['role'] = $userInfo['role'];

        // Rediriger l'utilisateur vers la page d'accueil
        header('Location: ../index.php');
    } else {
        $_SESSION['errorMSG'] = "L'utilisateur est déjà inscrit sur le site !";
        header('Location: ../signup.php');
        exit;
    }
} else {
    $_SESSION['errorMSG'] = "Veuillez compléter tous les champs...";
    header('Location: ../signup.php');
    exit;
}
?>