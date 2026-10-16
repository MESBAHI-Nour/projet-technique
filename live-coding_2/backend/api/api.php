<?php
    require_once "../controllers/GenreController.php";
    header("Content-Type:application/json");
    $controller=new GenreController();
    $method=$_SERVER["REQUEST_METHOD"];
    if($method=="GET"){
        echo json_encode($controller->Afficher());
    }

    if($method=="POST"){
        echo json_encode($controller->Ajouter());
    }

?>