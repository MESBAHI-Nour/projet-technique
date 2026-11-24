<?php
    require_once "../dao/GenreDAO.php";
    require_once "BaseService.php";
    class GenreService extends BaseService{
        private GenreDAO $dao;

        public function __construct(){
            $this->dao=new GenreDAO();
        }

        public function Afficher(){
            return $this->dao->AfficherToutGenre();
        }

        public function Ajouter(){
           $input=json_decode(file_get_contents("php://input"),true);
           try{
                if (strlen($input["nom"])<4){
                    throw new Exception("le nom doit etre plus de 4 caracteres!");
                }
           }
           catch(Exception $e){
                http_response_code(500);
                return ["message"=>$e->getMessage(),"success"=>false];
           }
           http_response_code(200);
           $this->dao->AjouterGenre($input["nom"],$input["description"]);
           return ["message"=>"le genre est bien ajoute!","success"=>true];
        }
    }
?>