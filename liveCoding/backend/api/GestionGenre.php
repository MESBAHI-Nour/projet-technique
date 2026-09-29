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
        $genres=file_get_contents("https://input");
        

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