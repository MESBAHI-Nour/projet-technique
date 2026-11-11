<?php
    require_once "../services/GenreService.php";
    header("Content-Type: application/json");
    $methode=$_SERVER["REQUEST_METHOD"];
    $service=new GenreService();
    if($methode=="GET"){
        echo json_encode($service->listerGenres());
    }
    if($methode=="POST"){
        echo json_encode($service->ajouterGenre());
    }
?>