<?php
// Forcer la vérification des types ( à mettre sur chaque fichier php)
declare(strict_types = 1);

class Eleve{
    public string $nom;
    public string $prenom;
    public int $anneeInscription;
    public DateTime $dateNaissance; //Ici DateTime est un appel à la classe DateTime ( Elle est inclue dans la librairie SPL:standard php library)
    public function __construct(string $nom, string $prenom, int $anneeInscription, DateTime $dateNaissance){
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->anneeInscription = $anneeInscription;
        $this->dateNaissance = $dateNaissance;
    }
    
}

