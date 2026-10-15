<?php
    require_once "../controllers/GenreController.php";
    header("Content-Type:application/json");
    $controllerGenre=new GenreController();
    $methode=$_SERVER["REQUEST_METHOD"];
    if($methode=="GET"){
        echo json_encode($controllerGenre->listerGenres());
    }
?>