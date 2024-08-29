<?php
declare(strict_types = 1);

class Game{
    
    // Propriétésµ
    private int $id;
    private string $title;
    private int $ageMin;
    private int $minPlayers;
    private int $maxPlayers;
    private int $yearParution;
    private string $author;
    private string $illustrator;
    private string $type;
    private string $image;

    // Méthode

    public function __construct(
        string $title,
        int $ageMin,
        int $minPlayers,
        int $maxPlayers,
        int $yearParution = new DateTime(),
        string $author = "", 
        string $illustrator = "",
        string $type = "", 
        string $image = "",
        ){
        $this->title = $title;
        $this->ageMin = $ageMin;
        $this->minPlayers = $minPlayers;
        $this->maxPlayers = $maxPlayers;
        $this->yearParution = $yearParution;
        $this->author = $author;
        $this->illustrator = $illustrator;
        $this->type = $type;
        $this->image = $image;

        // Générer un id 
        $this->id = rand(1, 1000000);
    }
        //Usage interne de la classe
    private function setId(int $id){
        $this->id = $id;
    }


    // 
    public function getId():int{
        return $this->id;
    }
    /**
     * Get the value of title
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of ageMin
     */
    public function getAgeMin(): int
    {
        return $this->ageMin;
    }

    /**
     * Set the value of ageMin
     */
    public function setAgeMin(int $ageMin): self
    {
        $this->ageMin = $ageMin;

        return $this;
    }

    /**
     * Get the value of minPlayers
     */
    public function getMinPlayers(): int
    {
        return $this->minPlayers;
    }

    /**
     * Set the value of minPlayers
     */
    public function setMinPlayers(int $minPlayers): self
    {
        $this->minPlayers = $minPlayers;

        return $this;
    }

    /**
     * Get the value of maxPlayers
     */
    public function getMaxPlayers(): int
    {
        return $this->maxPlayers;
    }

    /**
     * Set the value of maxPlayers
     */
    public function setMaxPlayers(int $maxPlayers): self
    {
        $this->maxPlayers = $maxPlayers;

        return $this;
    }

    /**
     * Get the value of yearParution
     */
    public function getYearParution(): int
    {
        return $this->yearParution;
    }

    /**
     * Set the value of yearParution
     */
    public function setYearParution(int $yearParution): self
    {
        $this->yearParution = $yearParution;

        return $this;
    }

    /**
     * Get the value of author
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * Set the value of author
     */
    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get the value of illustrator
     */
    public function getIllustrator(): string
    {
        return $this->illustrator;
    }

    /**
     * Set the value of illustrator
     */
    public function setIllustrator(string $illustrator): self
    {
        $this->illustrator = $illustrator;

        return $this;
    }

    /**
     * Get the value of type
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Set the value of type
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * Set the value of image
     */
    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    // Affichage
    public function displayGame():void{
        print("Id: ".$this->id . "<br>");
        print("Titre du jeu: ".$this->title. "<br>");
        print("Auteur du jeu: ".$this->author. "<br>");
        print("Illustrateur du jeu: ".$this->illustrator. "<br>");
        print("Age minimum: ".$this->ageMin. "<br>");
        print("Pour: ".$this->minPlayers. " à ". $this->maxPlayers." joueurs<br>");
        print("Est sorti en : ".$this->yearParution. "<br>");
        print("Type de jeu: ".$this->type. "<br>");
        print("Image: ".$this->image. "<br>");

    }


}
