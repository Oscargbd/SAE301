// Fonction qui fait dérouler la page au clic sur la flèche
let flecheBas = document.getElementById('flecheBas');
function scrollFleche() {
    window.scrollTo({
        top: 700,
        left: 0,
        behavior: "smooth"
    });
}
flecheBas.addEventListener('click', scrollFleche);

// Fonction pour ouvrir un onglet de contenu
function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Fonction pour afficher ou masquer le formulaire de modification d'utilisateur
function afficherFormulaireModification(idUtilisateur) {
    var form = document.getElementById('formModif_' + idUtilisateur);

    // Vérifie si le formulaire est déjà affiché
    if (form.style.display === 'block') {
        // Si oui, le cacher
        form.style.display = 'none';
    } else {
        // Sinon, l'afficher
        form.style.display = 'block';
    }
}

// Fonction pour modifier un utilisateur
function modifierUtilisateur(event, idUtilisateur) {
    event.preventDefault(); // Empêcher le formulaire de se soumettre normalement

    var form = document.querySelector('.js__formAdmin' + idUtilisateur);
    if (!form) {
        console.error('Le formulaire n\'a pas été trouvé pour l\'utilisateur avec l\'ID:', idUtilisateur);
        return;
    }

    var formData = new FormData(form);
    for (let [key, value] of formData.entries()) {
        console.log(key, value);
    }

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "actions/modifierUtilisateur.php", true);
    xhr.onreadystatechange = function () {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            alert("Modifications enregistrées");
            location.reload(); // Rechargement de la page qui permet l'actualisation de l'affichage des données
        }
    }
    xhr.send(formData);
}

// Fonction pour gérer l'affichage de l'image de fond en fonction de la taille de la fenêtre
document.addEventListener("DOMContentLoaded", function () {
    const imageContainer = document.querySelector('.pageLogin > div'); // Conteneur de l'image
    let imageExists = true; // Flag pour vérifier si l'image existe dans le DOM

    function updateImageInDOM() {
        if (window.innerWidth < 670 && imageExists) {
            // Si la largeur de la fenêtre est inférieure à 734px et que l'image existe
            document.querySelector('.img-login').remove(); // Retirer l'image du DOM
            imageExists = false; // Marquer que l'image n'est plus dans le DOM
        } else if (window.innerWidth >= 670 && !imageExists) {
            // Si la largeur de la fenêtre est supérieure ou égale à 734px et que l'image n'existe pas
            const newImage = document.createElement('img');
            newImage.src = 'img/fondLoginPng.png'; // Mettez le chemin correct de l'image
            newImage.classList.add('img-login');
            imageContainer.insertBefore(newImage, imageContainer.firstChild); // Ajouter l'image au début du conteneur
            imageExists = true; // Marquer que l'image est maintenant dans le DOM
        }
    }

    // Vérifier la taille de la fenêtre lors du chargement de la page
    updateImageInDOM();

    // Vérifier la taille de la fenêtre chaque fois qu'elle est redimensionnée
    window.addEventListener('resize', updateImageInDOM);
});

// Fonction pour supprimer un utilisateur
function supprimerUtilisateur(idUtilisateur) {
    if (confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur ?")) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "actions/supprimerUtilisateur.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                alert("Utilisateur supprimé");
                location.reload();// Rechargement de la page qui permet l'actualisation de l'affichage des données
            }
        }
        xhr.send("idUtilisateur=" + idUtilisateur);
    }
}

// Fonction pour créer un nouvel utilisateur
function creerUtilisateur(event) {
    event.preventDefault();
    var form = document.getElementById('formCreerUtilisateur');
    var formData = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "actions/creerUtilisateur.php", true);
    xhr.onreadystatechange = function () {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            alert("Utilisateur créé avec succès");
            location.reload();
        }
    }
    xhr.send(formData);
}

// Fonction pour modifier un parcours
function modifierParcours(event, idParcours) {
    event.preventDefault(); // Empêcher la soumission standard du formulaire

    var form = document.getElementById('formModifParcours_' + idParcours);
    var formData = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "actions/modifierParcours.php", true);
    xhr.onreadystatechange = function () {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            alert("Modifications enregistrées");
            location.reload(); // Recharger la page pour afficher les modifications
        }
    };
    xhr.send(formData);
}

