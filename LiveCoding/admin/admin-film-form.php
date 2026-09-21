<?php
    require_once("../config/connexion.php");
    $req=$connexion->prepare("SELECT * FROM genre");
    $req->execute();
    $genres=$req->fetchAll();
    $req=$connexion->prepare("SELECT * FROM realisateur");
    $req->execute();
    $realisateurs=$req->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Produit</title>
    <link rel="stylesheet" href="../style/admin-film-form.css">
</head>
<body>
    <main>
        <a href="../index.php">Retour</a>
        <h1>Ajouter Films</h1>
        <form method="POST" action="add-film-form.php" enctype="multipart/form-data">
            <label>Titre Film</label>
            <input type="text" name="titre_film" id="titre_film">
            <label>Description Film</label>
            <textarea name="description_film" id="description_film"></textarea>
            <label>Date sortie</label>
            <input type="date" name="date_sortie" id="date_sortie">
            <label>Duree</label>
            <input type="number" min="0" name="duree" id="duree">
            <label>Classification d'Age</label>
            <input type="text" name="classification_age" id="classification_age">
            <label>Poster Film</label>
            <input type="file" name="poster_film_url" id="poster_film_url" accept="image/*">
            <label>video stream Film</label>
            <input type="file" name="video_stream_film" id="video_stream_film" accept="video/*">
            <label>Genre</label>
            <select name="id_genre" id="id_genre">
                <?php
                    foreach($genres as $genre){
                ?>
                    <option value="<?=$genre["id_genre"]?>"><?=$genre["nom_genre"]?></option>
                <?php
                    }
                ?>
            </select>
            <label>Realisateur</label>
            <select name="id_realisateur" id="id_realisateur">
                <?php
                    foreach($realisateurs as $realisateur){
                ?>
                    <option value="<?=$realisateur["id_realisateur"]?>"><?=$realisateur["nom_realisateur"]?></option>
                <?php
                    }
                ?>
            </select>
            <button type="submit">Ajouter</button>
        </form>
    </main>
</body>
</html>