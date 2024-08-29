<?php
declare(strict_types = 1);

class Cursus{
    public string $title;
    public string $teacher;
    public string $classroom;
    
    function affiche():void{
        echo(" Le cours de ". $this->title . " sera donné par ". $this->teacher." dans la salle ". $this->classroom.".");
    }
}


$Uml = new Cursus();
$Uml->title = "Analyse UML";
$Uml->teacher = "Leal";
$Uml->classroom = "4IT5";
$Uml->affiche();