const API = "../../backend/admin/api/genres.php";
const table = document.getElementById("table-genre");
const form = document.getElementById("form-genre");
const nom =document.getElementById("nom");
const description =document.getElementById("description");

function afficherGenres() {

    fetch(API).then(response => response.json())
    .then(genres => {
            if (table){
                table.innerHTML = "";
                genres.forEach(genre => {
                    table.insertAdjacentHTML(
                        "beforeend",
                        `
                        <tr class="border-b hover:bg-gray-50">

                            <td class="p-4">
                                ${genre.id_genre}
                            </td>

                            <td class="p-4">
                                ${genre.nom_genre}
                            </td>

                            <td class="p-4">
                                ${genre.description_genre}
                            </td>

                        </tr>
                        `
                    );

                });






























            }

        })

        .catch(error => {
            console.error(error);
        });
}

document.addEventListener("DOMContentLoaded",()=>afficherGenres())

if (form){
    form.addEventListener("submit",(event)=>{
        event.preventDefault();
        fetch(API,{
            method:"POST",
            headers:{
                "content-type":"application/json"
            },
            body:JSON.stringify({
                nom:nom.value,
                description:description.value
            })
        }).then(response => response.json())
            .then(data =>{
                console.log(data)
                form.reset()
                window.location.href = "../pages/admin-genres.html"
        }).catch(error => console.error(error))
    })
}