<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    include('includes/head.php');
    ?>
</head>

<body>
    <?php
    include('includes/navbar.php');

    // Vérifiez si l'utilisateur est connecté et a le rôle d'administrateur
    if (!isset($_SESSION["id"]) || $_SESSION["role"] !== 'admin') {
        echo "<p>Vous devez être connecté et administrateur pour accéder à cette page.</p>
        <a href='login.php'>Se connecter</a>";
        exit; // Arrêtez l'exécution du script si les conditions ne sont pas remplies
    }

    // Utilisateur connecté en tant qu'administrateur, affichez le contenu de la page d'administration
    ?>
    <h1>Page d'Administration</h1>

    <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'Utilisateurs')">Utilisateurs</button>
        <button class="tablinks" onclick="openTab(event, 'Parcours')">Parcours</button>
        <button class="tablinks" onclick="openTab(event, 'Participants')">Participants</button>
    </div>

    <div id="Utilisateurs" class="tabcontent">
        <?php
        $sql = "SELECT idUtilisateur, username, email, nomUtilisateur, prenomUtilisateur, ageUtilisateur, role FROM utilisateur";
        $result = $bdd->query($sql);

        if ($result && $result->rowCount() > 0) {
            echo "<table><tr><th>ID</th><th>Nom d'utilisateur</th><th>Email</th><th>Nom</th><th>Prénom</th><th>Âge</th><th>Rôle</th><th>Actions</th></tr>";
            while ($row = $result->fetch()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row["idUtilisateur"]) . "</td>
                        <td>" . htmlspecialchars($row["username"]) . "</td>
                        <td>" . htmlspecialchars($row["email"]) . "</td>
                        <td>" . htmlspecialchars($row["nomUtilisateur"]) . "</td>
                        <td>" . htmlspecialchars($row["prenomUtilisateur"]) . "</td>
                        <td>" . htmlspecialchars($row["ageUtilisateur"]) . "</td>
                        <td>" . htmlspecialchars($row["role"]) . "</td>
                        <td>
                            <button onClick='afficherFormulaireModification(" . htmlspecialchars($row["idUtilisateur"]) . ")'>Modifier</button>
                            <div id='formModif_" . htmlspecialchars($row["idUtilisateur"]) . "' style='display:none;'>
                            <form class='js__formAdmin". htmlspecialchars($row["idUtilisateur"]) . "'  name='formModif_" . htmlspecialchars($row["idUtilisateur"]) . "' id='formModif_" . htmlspecialchars($row["idUtilisateur"]) . "' onSubmit='modifierUtilisateur(event, " . htmlspecialchars($row["idUtilisateur"]) . ")'>
                                    <input type='text' name='idUtilisateur' value='" . htmlspecialchars($row["idUtilisateur"]) . "'style='display:none;'>
                                    <input type='text' name='username' value='" . htmlspecialchars($row["username"]) . "' required>
                                    <input type='email' name='email' value='" . htmlspecialchars($row["email"]) . "' required>
                                    <!-- Ajoutez d'autres champs ici selon les besoins -->
                                    <input type='submit' name='submit'value='Enregistrer'>
                                </form>
                            </div>
                        </td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "Aucun utilisateur trouvé.";
        }
        ?>
    </div>

    <div id="Parcours" class="tabcontent">
        <!-- Contenu pour la gestion des parcours -->
    </div>

    <div id="Participants" class="tabcontent">
        <!-- Contenu pour la gestion des participants -->
    </div>
</body>

</html>