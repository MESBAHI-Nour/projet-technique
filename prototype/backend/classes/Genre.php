<?php
    class Genre{
        private $id;
        private $description;
        private $nom;

        public function __construct(int $id,string $description,string $nom){
            $this->id=$id;
            $this->description=$description;
            $this->nom=$nom;
        }

        public function getId():int{
            return $this->id;
        }
        public function getDescription():string{
            return $this->description;
        }
        public function getNom():string{
            return $this->nom;
        }

    }
?>