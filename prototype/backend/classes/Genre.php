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

        public function __equal(Genre $genre):bool{
            return $this->id==$genre->getId();
        }

    }

    $genre1 = new Genre(1,"Description du genre 1","Nom du genre 1");
    $genre2 = new Genre(2,"Description du genre 2","Nom du genre 2");
    echo $genre1->__equal($genre2) ? "Les genres sont égaux" : "Les genres ne sont pas égaux";

?>