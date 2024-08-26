<?php

class Enterprise{
    
    public function __construct(
                                private string $name,
                                private int $numEnterprise,
                                private string $address
                                )
    {
        $this->name = $name;
        $this->numEnterprise = $numEnterprise;
        $this->address = $address;
        $this->employes = [];
    }

    // Lien d'association (to many): 
    public array $employes;

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
     * Get the value of numEnterprise
     */
    public function getNumEnterprise(): int
    {
        return $this->numEnterprise;
    }

    /**
     * Set the value of numEnterprise
     */
    public function setNumEnterprise(int $numEnterprise): self
    {
        $this->numEnterprise = $numEnterprise;

        return $this;
    }

    /**
     * Get the value of address
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * Set the value of address
     */
    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function addEmploye(Personne $p):self{
        // Lien société-Employé
        $this->employes[] = $p;
        // Lien Employé-société
        $p->setEmployeur($this);
        return $this;
    }

    public function removeEmploye(Personne $p):self{
        
        if(in_array($p, $this->employes)){
            $index = array_search($p, $this->employes);
            unset($this->employes[$index]);
            print("Trouvé");
        }
        else{
            print("Pas trouvé");
        }

        return $this;
    }


}