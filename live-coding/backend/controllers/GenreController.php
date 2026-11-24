<?php
    require_once "../classes/GestionGenre.php";
    class GenreController{
        private GestionGenre $gestion;

        public function __construct(){
            $this->gestion=new GestionGenre();
        }

        public function Afficher(){
            return $this->gestion->AfficherToutGenre();
        }

        public function Ajouter(){
           $input=json_decode(file_get_contents("php://input"),true);
           $this->gestion->AjouterGenre($input["nom"],$input["description"]);
        }
    }
?>