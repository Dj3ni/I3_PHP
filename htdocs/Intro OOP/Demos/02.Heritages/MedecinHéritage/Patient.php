<?php

include_once("./Personne.php");

class Patient extends Personne{
    private DateTime $dateInscription;

    public function __construct(int $numNational,
                                string $nom, 
                                string $mail,
                                $dateInscription = new DateTime()){
        parent::__construct($numNational, $nom, $mail);
        $this->dateInscription = $dateInscription;
    }

    public function makeAppointment(){
        echo("Chabadabada");
    }

    /**
     * Get the value of dateInscription
     */
    public function getDateInscription(): DateTime
    {
        return $this->dateInscription;
    }

    /**
     * Set the value of dateInscription
     */
    public function setDateInscription(DateTime $dateInscription): self
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    // Dans ce cas-ci je profite des infos de la fonction mère et j'ajoute celles de la fille 
    public function displayPersonne()
    {
        echo("Infos du patient:");
        parent::displayPersonne();
        echo("<br>Date Inscription: ". $this->dateInscription->format("d-M-Y"));
        // echo($this->nom);
    }
}