const API = "../../backend/admin/api/genres.php";
const table = document.getElementById("table-genre");
const form = document.getElementById("form-genre");
const btnAjouter =document.getElementById("btn-ajouter");
const inputNom =document.getElementById("nom");
const inputdescription =document.getElementById("description");

function afficherGenres() {

    fetch(API).then(response => response.json())
    .then(genres => {
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

        })

        .catch(error => {
            console.error(error);
        });
}

document.addEventListener("DOMContentLoaded",()=>afficherGenres())