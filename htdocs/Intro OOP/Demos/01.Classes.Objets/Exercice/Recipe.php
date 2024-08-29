<?php

class Recipe{
    public string $name;
    private int $duration;
    private string $description;
    private array $ingredients;

    // Constructeur
    public function __construct(string $name){
        $this->name = $name;
    }

    // Getters et setters

    /**
     * Get the value of duration
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * Set the value of duration
     */
    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of ingredients
     */
    public function getIngredients(): array
    {
        return $this->ingredients;
    }

    /**
     * Set the value of ingredients
     */
    public function setIngredients(array $ingredients): self
    {
        $this->ingredients = $ingredients;

        return $this;
    }

    public function displayIngredients():void
    {
        print("<ul>");
        foreach($this->ingredients as $ingredient){
            print("<li>".$ingredient."</li>");
        }
        print("</ul>");
    }

    public function displayRecipe():void
    {
        print("Nom de la recette: ".$this->name);
        print("<br>Temps préparation et cuisson: ".$this->getDuration());
        print("<br>Ingredients: <br>");
        $this->displayIngredients();
        print("Préparation: ". $this->getDescription());
    }
}