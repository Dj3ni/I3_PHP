<?php
include("./Animal.php");

class Chien extends Animal{
    public string $nom;
    public string $race;
    public function __construct(string $nom, string $race){
        $this->nom = $nom;
        $this->race = $race;
    }

    public function communique(): void{
        print("<br>Wouf!");
    }

    public function affiche():void{
        print("<br> Je m'appelle ".$this->nom." et suis un chien de la race ". $this->race);
    }

    public function guide():void{
        print("Je peux guider des personnes malvoyantes");
    }
    
    public function piste():void{
        print("Je suis un excellent pisteur!");
    }
}