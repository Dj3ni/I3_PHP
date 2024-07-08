<?php

class Chat{
    public string $nom;
    public string $race;
    
    public function __construct(string $nom, string $race){
        $this->nom = $nom;
        $this->race = $race;
    }

    public function communique(): void{
        print("<br>Miaou!");
    }

    public function affiche():void{
        print("<br> Je m'appelle ".$this->nom." et suis un chat de la race ". $this->race);
    }
        
}