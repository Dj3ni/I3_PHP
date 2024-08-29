<?php

include("./connexion/configDB.php");

class FilmManager {

    private PDO $cnx;

    public function __construct(){

        // 1. Connexion à la DB
        try {
            $this->cnx = new PDO(DSN, USERNAME, PASSWORD);
        } catch (Exception $e) {
            echo ("Connexion to DB failed");
            die();
        }
    }
    // Create

    public function insert(Film $film) {
        
        // 2. Préparation de la requête SQL
        $sql = "INSERT INTO film (id, title, duration, synopsis, dateParution, image) VALUES (null, :title, :duration, :synopsis, :dateParution, :image)";

        $stmt = $this->cnx->prepare($sql);
        $stmt->bindValue(":title", $film->getTitle());
        $stmt->bindValue(":duration",$film->getDuration());
        $stmt->bindValue(":synopsis",$film->getSynopsis());
        $stmt->bindValue(":dateParution",$film->getDateParution()->format("d-m-Y"));
        $stmt->bindValue(":image",$film->getImage());

        // 3. Exécution de la requête
        $stmt->execute();
        $id = $this->cnx->lastInsertId(); //On récupère l'id du dernier objet inséré dans la DB
        $film->setId($id);
    }

    // Delete
    public function delete(Film $film){
        $sql  = "DELETE FROM film WHERE id=:id";
        $stmt = $this->cnx->prepare($sql);
        $stmt->bindValue(":id", $film->getId());
        $stmt->execute();
    }

    // Read
    public function findAll():array{
        $sql = "SELECT * FROM film";
        $stmt=$this->cnx->prepare($sql);
        $stmt->execute();
        $arrayArraysFilms = $stmt->fetchAll(PDO::FETCH_ASSOC); //array d'arrays avec infos film
        $arrayObjetFilm = []; //notre array d'objets film

        foreach($arrayArraysFilms as $arrayFilm){
            $arrayFilm["dateParution"]= new DateTime($arrayFilm["dateParution"]);
            $arrayObjetFilm[] = new Film($arrayFilm);
        }
        // var_dump($arrayObjetFilm); //for debug
        return($arrayObjetFilm);
    }

    // Update

    public function update(Film $unFilm){
        $sql = "UPDATE film SET title=:title, duration=:duration, synopsis=:synopsis, dateParution=:dateParution, image=:image WHERE id=:id";//attention à bien mettre where, sinon on fait la modif pour toute la DB!

        $stmt = $this->cnx->prepare($sql);
        $stmt->bindValue(":title", $unFilm->getTitle());
        $stmt->bindValue(":duration",$unFilm->getDuration());
        $stmt->bindValue(":synopsis",$unFilm->getSynopsis());
        $stmt->bindValue(":dateParution",$unFilm->getDateParution()->format("d-m-Y"));
        $stmt->bindValue(":image",$unFilm->getImage());
        $stmt->bindValue(":id", $unFilm->getId());

        $stmt->execute();

    }


}