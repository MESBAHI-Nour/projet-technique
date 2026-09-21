<?php

require_once ("../config/connexion.php");

    $titre_film = $_POST["titre_film"];
    $description_film = $_POST["description_film"];
    $date_sortie = $_POST["date_sortie"];
    $duree = $_POST["duree"];
    $classification_age = $_POST["classification_age"];
    $id_realisateur = $_POST["id_realisateur"];
    $id_genre = $_POST["id_genre"];


    $poster_nom = $_FILES["poster_film"]["name"];
    $poster_tmp = $_FILES["poster_film"]["tmp_name"];
    $poster_chemin = "../poster/" . $poster_nom;

    move_uploaded_file($poster_tmp, $poster_chemin);


    $video_nom = $_FILES["video_stream"]["name"];
    $video_tmp = $_FILES["video_stream"]["tmp_name"];
    $video_chemin = "../video/" . $video_nom;


    move_uploaded_file($video_tmp, $video_chemin);


    $req = $connexion->prepare("INSERT INTO film
            (
                titre_film,
                description_film,
                date_sortie,
                duree,
                classification_age,
                poster_film_url,
                video_stream_url,
                id_realisateur,
                id_genre
            )
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $req->execute([
        $titre_film,
        $description_film,
        $date_sortie,
        $duree,
        $classification_age,
        $poster_chemin,
        $video_chemin,
        $id_realisateur,
        $id_genre
    ]);

    header("location:../index.php")


?>