<!DOCTYPE html>
<html lang="fr">

<?php include('includes/head.php') ?>

<body class="body-login">
    <?php include ("includes/navbar.php") ?>
    <main class='pageLogin'>
        <div>
            <img class="img-login" src="img/fondLoginPng.png">
            <h1 class="titrelogin">Le<br>Trail des<br>glaces</h1>
        </div>
        <div class="login-form">
            <h2 class="h2-login">Connectez-vous !</h2>
            <form action="actions/loginAction.php" method="post">
                <label for="email">Email</label>
                <input class="inputlogin" type="email" id="email" name="email" placeholder="Votre adresse mail" required>
                <br>
                <label for="password">Mot de Passe</label>
                <input class="inputlogin" type="password" id="password" name="password" placeholder="Votre mot de passe" >
                <br>
                <button type="submit" >Se connecter</button>
            </form>
            <p>Vous n'avez pas de compte ? <a href="signup.php">Inscrivez vous</a></p>
            <div class="errorMSG">
                <?php
                if (isset($_SESSION['errorMSG'])) {
                    ?><p> <?php $_SESSION['errorMSG'] ?></p> <?php ;
                    unset($_SESSION['errorMSG']); // Pour effacer le message après l'avoir affiché
                }
                ?>
            </div>
        </div>
    </main>

    <footer>

            

        </footer>
</body>

</html>