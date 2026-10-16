<?php
    require_once "Genre.php";
    class GestionGenre{
        private  $datafile;
        public function __construct(){
            $this->datafile="../data/Genre.json";
        }

        public function AfficherToutGenre(){
            $genres=json_decode(file_get_contents($this->datafile),true);
            return $genres;
        }


        public function AjouterGenre($nom,$description){
            $genres=$this->AfficherToutGenre();
            $id=count($genres)+1;
            $genre=new Genre($id,$nom,$description);
            $genres[]=[
                "id"=>$genre->getId(),
                "nom"=>$genre->getNom(),
                "description"=>$genre->getDescription(),
            ];
            file_put_contents($this->datafile,json_encode($genres,JSON_PRETTY_PRINT));
        }
    }

?>