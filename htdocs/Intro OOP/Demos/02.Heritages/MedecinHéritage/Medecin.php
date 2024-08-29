<?php
include_once("./Personne.php");
// include_once("./Patient.php");

class Medecin extends Personne{
    private int $numInami;
    private string $speciality;

    public function __construct(int $numNational,
                                string $nom, 
                                string $mail, 
                                int $numInami, 
                                string $speciality){
        parent::__construct($numNational,$nom,$mail); //On fait appel au constructeur
        $this->numInami = $numInami;
        $this->speciality = $speciality;
    }
/**
     * Get the value of numInami
     */
    public function getNumInami(): int
    {
        return $this->numInami;
    }

    /**
     * Set the value of numInami
     */
    public function setNumInami(int $numInami): self
    {
        $this->numInami = $numInami;

        return $this;
    }

    /**
     * Get the value of speciality
     */
    public function getSpeciality(): int
    {
        return $this->speciality;
    }

    /**
     * Set the value of speciality
     */
    public function setSpeciality(int $speciality): self
    {
        $this->speciality = $speciality;

        return $this;
    }

    

    // public function soigne(Patient $patient){
    //     echo($patient.": Vous êtes guéri!");
    // }

    public function soigne(){
        echo("Vous êtes guéri!");
    }

    public function displayPersonne()
    {
        echo("<br>Infos du médecin:");
        parent::displayPersonne();
        echo("<br>N° Inami: ". $this->numInami);
        echo("<br>Spécialité: ". $this->speciality);
    }
    
}