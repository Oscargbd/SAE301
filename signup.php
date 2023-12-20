<!DOCTYPE html>
<html lang="fr">

<?php include('includes/head.php') ?>

<body class="body-login">
    <?php
    // include('includes/navbar.php');
    ?>
    <main class='pageLogin'>
        <div>
            <img class="img-login" src="img/fondLoginPng.png">
            <h1 class="titrelogin">Le<br> Trail des<br> glaces</h1>
        </div>
        <div class="login-form">
        <h2 class="h2-login">Inscrivez vous !</h2>
        <form action="actions/signupaction.php" method="post">
            <label for="username">Nom d'utilisateur</label>
            <input class="inputlogin" type="text" id="username" name="username" placeholder="Votre nom d'utilisateur" required>
            <br>
            <label for="email">Email</label>
            <input class="inputlogin" type="email" id="email" name="email" placeholder="Votre adresse mail" required>
            <br>
            <label for="password">Mot de Passe</label>
            <input class="inputlogin" type="password" id="password" name="password" placeholder="Votre mot de passe" required>
            <br>
            <label for="nomUtilisateur">Nom</label>
            <input class="inputlogin" type="text" id="nomUtilisateur" name="nomUtilisateur" placeholder="Votre nom" required>
            <br>
            <label for="prenomUtilisateur">Prénom</label>
            <input class="inputlogin" type="text" id="prenomUtilisateur" name="prenomUtilisateur" placeholder="Votre prénom" required>
            <br>
            <label for="ageUtilisateur">Âge</label>
            <input class="inputlogin" type="text" id="ageUtilisateur" name="ageUtilisateur" placeholder="Votre âge" >
            <br>
            <button type="submit">S'inscrire</button>
        </form>
        <p>Vous avez déjà un compte ? <a href="login.php">Connectez-vous</a></p>
        <div class="errorMSG">
            <?php
            if (isset($_SESSION['errorMSG'])) {
                echo '<p>' . $_SESSION['errorMSG'] . '</p>';
                unset($_SESSION['errorMSG']); // Pour effacer le message après l'avoir affiché
            }
            ?>
        </div>
    </div>
    </main>
    
</body>

</html>