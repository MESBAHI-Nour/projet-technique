const api="http://localhost:8000/backend/api/api.php"
const tbody=document.getElementById("table-categories-body")
const form=document.getElementById("form-genre")
const nom=document.getElementById("nom")
const description=document.getElementById("description")
const BtnAjouter=document.getElementById("btn-show-form")
const sectionForm=document.getElementById("section-form")
const btnAnnuler=document.getElementById("btn-cancel-form")
const toastContainer=document.getElementById("toast-container")


function toast(message,type=true){
    let color=type?"bg-green-500":"bg-red-500"
    const toast = document.createElement('div')
    toast.classList.add(color,"text-white","m-3")
    toast.textContent=message
    toastContainer.appendChild(toast)
    setTimeout(()=>{
        toast.style.opacity=0
        toast.remove()
    },2000)
}

function afficher(){
    fetch(api)
    .then(response=>response.json())
    .then(data=>{
        data.forEach(genre => {
            const tr=document.createElement("tr")
            tr.className="border-b hover:bg-gray-200"
            tr.innerHTML=`
                <td class="p-4">${genre["id"]}</td>
                <td class="p-4">${genre["nom"]}</td>
                <td class="p-4">${genre["description"]}</td>
            `
            tbody.appendChild(tr)
        })
    }).catch(error=>console.error(error))
}


document.addEventListener("DOMContentLoaded",()=>{
    afficher()
    if(form){
        form.addEventListener("submit",(e)=>{
            e.preventDefault()
            fetch(api,{
                method:"POST",
                headers:{"Content-Type":"application/json"},
                body:JSON.stringify({
                    nom:nom.value,
                    description:description.value
                })
            }).then(response=>response.json())
            .then(data=>{
                form.reset()
                if(!data.success){
                    throw Error(data.message)
                }
                toast("genre bien ajoute!")
                sectionForm.classList.add("hidden")
                tbody.innerHTML=""
                afficher()
            }
            ).catch(error=>toast(error,false))
        })
    }
    BtnAjouter.addEventListener("click",()=>sectionForm.classList.remove("hidden"))
    btnAnnuler.addEventListener("click",()=>sectionForm.classList.add("hidden"))


})