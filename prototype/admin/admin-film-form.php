<?php
    require_once("../config/connexion.php");
    $req= $connexion->prepare("SELECT * FROM genre");
    $req->execute();
    $genres=$req->fetchAll(); 
    $req= $connexion->prepare("SELECT * FROM realisateur");
    $req->execute();
    $realisateurs=$req->fetchAll(); 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/admin-film-form.css">
</head>
<body>
    <a href="../index.php">Retour</a>
    <div>
        <h1>Ajouter Film</h1>
        <form method="POST" action="add-film-action.php" enctype="multipart/form-data" onsubmit="verifierFormulaire(event)">
            <label>Titre du film :</label>
            <input type="text" id="titre_film" name="titre_film">

            <br><br>

            <label>Description :</label>
            <textarea id="description_film" name="description_film"></textarea>

            <br><br>

            <label>Date de sortie :</label>
            <input type="date" id="date_sortie" name="date_sortie">

            <br><br>

            <label>Duree :</label>
            <input type="number" id="duree" name="duree" min="0">

            <br><br>

            <label>Classification :</label>
            <input type="text" id="classification_age" name="classification_age">

            <br><br>

            <label>Poster :</label>
            <input type="file"
                id="poster_film"
                name="poster_film"
                accept="image/*">

            <br><br>

            <label>Video :</label>
            <input type="file"
                id="video_stream"
                name="video_stream"
                accept="video/*">

            <br><br>

            <label>realisateur :</label>
            <select name="id_realisateur" id="id_realisateur">
                <?php
                    foreach ($realisateurs as $realisateur){
                ?>
                <option value="<?= $realisateur["id_realisateur"]?>"><?= $realisateur["nom_realisateur"]?></option>
                <?php
                    }
                ?>
            </select>

            <br><br>

            <label>genre :</label>
            <select id="id_genre" name="id_genre">
                <?php
                    foreach ($genres as $genre){
                ?>
                <option value="<?= $genre["id_genre"]?>"><?= $genre["nom_genre"]?></option>
                <?php
                    }
                ?>
            </select>

            <br><br>

            <p id="msg"></p>

            <button type="submit">
                Ajouter le film
            </button>

        </form>
    </div>

</body>
</html>


<script src="validation.js"></script>