<?php
    require_once "../services/GenreService.php";
    header("Content-Type:application/json");
    $service=new GenreService();
    $method=$_SERVER["REQUEST_METHOD"];
    if($method=="GET"){
        echo json_encode($service->Afficher());
    }

    if($method=="POST"){
        echo json_encode($service->Ajouter());
    }

?>