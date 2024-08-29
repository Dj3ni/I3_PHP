<?php

abstract class AnimalBase {
    public string $nom;
    public string $dateNaissance;

    // Methode concrète
    public function direBonjour(){
        echo("Mew!");
    }

    // Méthode abstraite
    public abstract function mange():void;
}