<?php

header("Content-Type: application/json");

require_once "../class/genre.php";

class GestionGenre
{
    private $path_file;

    public function __construct()
    {
        $this->path_file ="../../database/gestionGenre.json"; 
    }

    public function getGenres()
    {
        $contenu = file_get_contents($this->path_file);

        $genres = json_decode($contenu, true);

        echo json_encode($genres);
    }

    public function ajouterGenre()
    {
        $contenu = file_get_contents($this->path_file);

        $genres = json_decode($contenu, true);

        $data = json_decode(
            file_get_contents("php://input"),
            true
        );

        $genres[] = [
            "id_genre" => count($genres) + 1,
            "nom_genre" => $data["nom"],
            "description_genre" => $data["description"]
        ];

        file_put_contents(
            $this->path_file,
            json_encode($genres, JSON_PRETTY_PRINT)
        );

        echo json_encode($genres);
    }

    public function traiterRequete()
    {
        $method = $_SERVER["REQUEST_METHOD"];

        if ($method === "GET") {
            $this->getGenres();
        }

        if ($method === "POST") {
            $this->ajouterGenre();
        }
    }
}

$api = new GestionGenre();
$api->traiterRequete();