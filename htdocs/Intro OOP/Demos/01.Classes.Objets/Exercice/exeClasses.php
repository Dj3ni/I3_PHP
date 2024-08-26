<?php

class Image{
    public string $name;
    public string $src;
    public string $alt;

    public function __construct(string $name = "", string $src, string $alt = ""){
        $this->name = $name;
        $this->src = $src;
        $this->alt = $alt;    
    }

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
     * Get the value of src
     */
    public function getSrc(): string
    {
        return $this->src;
    }

    /**
     * Set the value of src
     */
    public function setSrc(string $src): self
    {
        $this->src = $src;

        return $this;
    }

    /**
     * Get the value of alt
     */
    public function getAlt(): string
    {
        return $this->alt;
    }

    /**
     * Set the value of alt
     */
    public function setAlt(string $alt): self
    {
        $this->alt = $alt;

        return $this;
    }

    public function displayImage():void{
        print("<img src= '".$this->src. "' alt='". $this->alt."' width = '200px' height ='200px'>");
    }

}