const bodyTable=document.getElementById("bodyTable")
const api="../backend/api/GestionGenre.php"
const nom_genre =document.getElementById("nom_genre")
const description_genre=document.getElementById("description_genre")
const sectionForm=document.getElementById("sectionForm")
const btnAjouter=document.getElementById("btnAjouter")
const btnAnnuler=document.getElementById("annulerBtn")
function afficherGenre(){
    fetch(api).then(response=>response.json())
    .then(data=>{
        data.forEach(element => {
            bodyTable.insertAdjacentHTML("beforeEnd",`
        <tr>
            <td>${element.id_genre}</td>
            <td>${element.nom_genre}</td>
            <td>${element.description_genre}</td>
        </tr>
        `)
        });
    }).catch(error=>console.error(error))
}



function AjouterGenre(){
    fetch(api,{
        method:"POST",
        headers:{'Content-Type': 'application/json'},
        body:JSON.stringify({
            nom_genre:nom_genre.value,
            description_genre:description_genre.value
        })
    }).then(response=>response.json())
    .then(data=>{
        console.log(data)
        document.getElementById("form").reset()
        bodyTable.innerHTML=""
        afficherGenre()
    }
    ).catch(error=>console.error(error))
}

document.getElementById("form").addEventListener("submit",event=>{
    event.preventDefault()
    AjouterGenre()
})

document.addEventListener("DOMContentLoaded",()=>afficherGenre())

btnAjouter.addEventListener("click",()=>{
    sectionForm.classList.remove("hidden")
})

btnAnnuler.addEventListener("click",()=>{
    sectionForm.classList.add("hidden")
})

