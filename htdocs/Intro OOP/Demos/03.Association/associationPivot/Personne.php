<?php

class Personne{
    
    public function __construct(
                                    private string $name,
                                    private string $email)
    {
        $this->name = $name;
        $this->email = $email;
        $this->contracts = [];
    }

    // Liens association(to one):
    public array $contracts;

    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function addContract(Contract $c): self{ //Si un seul possible, on utilise set en non add
        $this->contracts[] = $c;
        return $this;
    }
}