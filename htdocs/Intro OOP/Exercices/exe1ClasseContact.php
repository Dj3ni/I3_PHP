<?php

class Contact{
    public string $firstname;
    public string $name;
    private int $phoneNumber;
    private string $email;

    // Constructeur

    public function __construct( string $firstname,string $name = "", int $phoneNumber, string $email = ""){
        $this->firstname = $firstname;
        $this->name = $name;
        $this->phoneNumber = $phoneNumber;
        $this->email = $email;
    }


    // Méthodes



    public function displayContact(): void{
        print("Données de contact: <br>");
        print("Nom: ".$this->name);
        print("<br>Prénom: ".$this->firstname);
        print("<br>N° de téléphone: ".$this->phoneNumber);
        print("<br>Email: ".$this->email);
    }

}