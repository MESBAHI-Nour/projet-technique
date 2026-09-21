function verifierFormulaire(event) {
    let titre = document.getElementById("titre_film").value;
    let description = document.getElementById("description_film").value;
    let duree = document.getElementById("duree").value;
    let poster = document.getElementById("poster_film").files[0];
    let video = document.getElementById("video_stream").files[0];
    let msg = document.getElementById("msg");


    if (titre=="" || description=="" || duree == 0 || !poster || !video) {
        event.preventDefault();
        msg.innerHTML = "Toutes les champs sont obligatoire";
        return;
    }
}