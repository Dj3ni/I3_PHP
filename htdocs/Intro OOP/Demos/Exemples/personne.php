<?php
declare(strict_types = 1);

// Création d'une classe

class Personne{
    //propriétés: visibilité + type + nom de variable
    public string $prenom; 
    public string $hobby;

    // méthodes(fonction): on ne doit pas mettre de paramètres car elle est interne à la classe
    public function affiche(): void{
        echo("Hello ". $this->prenom . " tu vas bien?" ); 
        // le $this-> fait référence au paramètre de la même classe 
    }

    public function chanter(): void{
        print("<br>Lalala");
    }
}