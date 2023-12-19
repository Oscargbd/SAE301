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
    form.style.display = 'block';
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
    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            alert("Modifications enregistrées");
            location.reload(); // Rechargement de la page qui permet l'actualisation de l'affichage des données
        }
    }
    xhr.send(formData);
}

//fonction pour masque l'img de fond de login

document.addEventListener("DOMContentLoaded", function() {
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
        xhr.open("GET", "actions/supprimerUtilisateur.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                alert("Utilisateur supprimé");
                location.reload();// Rechargement de la page qui permet l'actualisation de l'affichage des données
            }
        }
        xhr.send("idUtilisateur=" + idUtilisateur);
    }
}
