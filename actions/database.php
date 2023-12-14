<?php
require ("config.php");
// Connexion à la base de donnée + affichage d'un message d'erreur si cette connexion n'a pas abouti
try {
    $bdd = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nomBD,$identifiant,$pass);
} catch (Exception $e) {
    die('Une erreur à été détecté :' . $e->getMessage());
}
?>