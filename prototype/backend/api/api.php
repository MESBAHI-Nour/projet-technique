<?php
    require_once "../controllers/GenreController.php";
    header("Content-Type:application/json");
    $controllerGenre=new GenreController();
    $methode=$_SERVER["REQUEST_METHOD"];
    if($methode=="GET"){
        try{
            echo json_encode($controllerGenre->listerGenres());
        }
        catch(Exception $e){
            http_response_code(500);
            echo json_encode(["error" => "Erreur lors de la récupération des thématiques"]);
        }
    }

    else if($methode=="POST"){
        try{
            echo json_encode($controllerGenre->ajouterGenre());
        }
        catch(Exception $e){
            http_response_code(500);
            echo json_encode(["error" => "Erreur lors de la joute des thématiques"]);
        }
    }
?>