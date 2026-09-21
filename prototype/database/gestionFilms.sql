CREATE DATABASE plateforme_streaming;

USE plateforme_streaming;

CREATE TABLE realisateur (
    id_realisateur INT PRIMARY KEY AUTO_INCREMENT,
    nom_realisateur VARCHAR(100) NOT NULL,
    prenom_realisateur VARCHAR(100) NOT NULL,
    date_naissance DATE,
    nationalite VARCHAR(100),
    biographie TEXT,
    photo_realisateur_url VARCHAR(255)
);

CREATE TABLE genre (
    id_genre INT PRIMARY KEY AUTO_INCREMENT,
    nom_genre VARCHAR(100) NOT NULL,
    description_genre TEXT
);

CREATE TABLE film (
    id_film INT PRIMARY KEY AUTO_INCREMENT,
    titre_film VARCHAR(200) NOT NULL,
    description_film TEXT,
    date_sortie DATE NOT NULL,
    duree INT NOT NULL,
    classification_age INT,
    poster_film_url VARCHAR(255) NOT NULL,
    video_stream_url VARCHAR(255) NOT NULL,
    id_realisateur INT NOT NULL,
    id_genre INT NOT NULL,
    FOREIGN KEY (id_realisateur) REFERENCES realisateur(id_realisateur),
    FOREIGN KEY (id_genre) REFERENCES genre_cinematographique(id_genre)
);