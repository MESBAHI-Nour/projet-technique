<?php
    require_once "../classes/GestionGenre.php";
    class ControllerGenre{
        private GestionGenre $gestion;
        public function __construct(){
            $this->gestion= new GestionGenre();
        }

        public function listerGenres(){
            $genres=$this->gestion->AfficherTous();
            $data=[];
            foreach($genres as $genre){
                $data[]=[
                    "id"=>$genre->getId(),
                    "nom"=>$genre->getNom(),
                    "description"=>$genre->getDescription(),
                ];
            }
            return $data;
        }

        public function ajouterGenre(){
            $input=json_decode(file_get_contents("php://input"),true);
            $this->gestion->ajouter($input["nom"],$input["description"]);
            return ["message"=>"Genre ajouté avec succès"];
        }
    }
?>