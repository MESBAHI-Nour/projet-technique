<?php
    require_once "Genre.php";
    class GestionGenre{
        private static $dataFile="../data/Genres.json";

        public function AfficherTous(){
            $data=[];
            $genres=json_decode(file_get_contents(self::$dataFile),true);
            foreach($genres as $genre){
                $g=new Genre($genre["id"],$genre["nom"],$genre["description"]);
                $data[]=$g;
            }
            return $data;
        }

        public function ajouter($nom,$description){
            $data=[];
            $genres=$this->AfficherTous();
            $id=count($genres)+1;
            $genres[]=new Genre($id,$nom,$description);
            foreach ($genres as $genre){
                $data[]=[
                    "id"=>$genre->getId(),
                    "nom"=>$genre->getNom(),
                    "description"=>$genre->getDescription(),
                ];
            }

            file_put_contents(self::$dataFile,json_encode($data,JSON_PRETTY_PRINT));
        }
    }

?>