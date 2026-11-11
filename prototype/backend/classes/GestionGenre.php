<?php
    require_once "genre.php";
    class GestionGenre extends BaseService{
        private static $dataFile ="../data/genres.json";
        public function getAll(){
            try{
                $genres=[];
                $genresJson=file_get_contents(self::$dataFile);
                $genresData=json_decode($genresJson,true);
                foreach($genresData as $g){
                    $genre=new Genre($g["id"],$g["description"],$g["nom"]);
                    $genres[]=$genre;
                }
                return $genres;
            }
            catch(Exception $e){
                throw new Exception("Erreur lors de la lecture du fichier JSON : " . $e->getMessage());
            }
        }

        public function ajouter($description,$nom):void{
          try{
                $genres=$this->getAll();
                $id=count($genres)+1;
                $genre=new Genre($id,$description,$nom);
                $genres[]=$genre;
                $data=[];
                foreach ($genres as $g){
                        $data[]=[
                            "id"=>$g->getId(),
                            "nom"=>$g->getNom(),
                            "description"=>$g->getDescription()
                        ];
                } 
                    file_put_contents(self::$dataFile,json_encode($data,JSON_PRETTY_PRINT));
          }
          catch(Exception $e){
              throw new Exception("Erreur lors de l'ajout du genre : " . $e->getMessage());
          }
        }
    }
?>