<?php
require_once "../class/genre.php";
header('Content-Type: application/json');
 class GestionGenre{
    private string $path_file;

    public function __construct(){
        $this->path_file="../database/gestionGenre.json";
    }

    public function afficherGenre(){
        $content=file_get_contents($this->path_file);
        $genres=json_decode($content,true);
        echo json_encode($genres);
    }

    public function addGenre(){
        $content=file_get_contents($this->path_file);
        $genres=json_decode($content,true);
        $data=json_decode(file_get_contents("php://input"),true);
        $genres[]=[
            "id_genre"=>count($genres)+1,
            "nom_genre"=>$data["nom_genre"],
            "description_genre"=>$data["description_genre"]
        ];
        file_put_contents($this->path_file,json_encode($genres,JSON_PRETTY_PRINT));
        echo json_encode($genres);
    }

    public function requestTraitement(){
        $method=$_SERVER["REQUEST_METHOD"];
        if ($method=="GET"){
            $this->afficherGenre();
        }
        if ($method=="POST"){
            $this->addGenre();
        }
    }
 }

 $api= new GestionGenre();
 $api->requestTraitement()
?>