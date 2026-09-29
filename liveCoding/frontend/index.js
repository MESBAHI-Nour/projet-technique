const bodyTable=document.getElementById("bodyTable")
const api="../backend/api/GestionGenre.php"
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

document.addEventListener("DOMContentLoaded",()=>afficherGenre())