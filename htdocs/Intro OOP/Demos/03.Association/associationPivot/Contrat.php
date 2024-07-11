<?php

class Contract{
    private DateTime $hiringDate;
    private float $salary;
    // Liens association
    private Personne $employe;
    private Enterprise $employeur;

    public function __construct(DateTime $hiringDate = new DateTime(), float $salary = 1.600)
    {
        $this->hiringDate = $hiringDate;
        $this->salary = $salary;
    }

    /**
     * Get the value of hiringDate
     */
    public function getHiringDate(): DateTime
    {
        return $this->hiringDate;
    }

    /**
     * Set the value of hiringDate
     */
    public function setHiringDate(DateTime $hiringDate): self
    {
        $this->hiringDate = $hiringDate;

        return $this;
    }

    /**
     * Get the value of salary
     */
    public function getSalary(): float
    {
        return $this->salary;
    }

    /**
     * Set the value of salary
     */
    public function setSalary(float $salary): self
    {
        $this->salary = $salary;
        return $this;
    }

    public function createContract(Personne $p, Enterprise $s):self{
        $this->employeur = $s;
        $this->employe = $p;
        return $this;
    }


}