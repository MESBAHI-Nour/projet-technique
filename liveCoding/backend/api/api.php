<?php
    require_once "../controller/ControllerGenre.php";
    header("Content-Type: application/json");
    $methode=$_SERVER["REQUEST_METHOD"];
    $controller=new ControllerGenre();
    if($methode=="GET"){
        echo json_encode($controller->listerGenres());
    }
    if($methode=="POST"){
        echo json_encode($controller->ajouterGenre());
    }
?>