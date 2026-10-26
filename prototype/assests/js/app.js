const btnAjouter = document.getElementById("btn-show-form");
const btnAnnuler = document.getElementById("btn-cancel-form");
const Form=document.getElementById("form-genre");
const tbody=document.getElementById("table-categories-body");
const api="http://localhost:8000/backend/api/api.php";
const sectionForm=document.getElementById("section-form");


function setLoadingState(isLoading) {
    
    if (isLoading) {
        btnAjouter.disabled = true;
        btnAjouter.textContent = 'Enregistrement…';
    } else {
        btnAjouter.disabled = false;
        btnAjouter.textContent = 'Enregistrer';
    }
}

function showToast(message, type = 'success') {
    const container = document.getElementById('toast-container');
    const toast = document.createElement('div');

    const color = type === 'success'
        ? 'bg-green-500'
        : 'bg-red-500';

    toast.className = `
        ${color} text-white px-5 py-3 rounded-lg shadow-lg
        transition-opacity duration-500
    `;

    toast.textContent = message;
    container.appendChild(toast);

    setTimeout(() => {
        toast.style.opacity = '0';

        setTimeout(() => toast.remove(), 500);
    }, 3000);
}


function afficherGenre(){
    fetch(api).then(response=>response.json())
    .then(data=>{ 
        data.forEach(genre=>{
        const tr=document.createElement("tr")
        tr.innerHTML=`
            <td>${genre['id']}</td>
            <td>${genre['nom']}</td>
            <td>${genre['description']}</td>
        `
        tbody.appendChild(tr);
        })
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
            tbody.innerHTML = ""
            afficherGenre();
            showToast("Genre ajouté avec succès !", "success");
            Form.reset();
        }).catch(error => {
            setLoadingState(false);
            showToast("Erreur lors de l'ajout du genre.", "error");
            console.error("Erreur:", error);
        })})

    btnAnnuler.addEventListener("click", function() {
        sectionForm.classList.add("hidden");
    })
    btnAjouter.addEventListener("click", function() {
        sectionForm.classList.remove("hidden");
    })
})