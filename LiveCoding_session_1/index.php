<?php
    require_once("config/connexion.php");
    $req=$connexion->prepare("SELECT * FROM film f INNER JOIN genre g ON f.id_genre=g.id_genre
        INNER JOIN realisateur r ON f.id_realisateur=r.id_realisateur");
    $req->execute();
    $films=$req->fetchAll()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuille</title>
    <link rel="stylesheet" href="style/index.css">
</head>
<body>
    <a href="admin/admin-film-form.php">Ajouter Film</a>
   <main>
    <h1>Ajouter Film</h1>
        <table>
            <thead>
                <tr>
                    <th>ID film</th>
                    <th>Poster de film</th>
                    <th>Description Film</th>
                    <th>Date De Sortie</th>
                    <th>Duree</th>
                    <th>Classification d'age</th>
                    <th>Genre</th>
                    <th>Realisateur</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($films as $film){
                ?>
                    <tr>
                        <td><?=$film["titre_film"]?></td>
                        <td><img src="<?=$film["poster_film_url"]?>" alt=""></td>
                        <td><?=$film["description_film"]?></td>
                        <td><?=$film["date_sortie"]?></td>
                        <td><?=$film["duree"]?></td>
                        <td><?=$film["classification_age"]?></td>
                        <td><?=$film["nom_genre"]?></td>
                        <td><?=$film["nom_realisateur"]?></td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
   </main> 
</body>
</html>