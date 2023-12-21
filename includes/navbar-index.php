<?php

// Démarre la session
session_start();
// Connexion à la base de données
require('includes/database.php');
?>
<nav class="nav-all" id="contenaire_lapotop_navbar">
  <a href="index.php" class="iconeRond">
    <img src="./images/logoblanc.png" alt="LogoTrailDesGlaces">
  </a>
  <a href="index.php">Accueil</a>
  <a href="parcours.php">Parcours</a>
  <a href="faq.php">Discussion</a>
  <div class="grow"></div>
  <?php if (isset($_SESSION["username"])) {     // Si l'utilisateur est connecté, il a accès à son compte, sinon il y a un bouton d'inscription
    echo "<a href='compte.php'>" . $_SESSION['username'] . "</a>";
    echo "<a href='actions/logoutAction.php'>Se déconnecter</a>";
  } else {
    echo "<a href='signup.php'>S'inscrire</a>";
    echo "<a href='login.php'>Se connecter</a>";
  } ?>
</nav>

<div id="mySidenav" class="sidenav">
  <a id="closeBtn" href="#" class="close">×</a>
  <ul>
    <li><a href="index.php">Accueil</a></li>
    <li><a href="parcours.php">Parcours</a></li>
    <li><a href="faq.php">Discussion</a></li>
    <li><a href="#">Contact</a></li>
    <?php if (isset($_SESSION["username"])) {     // Si l'utilisateur est connecté, il a accès à son compte, sinon il y a un bouton d'inscription
      echo "<li><a href='compte.php'>" . $_SESSION['username'] . "</a></li>";
      echo "<li><a href='actions/logoutAction.php'>Se déconnecter</a></li>";
    } else {
      echo "<li><a href='signup.php'>S'inscrire</a></li>";
      echo "<li><a href='login.php'>Se connecter</a></li>";
    } ?>
  </ul>
  </div>


  <a href="#" id="openBtn">
    <span class="burger-icon">
      <span></span>
      <span></span>
      <span></span>
    </span>
</div>

</a>