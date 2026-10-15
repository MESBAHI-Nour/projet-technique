<?php
    require_once "../classes/GestionGenre.php";
    class GenreController{
        private GestionGenre $gestion;
        public function __construct(){
            $this->gestion=new GestionGenre();
        }
        public function listerGenres(){
            $genres=$this->gestion->getAll();
            $data=[];
            foreach ($genres as $g){
                $data[]=[
                    "id"=>$g->getId(),
                    "description"=>$g->getDescription(),
                    "nom"=>$g->getNom()
                ];
            }

            return $data;
        }
    }
?>