<?php
    class genre {
        private int $id_genre;
        private string $nom_genre;
        private string $description_genre;

        public function __construct(int $id=0,string $nom,string $description){
            $this->$id_genre=$id;
            $this->$nom_genre=$nom;
            $this->$description_genre=$description;
        }

        public function getNom():string {
            return $this->$nom_genre;
        }

        public function gedecription():string {
            return $this->$description_genre;
        }

        public function setNom(string $nom) : void {
            if (strlen($nom) >= 2) {
                $this->$nom_genre=$nom;
            }
        }

        public function setDescription(string $description) : void {
            if (strlen($description) >= 10){
                $this->$description_genre=$description;
            }
        }
    }
?>