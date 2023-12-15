<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<?php include('includes/head.php') ?>

<body>
    <div class="login-form">
        <h2>Connectez-vous !</h2>
        <form action="actions/loginAction.php" method="post">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Votre adresse mail" required>
            <br>
            <label for="password">Mot de Passe</label>
            <input type="password" id="password" name="password" placeholder="Votre mot de passe" >
            <br>
            <button type="submit">Se connecter</button>
        </form>
        <p>Vous n'avez pas de compte ?<a href="signup.php"> Inscrivez vous</a></p>
        <div class="errorMSG">
            <?php
            if (isset($_SESSION['errorMSG'])) {
                echo '<p>' . $_SESSION['errorMSG'] . '</p>';
                unset($_SESSION['errorMSG']); // Pour effacer le message après l'avoir affiché
            }
            ?>
        </div>
        <div class="divider">
            <span>Ou</span>
        </div>
        <div class="google-login">
            <button type="button">Se connecter avec Google</button>
        </div>
    </div>
</body>

</html>