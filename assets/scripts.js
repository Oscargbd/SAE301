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
            //location.reload(); // Pour simplifier, rechargez la page
        }
    }
    xhr.send(formData);
}
