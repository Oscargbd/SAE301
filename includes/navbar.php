<?php

// Démarre la session
session_start();

// Connexion à la base de données
require('includes/database.php');
?>
<nav>
    <a href="index.php" class="iconeRond">
      <img src="./images/logoblanc.png" alt="LogoTrailDesGlaces">
    </a>
    <a href="index.php">Accueil</a>
    <a href="parcours.php">Parcours</a>
    <a href="faq.php">Discussion</a>
    <div class="grow"></div>
    <a class="iconeRond"><img src="./images/union.png" alt="icone search bar" class="loupe"></a>
    <?php if (isset($_SESSION["username"])) {     // Si l'utilisateur est connecté, il a accès à son compte, sinon il y a un bouton d'inscription
      echo "<a href='compte.php'>".$_SESSION['username']."</a>";
      echo "<a href='actions/logoutAction.php'>Se déconnecter</a>";
    } else {
      echo "<a href='signup.php'>S'inscrire</a>";
      echo "<a href='login.php'>Se connecter</a>";
    } ?>
</nav>