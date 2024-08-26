<?php

class Personne{
    protected int $numNational;
    protected string $nom;
    protected string $mail;

    public function __construct(int $numNational, string $nom, string $mail){
        $this->numNational = $numNational;
        $this->nom = $nom;
        $this->mail = $mail;
    }

    public function displayPersonne(){
        echo("<br>Nom: ". $this->nom);
        echo("<br>N° national: ". $this->numNational);
        echo("<br>Mail: ". $this->mail);
    }

    /**
     * Get the value of numNational
     */
    public function getNumNational(): int
    {
        return $this->numNational;
    }

    /**
     * Set the value of numNational
     */
    public function setNumNational(int $numNational): self
    {
        $this->numNational = $numNational;

        return $this;
    }

    /**
     * Get the value of nom
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     */
    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of mail
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     */
    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }
}