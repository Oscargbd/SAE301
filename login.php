<!DOCTYPE html>
<html lang="fr">

<?php include('includes/head.php') ?>
<title>Se connecter</title>

<body class="body-login">
    <?php include ("includes/navbar.php") ?>
    <main class='pageLogin'>
        <!-- Section avec le logo et le titre -->
        <div>
            <img class="img-login" src="img/fondLoginPng.png">
            <h1 class="titrelogin">Le<br>Trail des<br>glaces</h1>
        </div>
        
        <!-- Section du formulaire de connexion -->
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
            
            <!-- Lien vers la page d'inscription -->
            <p>Vous n'avez pas de compte ? <a href="signup.php">Inscrivez-vous</a></p>
            
            <!-- Affichage des messages d'erreur -->
            <div class="errorMSG">
                <?php
                if (isset($_SESSION['errorMSG'])) {
                    ?><p> <?php echo $_SESSION['errorMSG']; ?></p> <?php
                    unset($_SESSION['errorMSG']); // Pour effacer le message après l'avoir affiché
                }
                ?>
            </div>
        </div>
    </main>      

</body>

</html>
