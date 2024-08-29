<?php

class Medecin {

    public static string $codeDeontologique;

    public function __construct(
        public string $nom,
        public string $prenom,
        public string $mail,
    ){}

    public static function setCodeDeontologique(string $code):void{
        self::$codeDeontologique = $code;
        
    }

    public static function getCodeDeontologique():string{
        return (self::$codeDeontologique);
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
         * Get the value of prenom
         */
        public function getPrenom(): string
        {
                return $this->prenom;
        }

        /**
         * Set the value of prenom
         */
        public function setPrenom(string $prenom): self
        {
                $this->prenom = $prenom;

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