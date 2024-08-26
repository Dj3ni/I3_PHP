<?php

class Acteur{


}

class Serie{
    public string $title;
    public int $seasons;
    public array $actorsList;

    // Constructeur

    public function __construct(string $title, int $seasons, array $actorsList = []){
        $this->title = $title;
        $this->seasons = $seasons;
        $this->actorsList = $actorsList;
    }

    // Méthodes

    public function displaySerie():void{
        echo("Infos sur la série: <br>");
        echo("Nom de la série: ". $this->title."<br>");
        echo("Nombre de saisons: ".$this->seasons." saisons.<br>");
        echo("Casting: <br>");
        echo("<ul>");
        foreach($this->actorsList as $actor){
            echo("<li> ".$actor."</li>");
        }
        ("</ul>");
    }
}