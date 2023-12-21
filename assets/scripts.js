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

//fonction pour masque l'img de fond de login

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
function afficherFormulaireModificationParticipant(idParticipant) {
    var form = document.getElementById('formModifContainerParticipant_' + idParticipant);
    form.style.display = form.style.display === 'block' ? 'none' : 'block';
}
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

