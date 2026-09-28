<?php

header("Content-Type: application/json");

require_once "../../config/connexion.php";
require_once "../class/genre.php";

$method = $_SERVER["REQUEST_METHOD"];


if ($method === "GET") {

    $req = $connexion->query("SELECT * FROM genre ORDER BY id_genre");

    $genres = $req->fetchAll();

    echo json_encode($genres);

    exit;
}


if ($method === "POST") {

    $data = json_decode(file_get_contents("php://input"), true);

    $genre = new genre();

    $genre->setNom($data["nom"]);
    
    $genre->getDescription($data["description"]);

    $req = $connexion->prepare("INSERT INTO genre (nom_genre ,description_genre) VALUES (?,?)");

    $req->execute([
        $genre->getNom(),
        $genre->getDescription()
    ]);

    echo json_encode([
        "message" => "genre bien ajoutee"
    ]);

    exit;
}