// Fonction pour supprimer un parcours
function supprimerParcours(idParcours) {
    if (confirm("Êtes-vous sûr de vouloir supprimer ce parcours ?")) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "actions/supprimerParcours.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                alert("Parcours supprimé");
                location.reload(); // Rechargement de la page pour actualiser l'affichage
            }
        }
        xhr.send("idParcours=" + idParcours);
    }
}

// Fonction pour créer un nouveau parcours
function creerParcours(event) {
    event.preventDefault();
    var form = document.getElementById('formCreerParcours');
    var formData = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "actions/creerParcours.php", true);
    xhr.onreadystatechange = function () {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            alert("Parcours créé avec succès");
            location.reload(); // Rechargement de la page
        }
    }
    xhr.send(formData);
}

// Fonction pour afficher ou masquer le formulaire de modification de participant
function afficherFormulaireModificationParticipant(idParticipant) {
    var form = document.getElementById('formModifContainerParticipant_' + idParticipant);
    form.style.display = form.style.display === 'block' ? 'none' : 'block';
}

// Fonction pour modifier un participant
function modifierParticipant(event, idParticipant) {
    event.preventDefault(); // Empêcher la soumission standard du formulaire

    var form = document.querySelector('.js__formParticipant' + idParticipant);
    if (!form) {
        console.error('Le formulaire n\'a pas été trouvé pour le participant avec l\'ID:', idParticipant);
        return;
    }

    var formData = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "actions/modifierParticipant.php", true);
    xhr.onreadystatechange = function () {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            alert("Modifications enregistrées");
            location.reload(); // Recharger la page pour afficher les modifications
        }
    };
    xhr.send(formData);
}

// Fonction pour supprimer un participant
function supprimerParticipant(idParticipant) {
    if (confirm("Êtes-vous sûr de vouloir supprimer ce participant ?")) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "actions/supprimerParticipants.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                alert("Participant supprimé avec succès.");
                location.reload(); // Rechargement de la page pour actualiser l'affichage
            }
        };
        xhr.send("idParticipant=" + idParticipant);
    }
}

// Fonction pour créer un nouveau participant
function creerParticipant(event) {
    event.preventDefault(); // Empêcher le formulaire de se soumettre normalement

    var form = document.getElementById('formCreerParticipant');
    var formData = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "actions/creerParticipant.php", true);
    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            alert("Participant créé avec succès");
            location.reload(); // Recharger la page pour afficher les nouvelles données
        }
    };
    xhr.send(formData);
}

// Fonction pour supprimer un message de chat
function supprimerMessageChat(idChat) {
    if (confirm("Êtes-vous sûr de vouloir supprimer ce message de chat ?")) {
        // Créez un objet XMLHttpRequest
        var xhr = new XMLHttpRequest();

        // Configurez la requête POST vers le script PHP de suppression
        xhr.open('POST', 'actions/supprimerMessageChat.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        // Fonction de rappel appelée lorsque la requête est terminée
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Affichez la réponse du serveur (message de succès ou d'erreur)
                alert("Message supprimé avec succès.");
                
                // Rechargez la page pour afficher les changements (message supprimé)
                location.reload();
            } else {
                alert("Erreur lors de la suppression du message.");
            }
        };

        // Envoyez la requête POST avec l'ID du chat à supprimer
        xhr.send('idChat=' + idChat);
    }
}

// Fonction pour gérer le menu burger
document.addEventListener('DOMContentLoaded', function () {
    var sidenav = document.getElementById("mySidenav");
    var openBtn = document.getElementById("openBtn");
    var closeBtn = document.getElementById("closeBtn");

    openBtn.addEventListener('click', function (event) {
        event.preventDefault();
        openNav();
    });

    closeBtn.addEventListener('click', function (event) {
        event.preventDefault();
        closeNav();
    });

    function openNav() {
        sidenav.classList.add("active");
    }

    function closeNav() {
        sidenav.classList.remove("active");
    }
});
