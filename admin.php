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

    // Utilisateur connecté en tant qu'administrateur, affichez le contenu de la page d'administration
    ?>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#007CA6" fill-opacity="1" d="M0,160L80,144C160,128,320,96,480,106.7C640,117,800,171,960,197.3C1120,224,1280,224,1360,224L1440,224L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path></svg>
    <h1 id="h1Admin">Page d'Administration</h1>
    <?php
    // Vérifiez si l'utilisateur est connecté et a le rôle d'administrateur
    if (!isset($_SESSION["id"]) || $_SESSION["role"] !== 'admin') {
        echo "<p>Vous devez être connecté et administrateur pour accéder à cette page.</p>
        <a href='login.php'>Se connecter</a>";
        exit; // Arrêtez l'exécution du script si les conditions ne sont pas remplies
    }

    // Utilisateur connecté en tant qu'administrateur, affichez le contenu de la page d'administration
    ?>
    <hr class="hrAdmin">
    <h3 id="h3Admin">Que souhaitez vous administrer ?</h3>
    <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'Utilisateurs')">Utilisateurs</button>
        <button class="tablinks" onclick="openTab(event, 'Parcours')">Parcours</button>
        <button class="tablinks" onclick="openTab(event, 'Participants')">Participants</button>
    </div>
    <hr class="hrAdmin">

    <div id="Utilisateurs" class="tabcontent">
        <h3 id="h3Admin">Créer un Utilisateur</h3>
        <form id="formCreerUtilisateur" onSubmit="creerUtilisateur(event)">
            <!-- Champs de formulaire pour la création d'un utilisateur -->
            <input type="text" name="username" placeholder="Nom d'utilisateur" required>
            <input type="email" name="email" placeholder="Adresse e-mail" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <input type="text" name="nomUtilisateur" placeholder="Nom">
            <input type="text" name="prenomUtilisateur" placeholder="Prénom">
            <input type="number" name="ageUtilisateur" min="1" placeholder="Âge">
            <select name="role">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <input type="submit" value="Créer">
        </form>
        <hr class="hrAdmin">
        <h3 id="h3Admin">Liste des Utilisateurs</h3>
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
                            <form class='js__formAdmin" . htmlspecialchars($row["idUtilisateur"]) . "'  name='formModif_" . htmlspecialchars($row["idUtilisateur"]) . "' id='formModif_" . htmlspecialchars($row["idUtilisateur"]) . "' onSubmit='modifierUtilisateur(event, " . htmlspecialchars($row["idUtilisateur"]) . ")'>
                                    <input type='text' name='idUtilisateur' value='" . htmlspecialchars($row["idUtilisateur"]) . "'style='display:none;'>
                                    <input type='text' name='username' value='" . htmlspecialchars($row["username"]) . "' required>
                                    <input type='email' name='email' value='" . htmlspecialchars($row["email"]) . "' required>
                                    <input type='text' name='nomUtilisateur' value='" . htmlspecialchars($row["nomUtilisateur"]) . "' required>
                                    <input type='text' name='prenomUtilisateur' value='" . htmlspecialchars($row["prenomUtilisateur"]) . "' required>
                                    <input type='number' name='ageUtilisateur'min='1' max='100' value='" . htmlspecialchars($row["ageUtilisateur"]) . "' required>
                                    <select name='role' required>
                                        <option value='admin' " . ($row["role"] == 'admin' ? 'selected' : '') . ">Admin</option>
                                        <option value='user' " . ($row["role"] == 'user' ? 'selected' : '') . ">User</option>
                                    </select>
                                    <input type='submit' name='submit'value='Enregistrer'>
                                </form>
                            </div>
                            <button onClick='supprimerUtilisateur(" . htmlspecialchars($row["idUtilisateur"]) . ")'>Supprimer</button>
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