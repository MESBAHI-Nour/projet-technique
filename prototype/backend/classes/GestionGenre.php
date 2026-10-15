<?php
    require_once "genre.php";
    class GestionGenre{
        private static $dataFile ="../data/genres.json";
        public function getAll(){
            $genres=[];
            $genresJson=file_get_contents(self::$dataFile);
            $genresData=json_decode($genresJson,true);
            foreach($genresData as $g){
                $genre=new Genre($g["id"],$g["description"],$g["nom"]);
                $genres[]=$genre;
            }
            return $genres;
        }
    }
?>