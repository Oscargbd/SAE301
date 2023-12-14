<?php
// Connexion à la base de données
require('database.php');


// Vérifier si le formulaire à été soumis 
if (isset($_POST['newsletterValidate'])) {

    // Récupérer les données du formulaire 
    $newsletter = $_POST['newsletter'];

    // Modification de la valeur newsletter au sein de la bbd
    $sql = "UPDATE users SET newsletter = :newsletter WHERE id = :userId";
    $NewData = $bdd->prepare($sql);
    $NewData->bindValue(':newsletter', $newsletter, PDO::PARAM_STR);
    $NewData->bindValue(':userId', $_SESSION['id'], PDO::PARAM_INT);
    $NewData->execute();

    // Mettre à jour la newsletter stocké dans la session newsletter
    $_SESSION['newsletter'] = $newsletter;

    // Afficher un message de confirmation
    echo 'Votre newsletter a été modifié avec succès.<br>';
}

// Vérification de l'activation du bouton modifier.
if (isset($_POST['edit'])) {
    // Vérification du champs
    if (!empty($_POST['NewUsername'])) {

        // Récupérer le nouveau pseudo
        $NewUsername = $_POST['NewUsername'];

        // Mettre à jour le pseudo de l'utilisateur dans la base de données
        $sql = "UPDATE users SET username = :NewUsername WHERE id = :userId";
        $NewData = $bdd->prepare($sql);
        $NewData->bindValue(':NewUsername', $NewUsername, PDO::PARAM_STR);
        $NewData->bindValue(':userId', $_SESSION['id']);
        $NewData->execute();

        // Mettre à jour le pseudo stocké dans la session
        $_SESSION['username'] = $NewUsername;

        // Afficher un message de confirmation
        echo 'Votre pseudo a été modifié avec succès.<br>';
    }
}



// Vérification de l'activation du bouton modifier.
if (isset($_POST['edit2'])) {
    // Vérification du champs
    if (!empty($_POST['NewEmail'])) {

        // Récupérer le nouveau mail
        $NewEmail = $_POST['NewEmail'];

        // Mettre à jour le mail de l'utilisateur dans la base de données
        $sql = "UPDATE users SET email = :NewEmail WHERE id = :userId";
        $NewData = $bdd->prepare($sql);
        $NewData->bindValue(':NewEmail', $NewEmail, PDO::PARAM_STR);
        $NewData->bindValue(':userId', $_SESSION['id'], PDO::PARAM_INT);
        $NewData->execute();

        // Mettre à jour le mail stocké dans la session
        $_SESSION['email'] = $NewEmail;

        // Afficher un message de confirmation
        echo 'Votre adresse mail a été modifié avec succès.<br>';
    }
}


// Vérification de l'activation du bouton modifier.
if (isset($_POST['edit3'])) {
    // Vérification du champs
    if (!empty($_POST['NewPassword'])) {

        // Récupérer le nouveau mot de passe
        $NewPassword = $_POST['NewPassword'];

        // Mettre à jour le mot de passe de l'utilisateur dans la base de données
        $sql = "UPDATE users SET `password` = :NewPassword WHERE id = :userId";
        $NewData = $bdd->prepare($sql);
        $NewData->bindValue(':NewPassword', $NewPassword, PDO::PARAM_STR);
        $NewData->bindValue(':userId', $_SESSION['id'], PDO::PARAM_INT);
        $NewData->execute();

        // Mettre à jour le mot de passe stocké dans la session
        $_SESSION['password'] = $NewPassword;

        // Afficher un message de confirmation
        echo 'Votre mot de passe a été modifié avec succès.<br>';
    }
}

// Récupération de l'état de la newsletter pour l'user authentifié/connecté
$stmt = $bdd->prepare("SELECT newsletter FROM users WHERE id = :userId");
$stmt->bindParam(':userId', $_SESSION['id'], PDO::PARAM_INT);
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);






// Suite de "echo" permettant l'affichage de mes données après ou sans modification
echo 'Votre pseudo est : ' . $_SESSION['username'] . '<br>';
echo '<form action="#" method="POST"><input type="text" name="NewUsername" placeholder="Nouveau pseudo...">';
echo '<button name="edit" type="submit">Modifier</button></form>' . '<br>';


echo '<p>Votre adresse email est : ' . $_SESSION['email'] . '</p><br>';
echo '<form action="#" method="POST"><input type="text" name="NewEmail" placeholder="Nouvelle adresse mail...">';
echo '<button name="edit2" type="submit">Modifier</button></form>' . '<br>';


echo '<p>Votre mot de passe est : ' . $_SESSION['password'] . '</p><br>';
echo '<form action="#" method="POST"><input type="text" name="NewPassword" placeholder="Nouveaux mot de passe...">';
echo '<button name="edit3" type="submit">Modifier</button></form>' . '<br>';

// Emet une condition pour l'affichage de la souscription ou non de l'user à la newsletter
if ($result['newsletter'] == 1) {
    echo '<p>Newsletter :  Non </p><br>';
} else {
    echo '<p>Newsletter :  Oui </p><br>';
}
