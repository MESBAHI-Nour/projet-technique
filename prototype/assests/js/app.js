const btnAjouter = document.getElementById("btnAjouter");
const btnAnnuler = document.getElementById("btnAnnuler");
const Form=document.getElementById("Form");
const tbody=document.getElementById("tbody");
const api="http://localhost:8000/prototype/backend/api/api.php"


function setLoadingState(isLoading) {
    
    if (isLoading) {
        btnAjouter.disabled = true;
        btnAjouter.textContent = 'Enregistrement…';
    } else {
        btnAjouter.disabled = false;
        btnAjouter.textContent = 'Enregistrer';
    }
}

function showToast(message, type) {
    const toastContainer = document.getElementById('toast-container');
    const toast = document.createElement('div');
    toast.className = `toast ${type}`;
    toast.textContent = message;
    toastContainer.appendChild(toast);
    setTimeout(() => {
        toast.remove();
    }, 3000);
}

function afficherGenre(){
    fetch(api).then(response=>response.json())
    .then(data=>{ 
        const tr=document.createElement("tr")
        tr.innerHTML=`
            <td>${data['id']}</td>
            <td>${data['nom']}</td>
            <td>${data['description']}</td>
        `
        tbody.appendChild(tr);
    })
}

document.addEventListener("DOMContentLoaded", function() {
    afficherGenre();
    Form.addEventListener("submit", function(event) {
        event.preventDefault();
        setLoadingState(true);
        fetch(api, {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                nom: document.getElementById("nom").value,
                description: document.getElementById("description").value
            })
        })
        .then(response => response.json())
        .then(data => {
            setLoadingState(false);
            afficherGenre();
            showToast("Genre ajouté avec succès !", "success");
            Form.reset();
        }).catch(error => {
            setLoadingState(false);
            showToast("Erreur lors de l'ajout du genre.", "error");
            console.error("Erreur:", error);
        })})
})