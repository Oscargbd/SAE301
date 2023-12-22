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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#007CA6" fill-opacity="1" d="M0,160L80,144C160,128,320,96,480,106.7C640,117,800,171,960,197.3C1120,224,1280,224,1360,224L1440,224L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path>
    </svg>
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
        <button class="tablinks" onclick="openTab(event, 'Chats')">Chats</button>

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
        <?php
        include("POO/trailManager.php");
        include("POO/trail.php");
        include("POO/referent.php");
        include("POO/parcours.php");

        $trailManager = TrailManager::getInstance();
        $trailManager->loadTrails($bdd);
        $trails = $trailManager->getTrails();
        ?>
        <h3 class="h3Admin">Créer un Parcours</h3>
        <form id="formCreerParcours" onSubmit="creerParcours(event)">
            <input type="text" name="nom" placeholder="Nom du parcours" required>
            <input type="number" name="distance" placeholder="Distance (km)" required>
            <input type="time" name="heureDepart" placeholder="Heure de départ" required>
            <select name="referentId">
                <option value="">Choisir un référent</option>
                <?php
                $referents = $bdd->query("SELECT id, nom FROM referent");
                while ($referent = $referents->fetch()) {
                    echo "<option value=\"" . $referent['id'] . "\">" . htmlspecialchars($referent['nom']) . "</option>";
                }
                ?>
            </select>
            <input type="submit" value="Créer le parcours">
        </form>
        <h3 class="h3Admin">Gestion des Parcours</h3>
        <?php foreach ($trails as $trail) : ?>
            <div>
                <p>Nom du Trail : <?= htmlspecialchars($trail->getNom()); ?></p>
                <p>Distance : <?= htmlspecialchars($trail->getDistance()) . " km"; ?></p>
                <p>Heure de départ : <?= htmlspecialchars($trail->getHeureDepart()); ?></p>

                <?php
                // Afficher les informations du référent
                $referent = $trail->getReferent();
                if ($referent) {
                    echo "<p>Référent: " . htmlspecialchars($referent->getNom()) . "</p>";
                    echo "<p>Contact du Référent: " . htmlspecialchars($referent->getContact()) . "</p>";
                } else {
                    echo "<p>Référent: Non assigné</p>";
                }
                ?>
                <button onclick="afficherFormulaireModification(<?= $trail->getId(); ?>)">Modifier</button>
                <div id="formModif_<?= $trail->getId(); ?>" style="display:none;">
                    <form id="formModifParcours_<?= $trail->getId(); ?>" onsubmit="modifierParcours(event, <?= $trail->getId(); ?>)">
                        <input type="hidden" name="id" value="<?= $trail->getId(); ?>">
                        <input type="text" name="nom" value="<?= htmlspecialchars($trail->getNom()); ?>">
                        <input type="number" name="distance" value="<?= htmlspecialchars($trail->getDistance()); ?>">
                        <input type="time" name="heure" value="<?= htmlspecialchars($trail->getHeureDepart()); ?>">
                        <input type="hidden" name="id_referent" value="<?= $referent ? $referent->getId() : ''; ?>">
                        <select name="referentId">
                            <?php
                            $referents = $bdd->query("SELECT id, nom FROM referent");
                            while ($referent = $referents->fetch()) {
                                $selected = $referent['id'] == $trail->getReferent()->getId() ? 'selected' : '';
                                echo "<option value=\"" . $referent['id'] . "\" $selected>" . htmlspecialchars($referent['nom']) . "</option>";
                            }
                            ?>

                            <input type="submit" name="update_parcours" value="Enregistrer les modifications">
                    </form>
                </div>
                <button onclick="supprimerParcours(<?= $trail->getId(); ?>)">Supprimer</button>
            </div>
        <?php endforeach; ?>
    </div>

    <div id="Participants" class="tabcontent">
        <h3 class="h3Admin">Créer un Participant</h3>
        <form id="formCreerParticipant" onSubmit="creerParticipant(event)">
            <input type="text" name="nomParticipant" placeholder="Nom du participant" required>
            <input type="text" name="prenomParticipant" placeholder="Prénom du participant" required>
            <input type="number" name="ageParticipant" placeholder="Âge" required>
            <input type="email" name="emailParticipant" placeholder="Email du participant" required>
            <select name="idTrail">
                <option value="">Choisir un parcours</option>
                <?php
                $parcours = $bdd->query("SELECT id, nom FROM trail");
                while ($trail = $parcours->fetch()) {
                    echo "<option value=\"" . $trail['id'] . "\">" . htmlspecialchars($trail['nom']) . "</option>";
                }
                ?>
            </select>
            <select name="idUtilisateur">
                <option value="">Choisir un compte inscrivant</option>
                <?php
                $utilisateurs = $bdd->query("SELECT idUtilisateur, username FROM utilisateur");
                while ($utilisateur = $utilisateurs->fetch()) {
                    echo "<option value=\"" . $utilisateur['idUtilisateur'] . "\">" . htmlspecialchars($utilisateur['username']) . "</option>";
                }
                ?>
            </select>
            <input type="submit" value="Créer le participant">
        </form>
        <h3 class="h3Admin">Liste des Participants</h3>
        <?php
        $sql = "SELECT p.idParticipant, p.nomParticipant, p.prenomParticipant, p.ageParticipant, u.username AS compteInscrivant, p.mailParticipant, t.nom AS trailNom 
        FROM participant p
        JOIN trail t ON p.idTrail = t.id
        JOIN utilisateur u ON p.idUtilisateur = u.idUtilisateur";
        $result = $bdd->query($sql);

        if ($result && $result->rowCount() > 0) {
            echo "<table><tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Âge</th><th>Compte Inscrivant</th><th>Email</th><th>Trail</th><th>Actions</th></tr>";
            while ($row = $result->fetch()) {
                echo "<tr>
                <td>" . htmlspecialchars($row["idParticipant"]) . "</td>
                <td>" . htmlspecialchars($row["nomParticipant"]) . "</td>
                <td>" . htmlspecialchars($row["prenomParticipant"]) . "</td>
                <td>" . htmlspecialchars($row["ageParticipant"]) . "</td>
                <td>" . htmlspecialchars($row["compteInscrivant"]) . "</td>
                <td>" . htmlspecialchars($row["mailParticipant"]) . "</td>
                <td>" . htmlspecialchars($row["trailNom"]) . "</td>
                <td>
                    <button onclick=\"afficherFormulaireModificationParticipant(" . htmlspecialchars($row["idParticipant"]) . ")\">Modifier</button>
                    <div id='formModifContainerParticipant_" . htmlspecialchars($row["idParticipant"]) . "' style='display:none;'>
                        <form class='js__formParticipant" . htmlspecialchars($row["idParticipant"]) . "' onsubmit='modifierParticipant(event, " . htmlspecialchars($row["idParticipant"]) . ")'>
                            <input type='hidden' name='idParticipant' value='" . htmlspecialchars($row["idParticipant"]) . "'>
                            <input type='text' name='nomParticipant' value='" . htmlspecialchars($row["nomParticipant"]) . "'>
                            <input type='text' name='prenomParticipant' value='" . htmlspecialchars($row["prenomParticipant"]) . "'>
                            <input type='number' name='ageParticipant' value='" . htmlspecialchars($row["ageParticipant"]) . "'>
                            <input type='email' name='mailParticipant' value='" . htmlspecialchars($row["mailParticipant"]) . "'>
                            <select name='parcoursParticipant'>";
                $parcoursSql = "SELECT id, nom FROM trail";
                $parcoursResult = $bdd->query($parcoursSql);
                while ($parcoursRow = $parcoursResult->fetch()) {
                    // La ligne suivante a été corrigée pour utiliser 'id' au lieu de 'trailNom' pour la comparaison
                    $selected = ($parcoursRow['idTrail'] == $row['trailNom']) ? ' selected' : '';
                    echo "<option value='" . htmlspecialchars($parcoursRow['id']) . "'$selected>" . htmlspecialchars($parcoursRow['nom']) . "</option>";
                }
                echo "</select>
                            <input type='submit' value='Enregistrer les modifications'>
                        </form>
                    </div>
                    <button onclick='supprimerParticipant(" . htmlspecialchars($row["idParticipant"]) . ")'>Supprimer</button>
                </td>                   
            </tr>";
            }
            echo "</table>";
        } else {
            echo "Aucun participant trouvé.";
        }
        ?>
    </div>
    <div id="Chats" class="tabcontent">
        <h3 class="h3Admin">Gestion des Chats</h3>
        <?php
        $sql = "SELECT c.idChat, c.message, c.timestamp, u.username 
            FROM chat c
            JOIN utilisateur u ON c.user_id = u.idUtilisateur
            ORDER BY c.timestamp DESC";
        $result = $bdd->query($sql);

        if ($result && $result->rowCount() > 0) {
            echo "<table><tr><th>ID</th><th>Utilisateur</th><th>Message</th><th>Timestamp</th><th>Actions</th></tr>";
            while ($row = $result->fetch()) {
                echo "<tr>
                    <td>" . htmlspecialchars($row["idChat"]) . "</td>
                    <td>" . htmlspecialchars($row["username"]) . "</td>
                    <td>" . htmlspecialchars($row["message"]) . "</td>
                    <td>" . htmlspecialchars($row["timestamp"]) . "</td>
                    <td>
                        <button onclick='supprimerMessageChat(" . htmlspecialchars($row["idChat"]) . ")'>Supprimer</button>
                    </td>
                  </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Aucun message de chat trouvé.</p>";
        }
        ?>
    </div>

</body>

</html>