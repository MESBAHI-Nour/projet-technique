<?php
 class Genre {
    private int $id_genre;
    private string $nom_genre;
    private string $description_genre;

    public function __construct(int $id=0,string $nom="",string $description=""){
       $this->$id_genre=$id;
        $this->nom_genre=$nom;
       $this->description_genre=$description;
    }

    public function getNom():string{
        return $this->nom_genre;
    }

    public function getDescription():string{
        return $this->description_genre;
    }

    public function setNom(string $value):void{
        $this->nom_genre=$value;
    }

    public function setDescription(string $value):void{
        $this->nom_genre=$description_genre;
    }
 }
?>