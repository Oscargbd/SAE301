<?php

// Démarre la session
session_start();

// Connexion à la base de données
require('includes/database.php'); 
?>
<nav>
  <div class="navbar">
    <a href="index.php">Accueil</a>
    <a href="equipes.php">Equipes</a>
    <a href="index.php">
      <img src="images/logocdf-blanc2.0.png" alt="LogoCoupeDeFranceBlanc" class="logo-blanc">
    </a>
    <a href="resultats.php">Resultats</a>

    <?php if (isset($_SESSION["username"])) {     // Si l'utilisateur est connecté, il a accès à son compte, sinon il y a un bouton d'inscription
      echo "<a href='compte.php'>Compte</a>";
    } else {
      echo "<a href='signup.php'>S'inscrire</a>";
    } ?>

  </div>
  <div class="theme">
    <a href="#">
      <img src="images/logoThemeBlanc.png" alt="LogoThemeBlanc" class="theme">
    </a>
  </div>
</nav>