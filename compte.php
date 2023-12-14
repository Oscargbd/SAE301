<?php
if (isset($_SESSION["username"])) {
    echo $_SESSION["username"];
} else {
        echo "Vous n'êtes pas connecté</p>";
} ?>